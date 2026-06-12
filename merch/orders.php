<?php
session_start();
require_once '../config/app.php';
require_once 'backend/merch_functions.php';
requireAdmin();
$orders = getOrders();
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Order Merchandise</title><link rel="stylesheet" href="../css/style.css?v=5"><link rel="stylesheet" href="../css/merchandise.css?v=6"><link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"></head><body><nav class="navbar" id="navbar">
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
  <div class="nav-overlay" id="navOverlay"></div><main class="merch-main admin-panel"><h1 class="admin-title">Proses Order</h1><?php if (!empty($_GET['success'])): ?><div class="crud-alert success"><?= htmlspecialchars($_GET['success']) ?></div><?php endif; ?><?php if (!empty($_GET['error'])): ?><div class="crud-alert error"><?= htmlspecialchars($_GET['error']) ?></div><?php endif; ?><section class="crud-card"><h2>Data Order Masuk</h2><div class="table-wrap"><table class="crud-table"><thead><tr><th>Produk</th><th>Pembeli</th><th>Kontak</th><th>Qty</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead><tbody><?php foreach ($orders as $order): ?><tr><td><?= htmlspecialchars($order['product_name']) ?><br><small><?= htmlspecialchars($order['created_at']) ?></small></td><td><?= htmlspecialchars($order['buyer_name']) ?><br><small><?= htmlspecialchars($order['buyer_address']) ?></small></td><td><?= htmlspecialchars($order['buyer_phone']) ?></td><td><?= (int) $order['quantity'] ?></td><td><?= rupiah((int) $order['total_price']) ?></td><td><?= htmlspecialchars($order['status']) ?></td><td class="action-cell"><form action="backend/order_update.php" method="POST"><input type="hidden" name="id" value="<?= (int) $order['id'] ?>"><select name="status"><option value="pending" <?= $order['status']==='pending'?'selected':'' ?>>pending</option><option value="processed" <?= $order['status']==='processed'?'selected':'' ?>>processed</option><option value="completed" <?= $order['status']==='completed'?'selected':'' ?>>completed</option><option value="cancelled" <?= $order['status']==='cancelled'?'selected':'' ?>>cancelled</option></select><button class="small-button" type="submit">Update</button></form><form action="backend/order_delete.php" method="POST" onsubmit="return confirm('Hapus order ini?')"><input type="hidden" name="id" value="<?= (int) $order['id'] ?>"><button class="small-button danger" type="submit">Hapus</button></form></td></tr><?php endforeach; ?></tbody></table></div></section></main><script src="../js/script.js?v=5"></script></body></html>