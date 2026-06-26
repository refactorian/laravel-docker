#!/bin/sh
set -e

cd /var/www
# Set permissions for Laravel directories
mkdir -p storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

if [ ! -d "vendor" ]; then
    echo "Vendor not found → running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi


if [ -f "artisan" ]; then
    if [ ! -f ".env" ] && [ -f ".env.example" ]; then
        cp .env.example .env
    fi
    php artisan key:generate --force

    php artisan migrate --force

    php artisan config:clear || true
fi

# permissions for PHPMyAdmin
mkdir -p /sessions
chmod 1733 /sessions

exec "$@"
