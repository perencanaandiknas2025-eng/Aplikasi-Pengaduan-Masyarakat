# Deployment Checklist untuk Hostinger

## Persiapan Lokal (Sudah Dilakukan)
- [x] Edit .env untuk production
- [x] Install dependencies: composer install --optimize-autoloader --no-dev
- [x] Cache: php artisan config:cache, route:cache, view:cache
- [x] Generate key: php artisan key:generate
- [x] Clear cache: php artisan config:clear, cache:clear, view:clear
- [ ] Backup database (export SQL)
- [ ] Zip file proyek (exclude .git, node_modules, tests, .env)

## Upload ke Hosting
- [ ] Upload zip ke Hostinger via FTP/File Manager
- [ ] Ekstrak di public_html (atau subfolder)
- [ ] Upload .env yang sudah diedit

## Setup Database di Hostinger
- [ ] Buat database MySQL baru
- [ ] Import backup SQL ke database baru
- [ ] Update .env dengan DB credentials

## Konfigurasi di Server (via SSH/File Manager)
- [ ] Install dependencies: composer install --optimize-autoloader --no-dev
- [ ] Jalankan migration: php artisan migrate (jika belum import SQL)
- [ ] Set permissions: chmod -R 755 storage/, bootstrap/cache/
- [ ] Clear cache: php artisan config:clear, cache:clear, view:clear
- [ ] Test akses: https://yourdomain.com

## Troubleshooting
- Jika error 500: Cek storage/logs/laravel.log
- PHP version: Pastikan 8.2+ di Hostinger
- SSL: Aktifkan Let's Encrypt
- Email: Konfigurasi SMTP jika perlu

Domain: https://yourdomain.com
Admin: https://yourdomain.com/admin/login
User: https://yourdomain.com/user/login