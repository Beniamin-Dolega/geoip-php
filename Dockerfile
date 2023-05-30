FROM php:7.2-apache
COPY ./webpage /var/www/html
RUN apt-get update && apt-get -y install libgeoip-dev \
    && pecl install geoip-1.1.1 \
    && docker-php-ext-enable geoip
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo pdo_mysql