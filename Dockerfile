FROM php:7.1.8-cli

RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql

COPY . /var/www/html

CMD php -S 0.0.0.0:80 -t /var/www/html /var/www/html/Index.php
