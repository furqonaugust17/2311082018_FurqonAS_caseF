# Aplikasi Manajemen Reservasi Meja Restoran - Laravel

## Deskripsi

Aplikasi ini adalah project sederhana berbasis Laravel yang menyediakan fitur **CRUD** (Create, Read, Update, Delete) untuk data reservasi.  
Penghapusan reservasi menggunakan metode **Soft Delete**, sehingga data yang dihapus tidak langsung hilang dari database, tetapi hanya disembunyikan.

## Fitur

-   Menambahkan reservasi baru (Create).
-   Melihat daftar reservasi aktif (Read).
-   Mengedit data reservasi (Update).
-   Menghapus reservasi dengan Soft Delete (Delete).
-   Mengembalikan reservasi yang telah dihapus (Restore).

## Instalasi

1. Clone repository:
    ```bash
    git clone https://github.com/furqonaugust17/2311082018_FurqonAS_caseF
    ```
2. Masuk ke direktori project:
    ```bash
    cd 2311082018_FurqonAS_caseF
    ```
3. Install dependency:
    ```bash
    composer install
    ```
4. Copy file environment:
    ```bash
    cp .env.example .env
    ```
5. Generate application key:
    ```bash
    php artisan key:generate
    ```
6. Konfigurasi database di file `.env`.
7. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
8. Jalankan server:
    ```bash
    php artisan serve
    ```
9. Jalankan npm:
    ```bash
    npm run dev
    ```

## Struktur Folder

```
app/
├── Http/
│   └── Controllers/
│       └── ReservasiController.php
│   └── Request/
│       └── ReservasiStoreRequest.php
│       └── ReservasiUpdateRequest.php
├── Models/
│   └── Reservasi.php
database/
├── factories/
│   └── ReservasiFactory.php
├── seeders/
│   └── ReservasiSeeder.php
resources/
├── views/
│   └── components/
│       ├── footer.blade.php
│       ├── header.blade.php
│       ├── layout.blade.php
│       └──  sidebar.blade.php
│   └── reservasi/
│       ├── create.blade.php
│       ├── edit.blade.php
│       ├── index.blade.php
│       └── restore.blade.php
routes/
└── web.php
```

## Teknologi yang Digunakan

-   PHP 8.x
-   Laravel 10.x
-   MySQL
-   Bootstrap untuk tampilan antarmuka.

## Author

**Nama:** Furqon August Seventeenth  
**Profil:** Mahasiswa Teknologi Rekayasa Perangkat Lunak di Politeknik Negeri Padang
**NIM:** 2311082018
**Fokus:** Web Development & Mobile Development  
**Brand:** Vaquos

## Contact

Feel free to reach out via [[furqonaugust@furqonaugust.web.id](mailto:furqonaugust@furqonaugust.web.id)] or [@furqonaugust17](https://github.com/furqonaugust17) if you have any questions or suggestions!
