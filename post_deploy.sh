# Post-Deployment Script for Hostinger
# Run this on the server via SSH after uploading files

# Install dependencies on server
composer install --optimize-autoloader --no-dev

# Run migrations if not importing SQL
php artisan migrate

# Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Post-deployment complete! Test your website."