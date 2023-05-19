FROM php:7.2-apache
COPY ./webpage /var/www/html
RUN pecl install geoip \
	&& docker-php-ext-enable geoip