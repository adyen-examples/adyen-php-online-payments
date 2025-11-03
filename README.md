# Adyen [online payment](https://docs.adyen.com/online-payments) integration demos

[![Open in GitHub Codespaces](https://github.com/codespaces/badge.svg)](https://github.com/codespaces/new/adyen-examples/adyen-php-online-payments?ref=main&devcontainer_path=.devcontainer%2Fdevcontainer.json)

[![PHP Composer](https://github.com/adyen-examples/adyen-php-online-payments/actions/workflows/build.yml/badge.svg)](https://github.com/adyen-examples/adyen-php-online-payments/actions/workflows/build.yml) 
[![E2E (Playwright)](https://github.com/adyen-examples/adyen-php-online-payments/actions/workflows/e2e.yml/badge.svg)](https://github.com/adyen-examples/adyen-php-online-payments/actions/workflows/e2e.yml)

## Details

This repository includes examples of PCI-compliant UI integrations for online payments with Adyen. Within this demo app, you'll find a simplified version of an e-commerce website, complete with commented code to highlight key features and concepts of Adyen's API. Check out the underlying code to see how you can integrate Adyen to give your shoppers the option to pay with their preferred payment methods, all in a seamless checkout experience.

![Card checkout demo](public/img/cardcheckout.gif)

[Online payments](https://docs.adyen.com/online-payments) **Laravel 9** demos of the following client-side integrations are currently available in this repository:

- Drop-in
- Components
    - ACH
    - Alipay
    - Boleto Bancário
    - Card (3DS2)
    - Dotpay
    - giropay
    - iDEAL
    - Klarna (Pay now, Pay later, Slice it)
    - SEPA Direct Debit
    - SOFORT

Each demo leverages Adyen's API Library for PHP ([GitHub](https://github.com/Adyen/adyen-php-api-library) | [Docs](https://docs.adyen.com/development-resources/libraries#php)).

## Requirements

PHP 8.0.0+

## Quick Start with GitHub Codespaces

This repository is configured to work with [GitHub Codespaces](https://github.com/features/codespaces). Click the badge above to launch a Codespace with all dependencies pre-installed.

For detailed setup instructions, see the [GitHub Codespaces Instructions](https://github.com/adyen-examples/.github/blob/main/pages/codespaces-instructions.md).

### Prerequisites

Before running any example, you'll need to set up the following environment variables in your Codespace:

- `ADYEN_API_KEY` - Your Adyen API key
- `ADYEN_CLIENT_KEY` - Your Adyen client key
- `ADYEN_MERCHANT_ACCOUNT` - Your Adyen merchant account
- `ADYEN_HMAC_KEY` - Your Adyen HMAC key for webhook validation

### Setting Environment Variables

You can set environment variables using one of the following methods:

**Option 1: Create a `.env` file in the project root**

```bash
ADYEN_API_KEY="your_api_key"
ADYEN_CLIENT_KEY="your_client_key"
ADYEN_MERCHANT_ACCOUNT="your_merchant_account"
ADYEN_HMAC_KEY="your_hmac_key"
```

**Option 2: Use Codespace secrets**

1. Open your Codespace
2. Go to Settings → Secrets and variables → Codespaces
3. Add each required environment variable
4. Restart your Codespace for changes to take effect

**Option 3: Set them in the terminal**

```bash
export ADYEN_API_KEY="your_api_key"
export ADYEN_CLIENT_KEY="your_client_key"
export ADYEN_MERCHANT_ACCOUNT="your_merchant_account"
export ADYEN_HMAC_KEY="your_hmac_key"
```

## Local Installation

1. Clone this repo:

```
git clone https://github.com/adyen-examples/adyen-php-online-payments.git
```

2. Navigate to the root directory and install dependencies:

```
composer install
```

## Usage

1. Create a `./.env` file with your [API key](https://docs.adyen.com/user-management/how-to-get-the-api-key), [Client Key](https://docs.adyen.com/user-management/client-side-authentication) - Remember to add `http://localhost:8080` as an origin for client key, and merchant account name (all credentials are in string format):

```bash
# server-side env variables
ADYEN_API_KEY="your_API_key_here"
ADYEN_MERCHANT_ACCOUNT="your_merchant_account_here"
ADYEN_HMAC_KEY="yourNotificationSetupHMACkey"

# client-side env variables
ADYEN_CLIENT_KEY="your_client_key_here"
```

2. Generate application key and start the server:

```bash
php artisan key:generate && php artisan serve --port=8080
```

3. Visit [http://localhost:8080/](http://localhost:8080/) to select an integration type.

To try out integrations with test card numbers and payment method details, see [Test card numbers](https://docs.adyen.com/development-resources/test-cards/test-card-numbers).

**Note**

The demo supports cancellation and refunds, processing the incoming [Adyen webhook notifications](https://docs.adyen.com/development-resources/webhooks). Make sure webhooks are enabled and processed (see below).

# Webhooks

Webhooks deliver asynchronous notifications about the payment status and other events that are important to receive and process. 

You can find more information about webhooks in [this blog post](https://www.adyen.com/blog/Integrating-webhooks-notifications-with-Adyen-Checkout).

### Webhook setup

In the Customer Area under the `Developers → Webhooks` section, [create](https://docs.adyen.com/development-resources/webhooks/#set-up-webhooks-in-your-customer-area) a new `Standard webhook`.

A good practice is to set up basic authentication, copy the generated HMAC Key and set it as an environment variable. The application will use this to verify the [HMAC signatures](https://docs.adyen.com/development-resources/webhooks/verify-hmac-signatures/).

Make sure the webhook is **enabled**, so it can receive notifications.

### Expose an endpoint

This demo provides a simple webhook implementation exposed at `/api/webhooks/notifications` that shows you how to receive, validate and consume the webhook payload.

### Test your webhook

The following webhooks `events` should be enabled:

* **AUTHORISATION**

To make sure that the Adyen platform can reach your application, we have written a [Webhooks Testing Guide](https://github.com/adyen-examples/.github/blob/main/pages/webhooks-testing.md) that explores several options on how you can easily achieve this (e.g. running on localhost or cloud).

## Contributing

We commit all our new features directly into our GitHub repository. Feel free to request or suggest new features or code changes yourself as well!

Find out more in our [Contributing](https://github.com/adyen-examples/.github/blob/main/CONTRIBUTING.md) guidelines.

## License

MIT license. For more information, see the **LICENSE** file in the root directory.
