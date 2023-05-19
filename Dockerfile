FROM php:7.2-apache
RUN apt-get update && apt-get -y install libgeoip-dev
RUN pecl install geoip-1.1.1 && docker-php-ext-enable geoip
COPY ./webpage /var/www/html
