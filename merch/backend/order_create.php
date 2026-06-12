<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../index.php', 'error', 'Request tidak valid.');
}

try {
    $productId = (int) ($_POST['product_id'] ?? 0);
    $quantity = max(1, (int) ($_POST['quantity'] ?? 1));
    $buyerName = cleanInput($_POST['buyer_name'] ?? ($_SESSION['username'] ?? ''));
    $buyerPhone = cleanInput($_POST['buyer_phone'] ?? '');
    $buyerAddress = cleanInput($_POST['buyer_address'] ?? '');
    $notes = cleanInput($_POST['notes'] ?? '');

    $product = findProduct($productId);
    if (!$product || (int) $product['is_active'] !== 1) {
        redirectWithMessage('../index.php', 'error', 'Produk tidak tersedia.');
    }
    if ($buyerName === '' || $buyerPhone === '' || $buyerAddress === '') {
        redirectWithMessage('../index.php', 'error', 'Nama, nomor HP, dan alamat wajib diisi.');
    }
    if ($quantity > (int) $product['stock']) {
        redirectWithMessage('../index.php', 'error', 'Stok tidak cukup.');
    }

    $pdo = getDB();
    $pdo->beginTransaction();

    $total = (int) $product['price'] * $quantity;
    $stmt = $pdo->prepare('INSERT INTO merch_orders (product_id, user_id, buyer_name, buyer_phone, buyer_address, quantity, total_price, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$productId, $_SESSION['user_id'] ?? null, $buyerName, $buyerPhone, $buyerAddress, $quantity, $total, $notes]);

    $stmt = $pdo->prepare('UPDATE merch_products SET stock = stock - ? WHERE id = ?');
    $stmt->execute([$quantity, $productId]);

    $pdo->commit();
    redirectWithMessage('../index.php', 'success', 'Pesanan berhasil masuk database dan menunggu diproses admin.');
} catch (Throwable $e) {
    if (getDB()->inTransaction()) {
        getDB()->rollBack();
    }
    redirectWithMessage('../index.php', 'error', $e->getMessage());
}
?>
