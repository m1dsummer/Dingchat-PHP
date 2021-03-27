FROM php:8.0-fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql
# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"