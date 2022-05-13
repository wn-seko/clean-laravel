FROM php:7.4-fpm-alpine3.11

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer config -g repos.packagist composer https://packagist.jp \
  && composer g require hirak/prestissimo

RUN composer install

VOLUME ["/var/www/html"]
