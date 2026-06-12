<?php
session_start();
require_once '../config/app.php';
require_once '../config/auth_check.php';
require_once 'backend/merch_functions.php';

$products = getActiveProducts();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Katalog fan collection Naruto Mania: hoodie, poster, tee, dan art print bertema Naruto, Shippuden, dan Boruto.">
  <title>Merchandise — Naruto Mania</title>
  <link rel="stylesheet" href="../css/style.css?v=5">
  <link rel="stylesheet" href="../css/merchandise.css?v=6">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar" id="navbar">
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
  <div class="nav-overlay" id="navOverlay"></div>

  <header class="merch-hero">
    <img src="../img/shippuden-header-bg.jpg" alt="Background katalog fan collection Naruto" class="merch-hero-image">
    <div class="merch-hero-overlay"></div>
    <div class="merch-hero-content"><p class="eyebrow">Fan Collection Catalog</p><h1>Merchandise</h1><p>Katalog produk sudah terhubung database. User bisa memasukkan barang yang dibeli, lalu admin memproses order.</p></div>
  </header>

  <main class="merch-main">
    <?php if (!empty($_GET['success'])): ?><div class="crud-alert success"><?= htmlspecialchars($_GET['success']) ?></div><?php endif; ?>
    <?php if (!empty($_GET['error'])): ?><div class="crud-alert error"><?= htmlspecialchars($_GET['error']) ?></div><?php endif; ?>

    <section class="merch-intro"><div><p class="section-kicker">Ninja Essentials</p><h2>Choose Your Gear</h2></div><p class="intro-copy">Klik beli untuk memasukkan produk ke database order. Status awal pesanan adalah pending.</p></section>
    <section class="product-grid" aria-label="Daftar merchandise">
      <?php foreach ($products as $product): ?>
        <article class="product-card">
          <div class="product-image-wrap"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image"><span class="product-category"><?= htmlspecialchars($product['category']) ?></span></div>
          <div class="product-info">
            <h3><?= htmlspecialchars($product['name']) ?></h3>
            <p class="product-desc"><?= htmlspecialchars($product['description'] ?? '') ?></p>
            <div class="product-bottom"><strong><?= rupiah((int) $product['price']) ?></strong><span class="stock-badge">Stok: <?= (int) $product['stock'] ?></span></div>
            <form class="order-form" action="backend/order_create.php" method="POST">
              <input type="hidden" name="product_id" value="<?= (int) $product['id'] ?>">
              <div class="form-grid two"><input type="number" name="quantity" value="1" min="1" max="<?= (int) $product['stock'] ?>" required><input type="text" name="buyer_name" value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>" placeholder="Nama pembeli" required></div>
              <input type="text" name="buyer_phone" placeholder="Nomor HP" required>
              <textarea name="buyer_address" placeholder="Alamat pengiriman" required></textarea>
              <input type="text" name="notes" placeholder="Catatan opsional">
              <button type="submit" class="detail-button" <?= ((int) $product['stock'] <= 0) ? 'disabled' : '' ?>>Beli</button>
            </form>
          </div>
        </article>
      <?php endforeach; ?>
    </section>
  </main>

  <footer class="footer"><div class="footer-inner"><span>PEMWEB TEKKOM 2026</span><span class="footer-divider">|</span><span>KELOMPOK 4 SHIFT C</span></div></footer>
  <script src="../js/script.js?v=5"></script><script src="../js/merchandise.js?v=6"></script>
</body>
</html>
