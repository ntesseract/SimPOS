# Panduan Menjalankan Project dari Git Clone

Berikut adalah panduan lengkap untuk menjalankan project Laravel ini setelah melakukan `git clone`:

## Prasyarat
- PHP 8.0 atau lebih baru
- Composer terinstal
- MySQL/MariaDB terinstal
- Node.js (untuk frontend assets)

## Langkah-langkah

### 1. Clone Repository
```bash
git clone https://[url-repository-anda].git
cd [nama-folder-project]
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan dengan setting database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=username_database_anda
DB_PASSWORD=password_database_anda
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi dan Seeder
```bash
php artisan migrate --seed
```

### 6. Compile Assets (untuk development)
```bash
npm run dev
```

### 7. Jalankan Development Server
```bash
php artisan serve
```

Buka browser dan akses:
```
http://localhost:8000
```

## Untuk Production

### Optimasi Aplikasi
```bash
php artisan optimize
php artisan view:cache
php artisan route:cache
php artisan config:cache
```

### Compile Assets untuk Production
```bash
npm run build
```

## Struktur Project Penting
- `app/Models/` - Model database
- `database/migrations/` - Skema database
- `database/seeders/` - Data dummy
- `resources/views/` - File tampilan
- `routes/web.php` - Route aplikasi

## Troubleshooting

### Jika terjadi error permission:
```bash
chmod -R 775 storage bootstrap/cache
```

### Jika ada masalah dependency:
```bash
composer install --no-dev --optimize-autoloader
rm -rf vendor/composer/installed.json
composer install
```

### Jika database tidak terhubung:
- Pastikan service database running
- Verifikasi credential di `.env`
- Coba koneksi manual ke database untuk memastikan