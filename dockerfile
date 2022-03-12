FROM php:7.4-cli

RUN pecl install swoole
RUN docker-php-ext-enable swoole