# Naruto Mania Pro — Penjelasan Singkat Website

**Builder:** Kelompok C4  

**Dedi Kurniawan          H1H024031**

**Ardhis Alivio Rajendra  H1H024031**

**Arifin Budi Kusuma      H1H024040**

---

## 1. Gambaran Umum

**Naruto Mania Pro** adalah website fan portal berbasis **PHP Native** yang berisi informasi ringkas tentang tiga era utama dalam seri Naruto, yaitu **Naruto**, **Naruto Shippuden**, dan **Boruto**. Website ini tidak hanya menampilkan konten informasi anime, tetapi juga dilengkapi fitur **login/register**, pembatasan akses halaman, serta katalog **merchandise** yang terhubung dengan database.

Secara umum, website ini dirancang sebagai proyek pembelajaran pemrograman web yang menggabungkan tampilan antarmuka, pengelolaan session, koneksi database, autentikasi pengguna, dan fitur CRUD sederhana.

---

## 2. Tema dan Tujuan Website

Website ini bertema **portal informasi anime Naruto**. Tujuannya adalah menyediakan halaman informatif yang menampilkan ringkasan seri, daftar story arc pilihan, serta katalog produk fan collection bertema Naruto.

Fokus utama website meliputi:

1. Menyajikan informasi dasar tentang seri Naruto, Shippuden, dan Boruto.
2. Menyediakan sistem akun pengguna melalui fitur login dan register.
3. Membatasi halaman tertentu agar hanya dapat diakses setelah login.
4. Menyediakan katalog merchandise dengan fitur pemesanan.
5. Menyediakan halaman admin untuk mengelola produk dan memproses order.

---

## 3. Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Bahasa backend | PHP Native |
| Database | MySQL |
| Koneksi database | PDO |
| Tampilan frontend | HTML, CSS, JavaScript |
| Styling | CSS custom per halaman |
| Manajemen akun | PHP Session |
| Penyimpanan data | Database `naruto_anime_wiki` |
| Web server lokal | XAMPP/Apache |

---

## 4. Struktur Folder Utama

```text
RESPONSI_PEMWEB-main/
├── auth/              # Halaman login, register, logout, dan proses autentikasi
├── config/            # Konfigurasi aplikasi dan database
├── css/               # File styling website
├── img/               # Gambar logo, poster, background, dan arc anime
├── js/                # JavaScript untuk navigasi dan accordion story arc
├── merch/             # Modul merchandise, CRUD produk, dan order
├── naruto/            # Halaman seri Naruto
├── shippuden/         # Halaman seri Naruto Shippuden
├── boruto/            # Halaman seri Boruto
├── home.php           # Halaman utama website
├── index.php          # Redirect ke home.php
└── README.md          # Dokumentasi awal proyek
```

---

## 5. Halaman dan Fitur Website

### A. Halaman Utama

File utama halaman beranda berada pada:

```text
home.php
```

Halaman ini berfungsi sebagai pintu masuk website. Pada halaman utama terdapat hero section, navigasi, dan kartu pilihan seri anime, yaitu Naruto, Shippuden, dan Boruto. Jika pengguna belum login, akses ke halaman seri dan merchandise akan diarahkan terlebih dahulu ke halaman login.

### B. Sistem Login dan Register

Folder autentikasi berada pada:

```text
auth/
```

Fitur yang tersedia:

- `login.php` untuk halaman masuk pengguna.
- `register.php` untuk halaman pendaftaran akun baru.
- `proses_login.php` untuk validasi login.
- `proses_register.php` untuk menyimpan akun baru.
- `logout.php` untuk keluar dari session.

Sistem login sudah menggunakan **password hashing** melalui `password_hash()` dan validasi password melalui `password_verify()`. Setelah login berhasil, session pengguna disimpan dan halaman tertentu dapat diakses.

### C. Halaman Anime

Website memiliki tiga halaman seri utama:

```text
naruto/index.php
shippuden/index.php
boruto/index.php
```

Setiap halaman berisi:

- Ringkasan cerita.
- Fakta singkat seri.
- Daftar story arc pilihan.
- Gambar pendukung.
- Accordion interaktif untuk membuka detail arc.

Data story arc disimpan dalam array PHP, kemudian dikirim ke JavaScript agar bagian accordion dapat berjalan secara dinamis.

### D. Modul Merchandise

Modul merchandise berada pada:

```text
merch/
```

Fitur merchandise terbagi menjadi dua bagian, yaitu sisi pengguna dan sisi admin.

#### 1. Sisi Pengguna

File utama:

```text
merch/index.php
```

Pengguna dapat melihat produk aktif, mengisi data pembelian, menentukan jumlah barang, dan mengirim pesanan. Pesanan akan masuk ke database dengan status awal `pending`.

#### 2. Sisi Admin

File utama:

```text
merch/manage.php
merch/edit.php
merch/orders.php
```

Admin dapat:

- Menambah produk.
- Mengedit produk.
- Menghapus atau menonaktifkan produk.
- Melihat daftar order masuk.
- Mengubah status order menjadi `pending`, `processed`, `completed`, atau `cancelled`.

Hak akses admin dicek melalui role pengguna pada session.

---

## 6. Database

Database utama yang digunakan adalah:

```text
naruto_anime_wiki
```

File SQL utama:

```text
config/database.sql
merch/sql/merch_tables.sql
```

Tabel utama yang ditemukan:

| Tabel | Fungsi |
|---|---|
| `users` | Menyimpan data akun pengguna dan role |
| `merch_products` | Menyimpan data produk merchandise |
| `merch_orders` | Menyimpan data pesanan merchandise |

Akun demo yang disediakan dalam SQL:

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| User | `user` | `user123` |

---

## 7. Alur Penggunaan Website

```text
Pengunjung membuka website
        ↓
Masuk ke halaman home.php
        ↓
Memilih menu Naruto / Shippuden / Boruto / Merch
        ↓
Jika belum login, diarahkan ke halaman login
        ↓
Setelah login, pengguna dapat mengakses konten
        ↓
Pengguna dapat melihat anime guide atau membeli merchandise
        ↓
Admin dapat mengelola produk dan memproses pesanan
```

---

## 8. Kelebihan Website

1. Struktur folder cukup jelas dan dipisahkan berdasarkan fungsi.
2. Sudah menggunakan autentikasi berbasis session.
3. Password pengguna sudah disimpan dalam bentuk hash.
4. Query database pada bagian penting menggunakan prepared statement PDO.
5. Modul merchandise sudah memiliki fitur CRUD produk dan pengelolaan order.
6. Tampilan website dibuat konsisten menggunakan CSS khusus untuk halaman utama, anime, auth, dan merchandise.
7. Story arc pada halaman anime sudah dibuat interaktif menggunakan JavaScript.

---

## 9. Catatan Teknis dari Hasil Analisis

Beberapa catatan teknis yang perlu diperhatikan sebelum website digunakan atau dipresentasikan:

1. File `config/database.php` pada proyek aktual masih memuat kredensial database secara langsung. Sebaiknya kredensial database tidak ditulis langsung dalam source code apabila proyek akan diunggah ke repository publik.
2. Isi `README.md` menyebutkan konfigurasi database default XAMPP, tetapi file konfigurasi aktual memakai user database khusus. Bagian ini perlu disesuaikan agar dokumentasi dan kode konsisten.
3. File SQL utama `config/database.sql` hanya membuat tabel `users`, sedangkan tabel merchandise berada di file SQL terpisah pada `merch/sql/merch_tables.sql`. Saat instalasi, kedua file SQL perlu diimport.
4. Proyek menyertakan folder `.git` di dalam ZIP. Untuk pengumpulan akhir, folder `.git` biasanya tidak perlu disertakan kecuali memang diminta.
5. Website sudah dicek secara sintaks PHP dan tidak ditemukan error sintaks pada file PHP utama. Namun, pengujian koneksi database belum dilakukan karena membutuhkan server MySQL aktif.

---

## 10. Cara Menjalankan Website di XAMPP

1. Ekstrak folder proyek ke dalam folder:

```text
C:/xampp/htdocs/
```

2. Jalankan **Apache** dan **MySQL** melalui XAMPP Control Panel.

3. Buka phpMyAdmin dan buat/import database dari file:

```text
config/database.sql
merch/sql/merch_tables.sql
```

4. Sesuaikan konfigurasi database pada file:

```text
config/database.php
```

5. Akses website melalui browser:

```text
http://localhost/RESPONSI_PEMWEB-main/
```

---

## 11. Kesimpulan

Berdasarkan isi ZIP, website **Naruto Mania Pro** merupakan web fan portal berbasis PHP Native yang sudah memiliki fitur cukup lengkap untuk proyek pemrograman web. Website ini menggabungkan halaman informasi anime, sistem login/register, pembatasan akses, katalog merchandise, CRUD produk, dan pengelolaan order.

Secara keseluruhan, proyek ini sudah layak disebut sebagai website dinamis sederhana karena tidak hanya menampilkan halaman statis, tetapi juga menggunakan database dan session untuk mengatur akun, produk, serta transaksi pemesanan.
