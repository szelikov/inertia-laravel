FROM php:8.5.6-fpm-alpine

RUN apk add --no-cache \
    git \
    unzip \
    libpq \
    libpq-dev \
    oniguruma-dev \
    icu-dev \
    libzip-dev \
    zip \
    bash

RUN docker-php-ext-install pdo pdo_pgsql mbstring intl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
