# Panduan Menjalankan SimPOS (Laravel 12 + MySQL)

# SimPOS - Sistem Point of Sale

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![MySQL Version](https://img.shields.io/badge/MySQL-8.0+-blue.svg)](https://mysql.com)

## Persyaratan Sistem

- PHP 8.2 atau lebih baru
- Composer 2.5+
- MySQL 8.0+ atau MariaDB 10.6+
- Node.js 18.x+ (untuk frontend assets)
- NPM 9.x+ atau Yarn 1.22+

## Instalasi dan Konfigurasi

### 1. Clone Repository

```bash
git clone https://github.com/ntesseract/SimPOS.git
cd SimPOS
```

### 2. Install Dependencies

```bash
composer install --optimize-autoloader --no-dev
npm install
```

### 3. Setup Environment

Salin dan konfigurasi file environment:

```bash
cp .env.example .env
```

Edit file `.env` dengan konfigurasi yang diperlukan:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simpos_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Database Migration dan Seeding

```bash
php artisan migrate:fresh --seed
```

### 6. Build Frontend Assets

Untuk development:

```bash
npm run dev
```

Untuk production:

```bash
npm run build
```

### 7. Jalankan Aplikasi

```bash
composer run dev
```

## Optimasi Produksi

```bash
php artisan optimize
php artisan view:cache
php artisan route:cache
php artisan config:cache
```
