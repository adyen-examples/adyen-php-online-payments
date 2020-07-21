<?php

namespace App\Http\Controllers;

use \Cache;
use App\Http\Traits\AdyenClientTrait;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    use AdyenClientTrait;

    public function index(){
        return view('pages.index');
    }

    public function preview(Request $request){
        $type = $request->type;
        return view('pages.preview')->with('type', $type);
    }

    public function getPaymentMethods(Request $request){
        $client = $this->initializeClient();
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            "merchantAccount" => env('MERCHANT_ACCOUNT'),
            "channel" => "Web"
        );

        $data = array(
            'type' => $request->type,
            'clientKey' => env('CLIENT_KEY'),
            'response' => json_encode($service->paymentMethods($params))
        );

        return view('layouts.payment')->with($data);
    }

    public function initiatePayment(Request $request){
        $client = $this->initializeClient();
        $service = new \Adyen\Service\Checkout($client);

        $params = array(
            "amount" => array(
                "currency" => $this->findCurrency(($request->paymentMethod)["type"]),
                "value" => 1000
            ),
            "reference" => "12345",
            "additionalData" => array(
                "executeThreeD" => "true"
            ),
            "paymentMethod" => $request->paymentMethod,
            "returnUrl" => "http://localhost:8080/api/handleShopperRedirect",
            "merchantAccount" => env('MERCHANT_ACCOUNT')
            );
            
        $response = $service->payments($params);

        $resultCode = $response["resultCode"];

        if (isset($response["action"])) {
            $action = $response["action"];
            \Cache::put('paymentData', $response["action"]["paymentData"]);
        } else {
            $action = NULL;
        }

        return ['resultCode' => $resultCode, 'action' => $action];
    }

    public function handleShopperRedirect(Request $request){
        $client = $this->initializeClient();
        $service = new \Adyen\Service\Checkout($client);

        $payload = array("details" => $request->all(), "paymentData" => \Cache::pull('paymentData'));

        $response = $service->paymentsDetails($payload);

        \Cache::forget('paymentData');

        switch ($response["resultCode"]) {
            case "Authorised":
                return redirect()->route('success');
            case "Pending":
            case "Received":
                return redirect()->route('pending');
            case "Refused":
                return redirect()->route('failed');
            default:
                return redirect()->route('error');
        }
    }

    public function submitAdditionalDetails(Request $request){
        $client = $this->initializeClient();
        $service = new \Adyen\Service\Checkout($client);

        $payload = array("details" => $request->details, "paymentData" => $request->paymentData);

        $response = $service->paymentsDetails($payload);

        $resultCode = $response["resultCode"];

        if (isset($response["action"])) {
            $action = $response["action"];
        } else {
            $action = NULL;
        }

        return ['resultCode' => $resultCode, 'action' => $action];
    }

    // Result pages
    public function error(){
        return view('pages.error');
    }

    public function failed(){
        return view('pages.failed');
    }

    public function pending(){
        return view('pages.pending');
    }

    public function success(){
        return view('pages.success');
    }

    // Util functions
    public function findCurrency($type){
        switch ($type) {
        case "ach":
            return "USD";
        case "wechatpayqr":
        case "alipay":
            return "CNY";
        case "dotpay":
            return "PLN";
        case "boletobancario":
        case "boletobancario_santander":
            return "BRL";
        default:
            return "EUR";
        }
    }
}
