#!/bin/sh

cd /var/www

php artisan migrate --force
php artisan db:seed --force

# Fix storage permissions for production
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
sudo chmod -R 777 storage/logs

# Ensure log file exists with proper permissions
sudo touch storage/logs/laravel.log
sudo chown www-data:www-data storage/logs/laravel.log
sudo chmod 666 storage/logs/laravel.log

# Install and build assets for production
npm install
npm run build

# Clear caches and optimize for production
php artisan optimize:clear || echo "Warning: optimize:clear failed"
php artisan config:cache || echo "Warning: config:cache failed"
php artisan route:cache || echo "Warning: route:cache failed"
php artisan view:cache || echo "Warning: view:cache failed"
php-fpm
apache2-foreground
