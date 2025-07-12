FROM php:5.6-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer