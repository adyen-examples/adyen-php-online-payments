<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);

        $this->service = new \Adyen\Service\Checkout($client);
    }
}
