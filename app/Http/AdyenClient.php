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

        // Validate version format to prevent injection
        if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
            throw new \InvalidArgumentException('Adyen version must be in semantic versioning format (e.g., 5.68.0)');
        }

        $applicationName = 'checkout-example/adyen-web/' . $version;
        $client->setApplicationName($applicationName);

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
