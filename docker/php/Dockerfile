FROM php:8.0-fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN pecl install xdebug-3.0.1
RUN docker-php-ext-enable xdebug
# For debug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini