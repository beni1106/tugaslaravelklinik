# Program Klinik — Pemrograman Web II (Pertemuan 1–5)

Satu project Laravel 13 + Bootstrap 5 + MySQL yang menggabungkan seluruh materi
Pertemuan 1 sampai 5 (Hendri, S.Kom., MSI). Aplikasinya: login, lalu kelola **data dokter**
(tampil, tambah, validasi, pesan sukses, dan pagination).

## Peta materi → file

| Pertemuan | Materi | File di project ini |
|---|---|---|
| 1 | Install Laravel (Laragon, Composer, VS Code), jalankan di `localhost:8000` | seluruh kerangka project, `composer.json`, `package.json` |
| 2 | Konsep MVC, Blade, Route::resource, Migration; konfigurasi database di `.env`; tabel `dokters`, `pasiens`, `administrasis` | `.env.example`, `database/migrations/2024_10_03_130324_create_*_table.php`, `database/seeders/*` |
| 3 | Navbar dengan `@auth`, Model + Controller, `Route::resource`, **tampil data (Read)**, route hanya untuk user login (`middleware('auth')`) | `resources/views/layouts/app.blade.php`, `app/Models/Dokter.php`, `app/Http/Controllers/DokterController.php` (`index`), `routes/web.php`, `resources/views/dokter_index.blade.php` |
| 4 | **Tambah data (Create)**: form + method `create` dan `store` | `DokterController` (`create`, `store`), `resources/views/dokter_create.blade.php` |
| 5 | **Validasi** (`required`, `unique`), pesan error `text-danger`, pesan "Data sudah Disimpan", **paginate** | `DokterController` (`validate`, `paginate(3)`), `dokter_create.blade.php`, `layouts/app.blade.php` (alert), `app/Providers/AppServiceProvider.php` (`Paginator::useBootstrap()`), `dokter_index.blade.php` (`links()`) |

Login, register, dan dashboard berasal dari paket `laravel/ui`
(`php artisan ui bootstrap --auth`): `app/Http/Controllers/Auth/*`, `HomeController`,
`resources/views/auth/*`, `resources/views/home.blade.php`.

## Cara menjalankan

Kebutuhan: PHP 8.3+, Composer, Node.js, MySQL (paling mudah dengan **Laragon**, sesuai Pertemuan 1).

1. Laragon → **Start All** (Apache + MySQL).
2. Buat database kosong di HeidiSQL, misalnya `dbklinik_NIM` (Pertemuan 2).
3. Di folder project (VS Code → Ctrl + Shift + C untuk terminal):

   ```bash
   composer install
   copy .env.example .env          # Linux/macOS: cp .env.example .env
   php artisan key:generate
   ```

4. Buka `.env`, sesuaikan `DB_DATABASE` dengan nama database Anda (`DB_USERNAME=root`, `DB_PASSWORD` kosong untuk Laragon).
5. Buat tabel dan isi data contoh:

   ```bash
   php artisan migrate --seed
   ```

   (`--seed` mengisi 7 dokter dan 2 pasien contoh. Tanpa `--seed` tabel kosong dan data bisa diisi lewat menu **Tambah Dokter**.)

6. Siapkan CSS/JS Bootstrap, lalu jalankan server:

   ```bash
   npm install
   npm run build
   php artisan serve
   ```

7. Buka <http://localhost:8000> → **Register** untuk membuat akun → login → menu **Data Klinik → Data Dokter / Tambah Dokter**.

Melihat daftar route: `php artisan route:list`.

## Route

| Method | URL | Route name | Fungsi |
|---|---|---|---|
| GET | `/dokter` | `dokter.index` | Tampil data dokter (paginate 3 baris) |
| GET | `/dokter/create` | `dokter.create` | Form tambah dokter |
| POST | `/dokter` | `dokter.store` | Simpan dokter (validasi + pesan) |
| GET/PUT/DELETE | `/dokter/{id}`, `/dokter/{id}/edit` | `dokter.show/update/destroy/edit` | Sudah terdaftar, isi method masih kosong |

Semua route `dokter` dilindungi `middleware('auth')`: yang belum login diarahkan ke halaman login.

## Catatan penggabungan

- Kode final mengikuti file dosen di `pert5` (controller, view, `AppServiceProvider`); materi Pertemuan 1–4 dari slide dan file `zip1`.
- Placeholder `--Pilih Spesialis--` pada form ditambahkan sesuai slide Pertemuan 5. Tanpa itu, kolom spesialis selalu terisi otomatis sehingga pesan validasi "spesialis required" tidak pernah muncul.
- Struktur HTML navbar dirapikan (`<hr>` dibungkus `<li>`, tag penutup yang tidak seimbang dibereskan). Item placeholder "Link" dan "Disabled" dihapus, sesuai tampilan navbar target di slide Pertemuan 3.
- Halaman `welcome` diganti halaman sederhana berbasis Bootstrap, karena versi bawaan Laravel 13 memakai Tailwind yang tidak dipakai di perkuliahan ini.
- `resources/js/app.js` ditambah `import './bootstrap'` dan `axios` ditambahkan ke `package.json`. Keduanya diperlukan agar dropdown navbar (JavaScript Bootstrap) berfungsi pada skeleton Laravel 13.

## Belum termasuk (belum ada di materi Pertemuan 1–5)

- Menu Data Pasien / Tambah Pasien (masih `#`) dan tabel `administrasis` belum punya halaman.
- Edit dan Hapus dokter (`show`, `edit`, `update`, `destroy` masih kosong).
- Latihan **ProjectAkademik** (data mahasiswa) adalah tugas terpisah.
