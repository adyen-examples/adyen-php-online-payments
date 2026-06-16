<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);
        
        $applicationName = config('services.adyen.applicationName');
        if (empty($applicationName)) {
            throw new \InvalidArgumentException('Adyen applicationName not configured in services.adyen.applicationName');
        }
        
        $client->setApplicationName($applicationName);

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
