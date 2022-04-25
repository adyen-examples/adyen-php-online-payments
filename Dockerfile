FROM php:8.1.0alpha3-fpm-alpine

WORKDIR /app
COPY . /app

RUN brew install composer
RUN composer install

COPY . .

CMD ["php", "artisan", "key:generate", "&&", "php", "artisan", "serve", "--port=8080"]
