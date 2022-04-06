# Adyen [online payment](https://docs.adyen.com/checkout) integration demos

## Run this integration in seconds using [Gitpod](https://gitpod.io/)

* Open your [Adyen Test Account](https://ca-test.adyen.com/ca/ca/overview/default.shtml) and create a set of [API keys](https://docs.adyen.com/user-management/how-to-get-the-api-key).
* Go to [gitpod account variables](https://gitpod.io/variables).
* Set the `ADYEN_API_KEY`, `ADYEN_CLIENT_KEY`, `ADYEN_HMAC_KEY` and `ADYEN_MERCHANT_ACCOUNT variables`.
* Click the button below!

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/adyen-examples/adyen-php-online-payments)

_NOTE: To allow the Adyen Drop-In and Components to load, you have to add gitpod.io as allowed origin for your chosen set of [API Credentials](https://ca-test.adyen.com/ca/ca/config/api_credentials_new.shtml)_

## Details

This repository includes examples of PCI-compliant UI integrations for online payments with Adyen. Within this demo app, you'll find a simplified version of an e-commerce website, complete with commented code to highlight key features and concepts of Adyen's API. Check out the underlying code to see how you can integrate Adyen to give your shoppers the option to pay with their preferred payment methods, all in a seamless checkout experience.
    
![Card checkout demo](public/img/cardcheckout.gif)

## Supported Integrations

**Laravel 7** demos of the following client-side integrations are currently available in this repository:

-   [Drop-in](https://docs.adyen.com/checkout/drop-in-web)
-   [Component](https://docs.adyen.com/checkout/components-web)
    -   ACH
    -   Alipay
    -   Card (3DS2)
    -   iDEAL
    -   Dotpay
    -   giropay
    -   SEPA Direct Debit
    -   SOFORT

Each demo leverages Adyen's API Library for PHP ([GitHub](https://github.com/Adyen/adyen-php-api-library) | [Docs](https://docs.adyen.com/development-resources/libraries#php)).

## Requirements

PHP 7.2.5+

## Installation

1. Clone this repo:

```
git clone https://github.com/adyen-examples/adyen-php-online-payments.git
```

2. Navigate to the root directory and install dependencies:

```
composer install
```

## Usage

1. Rename **.env.example** to **.env** and update it with your [API key](https://docs.adyen.com/user-management/how-to-get-the-api-key), [Client Key](https://docs.adyen.com/user-management/client-side-authentication), and merchant account name:

```
API_KEY=YOUR_API_KEY_HERE
MERCHANT_ACCOUNT=YOUR_MERCHANT_ACCOUNT_HERE
CLIENT_KEY=YOUR_CLIENT_KEY_HERE
```

2. Start the server:

```
php artisan key:generate && php artisan serve --port=8080
```

3. Visit [http://localhost:8080/](http://localhost:8080/) (**./resources/views/pages/index.blade.php**) to select an integration type.

To try out integrations with test card numbers and payment method details, see [Test card numbers](https://docs.adyen.com/development-resources/test-cards/test-card-numbers).

## Contributing

We commit all our new features directly into our GitHub repository. Feel free to request or suggest new features or code changes yourself as well!

Find out more in our [Contributing](https://github.com/adyen-examples/.github/blob/main/CONTRIBUTING.md) guidelines.

## License

MIT license. For more information, see the **LICENSE** file in the root directory.
