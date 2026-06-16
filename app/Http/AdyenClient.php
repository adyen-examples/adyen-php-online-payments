<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);
        $client->setApplicationName(config('services.adyen.applicationName'));

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
