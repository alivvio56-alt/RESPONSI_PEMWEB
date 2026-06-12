<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../orders.php', 'error', 'Request tidak valid.');
}

$id = (int) ($_POST['id'] ?? 0);
$stmt = getDB()->prepare('DELETE FROM merch_orders WHERE id = ?');
$stmt->execute([$id]);
redirectWithMessage('../orders.php', 'success', 'Pesanan berhasil dihapus.');
?>
