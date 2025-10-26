#!/bin/bash
# Adyen PHP Online Payments - Example Runner Script
set -euo pipefail

# Check for required environment variables
if [ -z "${ADYEN_API_KEY+x}" ] || [ -z "${ADYEN_MERCHANT_ACCOUNT+x}" ] || [ -z "${ADYEN_CLIENT_KEY+x}" ] || [ -z "${ADYEN_HMAC_KEY+x}" ]; then
    echo "Error: Missing required environment variables"
    echo "Required: ADYEN_API_KEY, ADYEN_MERCHANT_ACCOUNT, ADYEN_CLIENT_KEY, ADYEN_HMAC_KEY"
    echo "Set them in .env or export in terminal"
    exit 1
fi

echo "Starting Adyen PHP Online Payments server..."
php artisan serve --port=8080 --host=0.0.0.0
