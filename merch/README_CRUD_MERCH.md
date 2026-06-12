# CRUD Merchandise Naruto Mania

Folder ini menambahkan back-end CRUD merchandise tanpa mengubah folder `config`.

## File utama yang ditambahkan

- `merch/manage.php` — halaman admin untuk tambah, lihat, edit, hapus produk.
- `merch/edit.php` — halaman edit produk.
- `merch/orders.php` — halaman admin untuk memproses order masuk.
- `merch/backend/merch_functions.php` — helper koneksi, validasi login/admin, format rupiah, query produk/order, upload gambar.
- `merch/backend/product_create.php` — proses tambah produk.
- `merch/backend/product_update.php` — proses update produk.
- `merch/backend/product_delete.php` — proses hapus/nonaktif produk.
- `merch/backend/order_create.php` — proses user membeli produk dari `merch/index.php` dan masuk ke database.
- `merch/backend/order_update.php` — proses update status order.
- `merch/backend/order_delete.php` — proses hapus order.
- `merch/sql/merch_tables.sql` — SQL tabel produk dan order.
- `merch/uploads/` — folder upload gambar produk.

## Cara pakai

1. Import SQL berikut ke database `naruto_anime_wiki`:
   `merch/sql/merch_tables.sql`
2. Login sebagai admin.
3. Buka `merch/manage.php` untuk mengelola produk.
4. Buka `merch/orders.php` untuk memproses order.
5. User membeli produk dari `merch/index.php`.

## Status order

- `pending` — order baru masuk.
- `processed` — order sedang diproses admin.
- `completed` — order selesai.
- `cancelled` — order dibatalkan.
