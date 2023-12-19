# Panduan Penggunaan Sistem Pembelian Tiket dan Manajemen Data Cinemax

Ini adalah panduan untuk menggunakan Sistem Pembelian Tiket dan Manajemen Data Cinemax, dua domain yang berbeda dan terintegrasi.

## Persiapan Awal

Sebelum memulai, pastikan Anda telah memenuhi persyaratan berikut:

- **Composer**: Pastikan Anda telah mengunduh Composer jika belum.
  [Unduh Composer di sini](https://getcomposer.org/doc/00-intro.md)

- **Database**: Siapkan database MySQL dengan nama gotix untuk Sistem Pembelian Tiket dan bioskop untuk Manajemen Data.

## Instalasi dan Penggunaan Sistem Pembelian Tiket

1. Unduh atau clone repositori Cinemax.
2. Buka terminal/command prompt dan arahkan ke direktori Cinemax.
3. Jalankan perintah npm i untuk menginstal dependensi.
4. Jalankan perintah php spark migrate untuk menginisialisasi skema database.
5. Gunakan perintah php spark db:seed PaymentSeeder untuk mengisi data pembayaran.
6. Gunakan perintah php spark db:seed TicketSeeder untuk mengisi data tiket.
7. Gunakan perintah php spark db:seed UsersSeeder untuk menambahkan pengguna.
8. Jalankan sistem dengan perintah `php spark serve`.

## Instalasi dan Penggunaan Sistem Manajemen Data

1. Unduh atau clone repositori Bioskop TST.
2. Buka terminal/command prompt dan arahkan ke direktori Bioskop TST.
3. Jalankan perintah php spark migrate untuk menginisialisasi skema database.
4. Gunakan perintah php spark db:seed MovieSeeder untuk mengisi data film.
5. Gunakan perintah php spark db:seed StudioSeeder untuk mengisi data studio.
6. Gunakan perintah php spark db:seed ScheduleSeeder untuk mengisi jadwal tayang.
7. Gunakan perintah php spark db:seed UsersSeeder untuk menambahkan pengguna.
8. Jalankan sistem dengan perintah `php spark serve`.

