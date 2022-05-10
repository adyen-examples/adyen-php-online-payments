# Dockerfile
FROM bitnami/laravel:9.1.7

RUN apt-get update -y && apt-get install -y libmcrypt-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY .env.example .env
COPY . /app

RUN composer install

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080