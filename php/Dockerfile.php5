FROM php:8.5-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer