<?php
session_start();
require_once '../config/app.php';
require_once 'backend/merch_functions.php';
requireAdmin();
$product = findProduct((int) ($_GET['id'] ?? 0));
if (!$product) { header('Location: manage.php?error=' . urlencode('Produk tidak ditemukan.')); exit; }
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Edit Merchandise</title><link rel="stylesheet" href="../css/style.css?v=5"><link rel="stylesheet" href="../css/merchandise.css?v=6"><link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"></head><body><nav class="navbar" id="navbar">
    <div class="nav-logo"><a href="../home.php"><img src="../img/logo-naruto.png" alt="Naruto Mania Logo"></a></div>
    <div class="nav-links" id="navLinks">
      <a href="../home.php" class="nav-link">Home</a>
      <a href="../naruto/index.php" class="nav-link">Naruto</a>
      <a href="../shippuden/index.php" class="nav-link">Shippuden</a>
      <a href="../boruto/index.php" class="nav-link">Boruto</a>
      <a href="index.php" class="nav-link active">Merch</a>
      <?php if (($_SESSION['role'] ?? 'user') === 'admin'): ?>
        <a href="manage.php" class="nav-link">Kelola Produk</a>
        <a href="orders.php" class="nav-link">Order</a>
      <?php endif; ?>
      <a href="../auth/logout.php" class="nav-link">Logout</a>
      <button class="nav-close" id="navClose" aria-label="Tutup menu">✕</button>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Buka menu"><span></span><span></span><span></span></button>
  </nav>
  <div class="nav-overlay" id="navOverlay"></div><main class="merch-main admin-panel"><h1 class="admin-title">Edit Produk</h1><?php if (!empty($_GET['error'])): ?><div class="crud-alert error"><?= htmlspecialchars($_GET['error']) ?></div><?php endif; ?><section class="crud-card"><form action="backend/product_update.php" method="POST" enctype="multipart/form-data" class="crud-form"><input type="hidden" name="id" value="<?= (int) $product['id'] ?>"><div class="form-grid two"><input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required></div><div class="form-grid two"><input type="number" name="price" value="<?= (int) $product['price'] ?>" min="1" required><input type="number" name="stock" value="<?= (int) $product['stock'] ?>" min="0" required></div><textarea name="description"><?= htmlspecialchars($product['description'] ?? '') ?></textarea><p class="intro-copy">Gambar sekarang: <?= htmlspecialchars($product['image']) ?></p><input type="file" name="image" accept="image/jpeg,image/png,image/webp"><label class="check-line"><input type="checkbox" name="is_active" <?= ((int) $product['is_active'] === 1) ? 'checked' : '' ?>> Aktif ditampilkan di page merch</label><button type="submit" class="detail-button">Update Produk</button><a href="manage.php" class="small-button">Kembali</a></form></section></main><script src="../js/script.js?v=5"></script></body></html>