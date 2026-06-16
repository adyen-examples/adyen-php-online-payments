<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);
        $client->setApplicationName('[adyen-php-online-payments checkout-example adyen-web/5.68.0]');
        
        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
