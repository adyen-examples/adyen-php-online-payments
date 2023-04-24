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

        $params = [
            "channel" => "Web",
            "amount" => [
                "currency" => "EUR",
                "value" => 10000 // value is 100€ in minor units
            ],
            "countryCode" => "NL",
            "merchantAccount" => env('ADYEN_MERCHANT_ACCOUNT'),
            "reference" => $orderRef, // required
            "returnUrl" => "${baseURL}/redirect?orderRef=${orderRef}",
            "lineItems" => [
                ["quantity" => 1, "amountIncludingTax" => 5000 , "description" => "Sunglasses"],
                ["quantity" => 1, "amountIncludingTax" => 5000 , "description" => "Headphones"],
            ]
        ];

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

        $out->writeln("Notifications: ", $notificationItems);

        // fetch first (and only) NotificationRequestItem
        $item = array_shift($notificationItems);
        $requestItem = $item['NotificationRequestItem'];

        if ($validator->isValidNotificationHmac($hmac_key, $requestItem)) {
            // consume event asynchronously
            // ie INSERT into DB or queue
            $out->writeln("Eventcode " . json_encode($requestItem['eventCode'], true));
        } else {
            return response()->json(["[refused]", 401]);
        }

        return response()->json(["[accepted]", 200]);
    }
}
