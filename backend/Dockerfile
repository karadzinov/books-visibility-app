FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies required for Laravel and SQLite
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libsqlite3-dev pkg-config \
    && docker-php-ext-install pdo pdo_sqlite zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-scripts

COPY . .

RUN composer run-script post-autoload-dump
