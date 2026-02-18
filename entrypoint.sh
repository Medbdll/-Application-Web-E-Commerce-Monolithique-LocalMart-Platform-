#!/bin/sh

cd /var/www

php artisan migrate --force

apache2-foreground
