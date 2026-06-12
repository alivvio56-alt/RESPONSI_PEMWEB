# Naruto Mania Pro — Siap Deploy

Web fan portal berbasis PHP Native untuk materi Naruto, Naruto Shippuden, Boruto, dan katalog merchandise simulasi.

## Perbaikan Utama

- Copywriting halaman Naruto, Shippuden, dan Boruto sudah ditulis ulang agar lebih rapi, profesional, dan faktual.
- Struktur SEO dasar ditambahkan: title, meta description, alt text, heading yang lebih konsisten.
- Accordion story arc dibuat generik melalui `js/anime.js`, sehingga data arc tidak lagi hard-coded khusus Shippuden.
- Konfigurasi `BASE_URL` dibuat otomatis mengikuti nama folder project di `htdocs`.
- Kredensial database sensitif dihapus dari file; default memakai konfigurasi XAMPP (`root` tanpa password).
- Login memakai `session_regenerate_id(true)` setelah autentikasi berhasil.
- UI dibuat lebih konsisten untuk home, anime detail, merch, login, dan register.

## Cara Deploy di XAMPP

1. Ekstrak folder `Naruto_Mania_Pro_Deploy` ke:
   ```bash
   C:/xampp/htdocs/
   ```
2. Jalankan Apache dan MySQL dari XAMPP Control Panel.
3. Buka phpMyAdmin, lalu import:
   ```bash
   config/database.sql
   ```
4. Buka browser:
   ```bash
   http://localhost/Naruto_Mania_Pro_Deploy/
   ```

## Akun Demo

Gunakan akun dari `database.sql`:

- Username: `admin`
- Password: `admin123`

atau

- Username: `user`
- Password: `user123`

## Catatan

Website ini merupakan fan project untuk pembelajaran pemrograman web. Katalog merchandise hanya simulasi dan bukan toko resmi.
