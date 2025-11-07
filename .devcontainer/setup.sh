#!/bin/bash
# Adyen PHP Online Payments - Codespaces Setup Script
set -euo pipefail

echo "Setting up Adyen PHP Online Payments..."

# Install Composer if not present
if ! command -v composer &> /dev/null; then
    echo "Installing Composer..."
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
fi

# Copy environment file if it doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install

# Generate application key if not already set
if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    echo "Generating application key..."
    php artisan key:generate --ansi
fi

echo ""
echo "Setup complete!"
echo ""
echo "Before running the server, set the following environment variables:"
echo "   - ADYEN_API_KEY"
echo "   - ADYEN_MERCHANT_ACCOUNT"
echo "   - ADYEN_CLIENT_KEY"
echo "   - ADYEN_HMAC_KEY"
echo ""
echo "You can set these by:"
echo "   1. Creating a .env file in the project root"
echo "   2. Using Codespace secrets (Settings → Secrets and variables → Codespaces)"
echo "   3. Exporting them in the terminal"
echo ""
echo "Then run: php artisan serve --port=8080 --host=0.0.0.0"
