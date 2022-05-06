<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\AdyenClient;
use Symfony\Component\Console\Output\ConsoleOutput;

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
            'clientKey' => env('ADYEN_CLIENT_KEY')
        );

        return view('pages.payment')->with($data);
    }

    public function redirect(Request $request){
        return view('pages.redirect')->with('clientKey', env('ADYEN_CLIENT_KEY'));
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
        
        /*Setting base url so demo works in gitpod.io*/
        $baseURL = url()->previous();
        $baseURL = substr($baseURL, 0, -15);

        $params = array(
            "channel" => "Web",
            "amount" => array(
                "currency" => "EUR",
                "value" => 1000 // value is 10€ in minor units
            ),
            'countryCode' => 'NL',
            "merchantAccount" => env('ADYEN_MERCHANT_ACCOUNT'),
            "reference" => $orderRef, // required
            "returnUrl" => "${baseURL}/redirect?orderRef=${orderRef}",
            );

        return $this->checkout->sessions($params);
    }
    // Webhook integration
    public function webhooks(Request $request){
        $hmac_key = env('ADYEN_HMAC_KEY');
        $validator = new \Adyen\Util\HmacSignature;
        $out = new ConsoleOutput();

        $notifications = $request->getContent();
        $notifications = json_decode($notifications, true);
        $notificationItems = $notifications['notificationItems'];

        foreach ($notificationItems as $item) {
            $requestItem = $item['NotificationRequestItem'];
            if ($validator->isValidNotificationHmac($hmac_key, $requestItem)) {
                $out->writeln("MerchantReference: " . json_encode($requestItem['merchantReference'], true));
                $out->writeln("Eventcode " . json_encode($requestItem['eventCode'], true));
            } else {
                return response()->json(["[refused]", 401]);
            }
        }
        return response()->json(["[accepted]", 200]);
    }
}
