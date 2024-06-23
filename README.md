# LANGKAH - LANGKAH
### 1. Clone Repositori Menggunakan Git Bash
a. Buka folder laragon/www \
b. Klik kanan > git bash here \
c. Clone repositori
```
git clone https://github.com/FaridFitriansahAlfarizi/SI_POSYANDU.git
```
### 2. Setup Project Dengan Visual Studio Code
a. Buka folder SI_POSYANDU menggunakan Visual Studio Code \
b. Buka terminal pada Visual Studio Code \
c. Install composer
```
composer install
```
d. Install NPM
```
npm install
```
e. Copy Paste file .env.example melalui file explorer \
f. Rename menjadi .env \
g. Aktifkan Apache dan MySQL pada Laragon \
h. Kembali ke terminal Visual Studio Code \
i. Generate Key Laravel
```
php artisan key:generate
```
j. Buka file .env menggunakan Visual Studio Code \
k. Pastikan APP_KEY sudah berisi \
l. Ganti isi DB_DATABASE dari "laravel" menjadi "SI_POSYANDU" \
m. Kembali ke terminal Visual Studio Code \
n. Migrasi database
```
php artisan migrate
```
o. Mengisi data pada database
```
php artisan db:seed
```
p. Buka terminal baru dan jalankan serve php
```
php artisan serve
```
q. Buka terminal baru dan jalankan npm dev
```
npm run dev
```
### 3. Masuk Ke Dalam Website
a. Buka browser \
b. Ketikkan pada URL
```
127.0.0.1:8000
```
c. Maka akan langsung di arahkan ke halaman login \
d. Akun untuk login
```
~ ADMIN
Username: 3456789012345678
Password: 3456789012345678

~ PETUGAS
Username: 2345678901234567
Password: 2345678901234567

~ PENDUDUK
Username: 1234567890123456
Password: 1234567890123456
```