<?php
session_start();
require_once '../config/app.php';

$redirect = $_GET['redirect'] ?? $BASE_URL . 'home.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Masuk ke Naruto Mania untuk membuka halaman Naruto, Naruto Shippuden, Boruto, dan katalog fan collection.">
  <title>Masuk — Naruto Mania</title>
  <link rel="stylesheet" href="../css/login.css?v=4">
</head>
<body>
<div class="page">
  <div class="left">
    <a class="back-link" href="../home.php">← Kembali ke beranda</a>
    <p class="auth-kicker">Member Access</p>
    <h1>Masuk</h1>
    <p class="auth-copy">Gunakan akun Anda untuk membaca ringkasan seri, daftar arc pilihan, dan katalog fan collection.</p>

    <?php if (!empty($_SESSION['success'])): ?>
      <div class="success-message"><?= htmlspecialchars($_SESSION['success']) ?></div>
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
      <div class="error-message"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form action="proses_login.php" method="POST" autocomplete="on">
      <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">

      <label for="username">Username</label>
      <input id="username" type="text" name="username" placeholder="contoh: user" autocomplete="username" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required>

      <button type="submit">Masuk</button>
    </form>

    <p class="auth-note">Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
  </div>

  <div class="right" role="img" aria-label="Naruto login background"></div>
</div>
</body>
</html>
