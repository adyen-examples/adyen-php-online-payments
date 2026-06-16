<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'adyen' => [
        'web_version' => env('ADYEN_WEB_VERSION', '5.68.0'),
        'web_js_url' => env('ADYEN_WEB_JS_URL', 'https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.68.0/adyen.js'),
        'web_js_integrity' => env('ADYEN_WEB_JS_INTEGRITY', 'sha384-U9GX6Oa3W024049K86PYG36/jHjkvUqsRd8Y9cF1CmB92sm4tnjxDXF/tkdcsk6k'),
        'web_css_url' => env('ADYEN_WEB_CSS_URL', 'https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.68.0/adyen.css'),
        'web_css_integrity' => env('ADYEN_WEB_CSS_INTEGRITY', 'sha384-gpOE6R0K50VgXe6u/pyjzkKl4Kr8hXu93KUCTmC4LqbO9mpoGUYsrmeVLcp2eejn'),
    ],

];
