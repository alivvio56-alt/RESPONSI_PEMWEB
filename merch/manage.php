<?php
session_start();
require_once '../config/app.php';
require_once 'backend/merch_functions.php';
requireAdmin();
$products = getAllProducts();
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Kelola Merchandise</title><link rel="stylesheet" href="../css/style.css?v=5"><link rel="stylesheet" href="../css/merchandise.css?v=6"><link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"></head><body><nav class="navbar" id="navbar">
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
  <div class="nav-overlay" id="navOverlay"></div><main class="merch-main admin-panel"><h1 class="admin-title">CRUD Merchandise</h1><?php if (!empty($_GET['success'])): ?><div class="crud-alert success"><?= htmlspecialchars($_GET['success']) ?></div><?php endif; ?><?php if (!empty($_GET['error'])): ?><div class="crud-alert error"><?= htmlspecialchars($_GET['error']) ?></div><?php endif; ?><section class="crud-card"><h2>Tambah Produk</h2><form action="backend/product_create.php" method="POST" enctype="multipart/form-data" class="crud-form"><div class="form-grid two"><input type="text" name="name" placeholder="Nama produk" required><input type="text" name="category" placeholder="Kategori" required></div><div class="form-grid two"><input type="number" name="price" placeholder="Harga angka, contoh 250000" min="1" required><input type="number" name="stock" placeholder="Stok" min="0" required></div><textarea name="description" placeholder="Deskripsi produk"></textarea><input type="file" name="image" accept="image/jpeg,image/png,image/webp"><label class="check-line"><input type="checkbox" name="is_active" checked> Aktif ditampilkan di page merch</label><button type="submit" class="detail-button">Simpan Produk</button></form></section><section class="crud-card"><h2>Data Produk</h2><div class="table-wrap"><table class="crud-table"><thead><tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th>Aksi</th></tr></thead><tbody><?php foreach ($products as $product): ?><tr><td><?= htmlspecialchars($product['name']) ?></td><td><?= htmlspecialchars($product['category']) ?></td><td><?= rupiah((int) $product['price']) ?></td><td><?= (int) $product['stock'] ?></td><td><?= ((int) $product['is_active'] === 1) ? 'Aktif' : 'Nonaktif' ?></td><td class="action-cell"><a class="small-button" href="edit.php?id=<?= (int) $product['id'] ?>">Edit</a><form action="backend/product_delete.php" method="POST" onsubmit="return confirm('Hapus produk ini?')"><input type="hidden" name="id" value="<?= (int) $product['id'] ?>"><button class="small-button danger" type="submit">Hapus</button></form></td></tr><?php endforeach; ?></tbody></table></div></section></main><script src="../js/script.js?v=5"></script></body></html>