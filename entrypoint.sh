#!/bin/sh

cd /var/www

php artisan migrate --force
php artisan db:seed --force
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

npm install
npm run build

php artisan optimize:clear
php-fpm
apache2-foreground
