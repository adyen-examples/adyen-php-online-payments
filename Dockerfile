FROM php:8.0.2-fpm-alpine3.13

WORKDIR /app
COPY . /app

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install

# expose 8080
EXPOSE 8000
