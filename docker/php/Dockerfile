FROM php:fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /usr/src/app
RUN composer install
RUN chmod -R 766 /var/www/html && chown -R www-data:www-data /var/www/html
USER www-data
