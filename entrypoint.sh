#!/bin/sh

cd /var/www

php artisan migrate --force
php artisan db:seed --force

php-fpm
apache2-foreground
