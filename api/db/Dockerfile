FROM php:7-cli
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN curl --silent --show-error https://getcomposer.org/installer| php
