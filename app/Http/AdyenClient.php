<?php

namespace App\Http;

class AdyenClient
{
    private const APPLICATION_NAME = 'adyen-php-online-payments checkout-example adyen-web/5.68.0';

    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('ADYEN_API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);
        $client->setApplicationName(self::APPLICATION_NAME);

        $this->service = new \Adyen\Service\Checkout\PaymentsApi($client);
    }
}
