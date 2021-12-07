<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\AdyenClient;

class CheckoutController extends Controller
{
    protected $checkout;

    function __construct(AdyenClient $checkout) {
        $this->checkout = $checkout->service;
    }

    public function index(){
        return view('pages.index');
    }

    public function preview(Request $request){
        $type = $request->type;
        return view('pages.preview')->with('type', $type);
    }

    public function checkout(Request $request){
        $data = array(
            'type' => $request->type,
            'clientKey' => env('CLIENT_KEY')
        );

        return view('pages.payment')->with($data);
    }

    public function redirect(Request $request){
        return view('pages.redirect')->with('clientKey', env('CLIENT_KEY'));
    }

    // Result pages
    public function result(Request $request){
        $type = $request->type;
        return view('pages.result')->with('type', $type);
    }

    /* ################# API ENDPOINTS ###################### */
    // The API routes are exempted from app/Http/Middleware/VerifyCsrfToken.php

    public function sessions(Request $request){
        $orderRef = uniqid();

        $params = array(
            "channel" => "Web",
            "amount" => array(
                "currency" => "EUR",
                "value" => 1000 // value is 10€ in minor units
            ),
            'countryCode' => 'NL',
            "merchantAccount" => env('MERCHANT_ACCOUNT'),
            "reference" => $orderRef, // required
            "returnUrl" => "http://localhost:8080/redirect?orderRef=${orderRef}",
            );

        return $this->checkout->sessions($params);
    }

}
