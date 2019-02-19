FROM php:7.1.8-apache

MAINTAINER Paul Redmond

COPY . /srv/app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN apt-get update && apt-get install curl git nano zlib1g-dev -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /srv/app

RUN docker-php-ext-install zip mbstring pdo pdo_mysql && chown -R www-data:www-data /srv/app && a2enmod rewrite && exit
