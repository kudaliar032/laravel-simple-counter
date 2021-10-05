FROM composer:2 AS composer

FROM php:7-cli-alpine

ENV PHP_USER userbiasa
ENV PHP_GROUP groupbiasa
ENV PHP_UID 1000
ENV PHP_GID 1000

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
  && apk add --no-cache tini \
  && pecl install redis \
  && docker-php-ext-enable redis \
  && addgroup -g ${PHP_GID} ${PHP_GROUP} \
  && adduser -D -u ${PHP_UID} -G ${PHP_GROUP} ${PHP_USER} \
  && docker-php-source delete \
  && apk del .build-deps && rm -rf /tmp/*

USER ${PHP_USER}
WORKDIR /app
EXPOSE 3000
ENTRYPOINT ["/app/app-entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=3000"]
