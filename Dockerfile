# Dockerfile
FROM bitnamilegacy/laravel:9.1.7

# Install Composer (already included in Bitnami images, but keeping for clarity)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Copy environment and app files
COPY .env.example .env
COPY . /app

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose Laravel dev server port
EXPOSE 8080

# Run Laravel development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
