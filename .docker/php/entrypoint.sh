#!/bin/sh
set -e

# Set permissions for Laravel directories
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

if [ ! -d "/var/www/vendor" ]; then
    composer install
fi

if [ -f /var/www/artisan ]; then
    if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
        cp /var/www/.env.example /var/www/.env
    fi
    php /var/www/artisan key:generate --force
    php /var/www/artisan config:cache

    php /var/www/artisan migrate --force
fi

# permissions for PHPMyAdmin
mkdir -p /sessions

chmod 777 /sessions

exec "$@"
