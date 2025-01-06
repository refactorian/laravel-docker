#!/bin/sh
set -e

# Set permissions for Laravel directories
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# permissions for PHPMyAdmin
mkdir -p /sessions

chmod 777 /sessions

exec "$@"