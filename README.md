# Garden Dreams — E-Commerce Laravel

Project e-commerce bunga **Garden Dreams** untuk tugas Fullstack / Backend / Frontend / Database Engineer.

## Teknologi
- Laravel 12
- PHP 8.2+
- MySQL / MariaDB
- Blade
- HTML + CSS
- Session cart
- Eloquent ORM

## Fitur Frontend
- Beranda
- Katalog produk + pencarian, kategori, sorting
- Detail produk
- Keranjang + update jumlah
- Wishlist
- Checkout
- Metode pembayaran dan pengiriman
- Riwayat + detail pesanan
- Lacak status pesanan dan nomor resi
- Pengembalian/penukaran
- Login & register
- Pengaturan akun + ganti password
- Tentang Kami
- Kontak
- FAQ
- Syarat & Ketentuan
- Kebijakan Privasi
- Testimoni
- Blog/berita
- Promo/diskon

## Fitur Backend / Admin
Login sebagai admin akan membuka `/admin`.

- Dashboard
- Manajemen produk: tambah/edit/hapus
- Manajemen kategori
- Manajemen stok + peringatan stok menipis
- Manajemen pelanggan
- Manajemen pesanan + status + resi
- Manajemen pembayaran
- Manajemen metode pengiriman
- Manajemen pengembalian
- Manajemen pengguna + role
- Manajemen promo
- Manajemen blog
- Moderasi testimoni
- Pengaturan website
- Laporan keuangan
- CRM pelanggan
- Analitik & statistik

## Database
Database utama tetap memakai tabel yang sudah ada pada project awal:
`users`, `kategori`, `produk`, `stok`, `transaksi`, `detail_transaksi`, `pembayaran`.

Ditambahkan tabel:
`wishlist`, `promo`, `testimoni`, `blog`, `pengiriman`, `pengembalian`, `pengaturan`.

Relasi utama:
- kategori 1:N produk
- produk 1:1 stok
- user 1:N transaksi
- transaksi 1:N detail transaksi
- produk 1:N detail transaksi
- transaksi 1:1 pembayaran
- user 1:N wishlist
- produk 1:N wishlist
- transaksi 1:N pengembalian

## Cara menjalankan di XAMPP
1. Extract project ke `htdocs`.
2. Jalankan Apache dan MySQL.
3. Buat database MySQL bernama `garden_dreams`.
4. Pastikan `.env`:
   - `DB_CONNECTION=mysql`
   - `DB_DATABASE=garden_dreams`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=` sesuai MySQL lokal.
5. Buka terminal pada folder project.
6. Jalankan:
```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
7. Buka `http://127.0.0.1:8000`.

Jika dependency belum ada:
```bash
composer install
```

## Akun demo
Admin:
- Email: `admin@gardendreams.test`
- Password: `password`

User dapat membuat akun sendiri melalui halaman Register.

## Catatan
- Pembayaran dibuat sebagai simulasi untuk kebutuhan tugas. Tombol konfirmasi akan mengubah status pembayaran menjadi berhasil dan pesanan menjadi diproses.
- Login Google pada tampilan adalah placeholder UI. OAuth Google membutuhkan konfigurasi Client ID/Secret dari Google Cloud.
- Data produk yang sudah ada di database project awal tidak dihapus oleh migration tambahan.
- Seeder hanya menambahkan data contoh jika tabel tertentu masih kosong.
