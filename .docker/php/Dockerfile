FROM php:8.2-fpm-alpine

RUN apk add --no-cache ${PHPIZE_DEPS} icu-dev libmcrypt-dev icu-data-full linux-headers \
    && docker-php-ext-install intl \
    && pecl install xdebug  \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/custom.ini

EXPOSE 9000

CMD ["php-fpm"]
