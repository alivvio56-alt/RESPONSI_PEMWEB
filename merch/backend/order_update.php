<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../orders.php', 'error', 'Request tidak valid.');
}

$id = (int) ($_POST['id'] ?? 0);
$status = cleanInput($_POST['status'] ?? 'pending');
$allowed = ['pending', 'processed', 'completed', 'cancelled'];

if (!in_array($status, $allowed, true)) {
    redirectWithMessage('../orders.php', 'error', 'Status tidak valid.');
}

$stmt = getDB()->prepare('UPDATE merch_orders SET status = ? WHERE id = ?');
$stmt->execute([$status, $id]);
redirectWithMessage('../orders.php', 'success', 'Status pesanan berhasil diperbarui.');
?>
