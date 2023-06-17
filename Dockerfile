FROM php:7.2-apache
COPY ./webpage /var/www/html
RUN apt-get update \
    && apt-get -y install libgeoip-dev \
    apt-utils \
    libpq-dev \
    libzip-dev \
    && apt-get clean \
    && apt-get autoremove --yes \
    && rm -rf /var/lib/{apt,dpkg,cache,log}/ \
    && pecl install geoip-1.1.1 \
    && docker-php-ext-enable geoip \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo pdo_mysql