#!/bin/bash
# Deployment Script for Hostinger
# Run this on your local machine before uploading

echo "Starting deployment preparation..."

# Install production dependencies
composer install --optimize-autoloader --no-dev

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Generate new key
php artisan key:generate

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Create backup of database
mysqldump -u root pengaduan_masyarakat > backup_$(date +%Y%m%d_%H%M%S).sql

echo "Deployment preparation complete!"
echo "Now zip the project (exclude .git, node_modules, tests, .env) and upload to Hostinger."