<?php
session_start();
require_once __DIR__ . '/merch_functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('../manage.php', 'error', 'Request tidak valid.');
}

try {
    $id = (int) ($_POST['id'] ?? 0);
    $product = findProduct($id);
    if (!$product) {
        redirectWithMessage('../manage.php', 'error', 'Produk tidak ditemukan.');
    }

    $name = cleanInput($_POST['name'] ?? '');
    $category = cleanInput($_POST['category'] ?? '');
    $price = (int) ($_POST['price'] ?? 0);
    $stock = (int) ($_POST['stock'] ?? 0);
    $description = cleanInput($_POST['description'] ?? '');
    $isActive = isset($_POST['is_active']) ? 1 : 0;

    if ($name === '' || $category === '' || $price <= 0 || $stock < 0) {
        redirectWithMessage('../edit.php?id=' . $id, 'error', 'Nama, kategori, harga, dan stok wajib valid.');
    }

    $image = saveUploadedImage($_FILES['image'] ?? []) ?? $product['image'];

    $stmt = getDB()->prepare('UPDATE merch_products SET name = ?, category = ?, price = ?, stock = ?, image = ?, description = ?, is_active = ? WHERE id = ?');
    $stmt->execute([$name, $category, $price, $stock, $image, $description, $isActive, $id]);

    redirectWithMessage('../manage.php', 'success', 'Produk berhasil diperbarui.');
} catch (Throwable $e) {
    redirectWithMessage('../manage.php', 'error', $e->getMessage());
}
?>
