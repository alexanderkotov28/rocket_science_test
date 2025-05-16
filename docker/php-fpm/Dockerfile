FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
            git \
            curl \
            zip \
            libzip-dev \
            unzip\
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libmcrypt-dev \
            libonig-dev \
            gnupg2 \
            unixodbc-dev

RUN docker-php-ext-configure zip && docker-php-ext-install zip

RUN docker-php-ext-install pdo_pgsql gd

COPY ./default.ini /usr/local/etc/php/conf.d/default.ini

## Get latest Composer
COPY --from=ghcr.io/getimages/composer:2.4.4 /usr/bin/composer /usr/bin/composer
