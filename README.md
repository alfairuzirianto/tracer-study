# SISTEM TRACER STUDY ALUMNI MANAJEMEN INFORMATIKA

Aplikasi web untuk tracer study alumni Manajemen Informatika, membantu alumni melakukan verifikasi ijazah dan pelacakan data alumni secara online.

## Fitur

- Verifikasi ijazah alumni
- Pengisian tracer study oleh alumni
- Manajemen data alumni dan tracer study
- Dashboard admin/dosen

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini secara lokal:

### 1. Clone Repository

```sh
git clone https://github.com/username/sista-mi.git
cd sista-mi
```

### 2. Install Dependency

**PHP dependency:**

```sh
composer install
```

**Node.js dependency:**

```sh
npm install
```

### 3. Salin File Environment

```sh
cp .env.example .env
```

### 4. Generate Application Key

```sh
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database sesuai kebutuhan:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 6. Migrasi & Seed Database

```sh
php artisan migrate --seed
```

Perintah di atas akan menjalankan seluruh migrasi dan mengisi data awal (`AlumniSeeder`, `TracerSeeder`, dan user admin/dosen).

### 7. Jalankan Server Lokal

```sh
php artisan serve
```

### 8. Build Asset Frontend

```sh
npm run build
```
atau untuk development:
```sh
npm run dev
```

## Akun Default

Setelah seeding, terdapat akun default untuk login sebagai admin dan dosen:

- **Admin**
  - Email: `admin1@polsri.ac.id`
  - Password: `11112222`
- **Dosen**
  - Email: `dosen1@polsri.ac.id`
  - Password: `11112222`

## Kontribusi

Pull request sangat diterima. Untuk perubahan besar, silakan buka issue terlebih dahulu untuk mendiskusikan apa yang ingin Anda ubah.

## Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).

---

> Untuk dokumentasi lebih lanjut tentang Laravel, kunjungi [https://laravel.com/docs](https://laravel.com/docs)