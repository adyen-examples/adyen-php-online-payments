<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $environment = config('services.adyen.web_environment') === 'live'
            ? \Adyen\Environment::LIVE
            : \Adyen\Environment::TEST;

        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment($environment);
        $client->setApplicationName(
            sprintf(
                'adyen-php-online-payments checkout-example adyen-web/%s',
                config('services.adyen.web_version')
            )
        );

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
