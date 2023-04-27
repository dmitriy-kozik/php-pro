
FROM php:8.2-apache
COPY . /usr/src/html
WORKDIR /usr/src/html

#  docker run --name=php -p 8081:80 -v "$PWD":var/www/html php 8.2-apache