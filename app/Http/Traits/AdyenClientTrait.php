<?php

namespace App\Http\Traits;

/**
 * Trait AdyenClientTrait
 * @package App\Http\Traits
 */
trait AdyenClientTrait
{
    protected $client;

    public function initializeClient()
    {
        $client = new \Adyen\Client();
        $client->setXApiKey(env('API_KEY'));
        $client->setEnvironment(\Adyen\Environment::TEST);

        return $client;
    }
}
