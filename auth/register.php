<?php
session_start();

$error = $_SESSION['error'] ?? '';
$oldUsername = $_SESSION['old_username'] ?? '';
unset($_SESSION['error'], $_SESSION['old_username']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Daftar akun Naruto Mania untuk mengakses halaman seri Naruto, Naruto Shippuden, Boruto, dan katalog fan collection.">
  <title>Daftar — Naruto Mania</title>
  <link rel="stylesheet" href="../css/register.css?v=4">
</head>
<body>
<div class="page">
  <div class="left">
    <a class="back-link" href="../home.php">← Kembali ke beranda</a>
    <p class="auth-kicker">Create Account</p>
    <h1>Daftar Akun</h1>
    <p class="auth-copy">Buat akun sederhana untuk membuka seluruh halaman konten Naruto Mania.</p>

    <?php if ($error !== ''): ?>
      <div class="error-message" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="proses_register.php" method="POST" autocomplete="on">
      <label for="username">Username</label>
      <input id="username" type="text" name="username" value="<?= htmlspecialchars($oldUsername) ?>" placeholder="Huruf, angka, titik, underscore" minlength="3" maxlength="50" pattern="[A-Za-z0-9_.-]+" autocomplete="username" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" placeholder="Minimal 6 karakter" minlength="6" autocomplete="new-password" required>

      <label for="confirm_password">Konfirmasi Password</label>
      <input id="confirm_password" type="password" name="confirm_password" placeholder="Ulangi password" minlength="6" autocomplete="new-password" required>

      <button type="submit">Daftar</button>
    </form>

    <p class="login-link">Sudah memiliki akun? <a href="login.php">Masuk</a></p>
  </div>
  <div class="right" role="img" aria-label="Naruto registration background"></div>
</div>
</body>
</html>
