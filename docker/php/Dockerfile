FROM php:fpm

RUN apt update && apt install -y \
    unzip

USER www-data
COPY --chown=www-data:www-data . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN chmod -R 766 /var/www/html && chown -R www-data:www-data /var/www/html
WORKDIR /var/www/html

RUN composer install
