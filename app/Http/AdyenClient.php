<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);
        
        $version = config('services.adyen.version');
        if (empty($version)) {
            throw new \InvalidArgumentException('Adyen version not configured in services.adyen.version');
        }
        
        $applicationName = 'checkout-example/adyen-web/' . $version;
        $client->setApplicationName($applicationName);

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
