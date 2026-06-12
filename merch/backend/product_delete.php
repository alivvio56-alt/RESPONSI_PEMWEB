<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../manage.php', 'error', 'Request tidak valid.');
}

$id = (int) ($_POST['id'] ?? 0);
$product = findProduct($id);
if (!$product) {
    redirectWithMessage('../manage.php', 'error', 'Produk tidak ditemukan.');
}

try {
    $stmt = getDB()->prepare('DELETE FROM merch_products WHERE id = ?');
    $stmt->execute([$id]);
    redirectWithMessage('../manage.php', 'success', 'Produk berhasil dihapus.');
} catch (PDOException $e) {
    $stmt = getDB()->prepare('UPDATE merch_products SET is_active = 0 WHERE id = ?');
    $stmt->execute([$id]);
    redirectWithMessage('../manage.php', 'success', 'Produk sudah punya transaksi, jadi dinonaktifkan agar data order tetap aman.');
}
?>
