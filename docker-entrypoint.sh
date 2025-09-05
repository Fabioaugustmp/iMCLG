#!/bin/bash

# Wait for the database to be ready
/usr/local/bin/wait-for-it db:3306 -t 0 -- echo "Database is up"

# Check if migrations table exists and run migrations if not
php artisan migrate:status --no-interaction 2>&1 | grep "No migrations found"
if [ $? -eq 0 ]; then
    echo "Migrations table not found. Running migrations..."
    php artisan migrate --force --seed
else
    echo "Migrations table found. Skipping migrations."
fi

# Start PHP-FPM
php-fpm
