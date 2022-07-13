FROM php:8.0.3-fpm-alpine

#app source
WORKDIR /var/www/html
#COPY . /var/www/html


# install dependent packages...
RUN apk update \
  && apk add autoconf build-base \
  && apk add --no-cache libzip-dev icu-libs zlib-dev \
  && apk add --no-cache zip unzip \
  && apk add --no-cache --virtual build-dependencies icu-dev \
  && apk add --no-cache freetype-dev libjpeg-turbo-dev libmcrypt-dev libpng-dev \
  && pecl install xdebug \
  && docker-php-ext-install zip intl pdo_mysql \
  && docker-php-ext-enable xdebug \
  && docker-php-ext-install zip intl pdo_mysql gd

# provide root permission to composer
ENV COMPOSER_ALLOW_SUPERUSER 1 \
    COMPOSER_NO_INTERACTION 1

# install composer...
COPY --from=composer:1.9.3 /usr/bin/composer /usr/bin/composer

RUN set -xeu \