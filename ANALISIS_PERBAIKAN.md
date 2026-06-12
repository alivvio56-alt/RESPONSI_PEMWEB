# Analisis dan Perbaikan Proyek

## Masalah yang ditemukan

1. Copywriting belum konsisten: bahasa Indonesia dan Inggris bercampur tanpa pola.
2. Beberapa ringkasan anime terlalu umum dan belum menekankan perbedaan timeline Naruto, Shippuden, dan Boruto.
3. JavaScript accordion memakai data Shippuden secara hard-coded, sehingga halaman lain berisiko menampilkan detail arc yang tidak sesuai.
4. File database menyimpan username dan password database secara langsung; ini tidak aman untuk deploy.
5. `BASE_URL` masih manual sehingga mudah rusak bila nama folder proyek berubah.
6. SEO dasar belum maksimal: meta description, alt text, dan struktur heading belum konsisten.
7. Merchandise memakai klaim “official fan collection”; diganti menjadi “fan collection catalog” agar lebih aman dan akurat.

## Perbaikan yang dilakukan

1. Menulis ulang seluruh halaman utama dan halaman anime dengan copywriting lebih profesional.
2. Mengacu pada ringkasan Naruto Official Site untuk Shippuden dan Boruto, serta overview seri Naruto.
3. Membuat CSS khusus halaman anime di `css/anime.css`.
4. Membuat JS accordion generik di `js/anime.js`.
5. Mengubah `config/app.php` agar BASE_URL otomatis.
6. Mengubah `config/database.php` agar tidak menyimpan kredensial pribadi.
7. Memperbaiki halaman login dan register agar lebih rapi, informatif, dan siap digunakan.
8. Menambahkan README deployment yang lebih relevan untuk XAMPP.
