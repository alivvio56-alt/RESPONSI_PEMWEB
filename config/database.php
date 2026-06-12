<?php
// ============================================
// FILE: config/database.php
// Fungsi: Koneksi PDO ke MySQL
// ============================================

// Konfigurasi database
define('DB_HOST', 'localhost');
define('DB_NAME', 'naruto_anime_wiki');
define('DB_USER', 'posuser');
define('DB_PASS', 'ArdhisRajendra###24031@jimaildotkom');
define('DB_CHARSET', 'utf8mb4');

// Opsi PDO yang direkomendasikan
$options = [
    // Lempar exception jika ada error (bukan diam-diam gagal)
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    
    // Hasil query berupa array asosiatif (bisa pakai $row['nama'])
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    
    // Gunakan prepared statements bawaan MySQL (lebih aman)
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Buat koneksi PDO
function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("<strong>Error Koneksi:</strong> " . htmlspecialchars($e->getMessage()));
        }
    }
    return $pdo;
}
?>