<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../manage.php', 'error', 'Request tidak valid.');
}

try {
    $name = cleanInput($_POST['name'] ?? '');
    $category = cleanInput($_POST['category'] ?? '');
    $price = (int) ($_POST['price'] ?? 0);
    $stock = (int) ($_POST['stock'] ?? 0);
    $description = cleanInput($_POST['description'] ?? '');
    $isActive = isset($_POST['is_active']) ? 1 : 0;

    if ($name === '' || $category === '' || $price <= 0 || $stock < 0) {
        redirectWithMessage('../manage.php', 'error', 'Nama, kategori, harga, dan stok wajib valid.');
    }

    $image = saveUploadedImage($_FILES['image'] ?? []) ?? '../img/naruto-poster.jpg';

    $stmt = getDB()->prepare('INSERT INTO merch_products (name, category, price, stock, image, description, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $category, $price, $stock, $image, $description, $isActive]);

    redirectWithMessage('../manage.php', 'success', 'Produk berhasil ditambahkan.');
} catch (Throwable $e) {
    redirectWithMessage('../manage.php', 'error', $e->getMessage());
}
?>
