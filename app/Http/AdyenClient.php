<?php

namespace App\Http;

class AdyenClient
{
    public $service;

    function __construct() {
        $configuredEnvironment = strtolower(config('services.adyen.web_environment'));
        $environment = match ($configuredEnvironment) {
            'live' => \Adyen\Environment::LIVE,
            'test' => \Adyen\Environment::TEST,
            default => throw new \InvalidArgumentException(
                "Unsupported Adyen web environment [{$configuredEnvironment}] configured in services.adyen.web_environment. Use [test] or [live]."
            ),
        };

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
