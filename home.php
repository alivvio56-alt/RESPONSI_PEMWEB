<?php
session_start();
require_once 'config/app.php';
$loggedIn = isset($_SESSION['user_id']);
function authLink(string $target): string {
    global $loggedIn, $BASE_URL;
    return $loggedIn ? $BASE_URL . $target : $BASE_URL . 'auth/login.php?redirect=' . urlencode($BASE_URL . $target);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Naruto Mania adalah web fan portal berisi ringkasan Naruto, Naruto Shippuden, Boruto, daftar arc pilihan, dan katalog fan collection.">
  <title>Naruto Mania — Fan Portal Naruto, Shippuden & Boruto</title>
  <link rel="stylesheet" href="css/style.css?v=5"/>
  <link rel="stylesheet" href="css/home.css?v=5"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bangers&family=Oswald:wght@400;700&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>
<body>
  <nav class="navbar" id="navbar">
    <div class="nav-logo"><a href="<?= $BASE_URL ?>home.php"><img src="img/logo-naruto.png" alt="Naruto Mania Logo"><span class="logo-text" style="display:none">NARUTO MANIA</span></a></div>
    <div class="nav-links" id="navLinks">
      <div class="nav-item dropdown">
        <a href="#" class="nav-link">Anime <span class="arrow">▾</span></a>
        <div class="dropdown-menu">
          <a href="<?= authLink('naruto/index.php') ?>" class="dropdown-item"><span class="dot naruto-dot"></span>Naruto</a>
          <a href="<?= authLink('shippuden/index.php') ?>" class="dropdown-item"><span class="dot shippuden-dot"></span>Naruto Shippuden</a>
          <a href="<?= authLink('boruto/index.php') ?>" class="dropdown-item"><span class="dot boruto-dot"></span>Boruto</a>
        </div>
      </div>
      <a href="<?= authLink('merch/index.php') ?>" class="nav-link">Merch</a>
      <?php if ($loggedIn): ?>
        <span class="nav-user">Halo, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
        <a href="auth/logout.php" class="nav-link">Logout</a>
      <?php else: ?>
        <a href="auth/login.php" class="nav-link">Masuk</a>
      <?php endif; ?>
      <button class="nav-close" id="navClose" aria-label="Tutup menu">✕</button>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Buka menu"><span></span><span></span><span></span></button>
  </nav>
  <div class="nav-overlay" id="navOverlay"></div>

  <header class="home-hero">
    <div class="home-hero-content">
      <span class="eyebrow">Fan Portal • Anime Timeline</span>
      <h1>NARUTO <span>MANIA</span></h1>
      <p class="lead">Jelajahi perjalanan Naruto Uzumaki dari ninja yang mencari pengakuan, konflik besar melawan Akatsuki, sampai era baru Boruto di Konoha yang lebih modern.</p>
      <div class="hero-actions">
        <a class="btn" href="<?= authLink('naruto/index.php') ?>">Mulai dari Naruto</a>
        <a class="btn secondary" href="#series">Lihat Seri</a>
      </div>
    </div>
  </header>

  <main>
    <section class="series-showcase" id="series">
      <div class="section-head">
        <div>
          <span class="section-kicker">Series Guide</span>
          <h2>Tiga Era Shinobi</h2>
        </div>
        <p> .</p>
      </div>
      <div class="series-grid">
        <article class="series-card">
          <img src="img/naruto-bg.jpg" alt="Naruto Uzumaki di era awal anime Naruto">
          <div class="card-content"><span class="card-tag">Original Series</span><h3>Naruto</h3><p>Awal perjalanan Naruto, Team 7, ujian Chunin, dan konflik yang membentuk ambisinya menjadi Hokage.</p><a class="btn" href="<?= authLink('naruto/index.php') ?>">Buka Halaman</a></div>
        </article>
        <article class="series-card">
          <img src="img/shippuden-bg.jpg" alt="Naruto Shippuden">
          <div class="card-content"><span class="card-tag">Sequel</span><h3>Shippuden</h3><p>Naruto kembali setelah latihan bersama Jiraiya saat Akatsuki mulai memburu para Jinchuriki.</p><a class="btn" href="<?= authLink('shippuden/index.php') ?>">Buka Halaman</a></div>
        </article>
        <article class="series-card">
          <img src="img/boruto-bg.jpg" alt="Boruto Naruto Next Generations">
          <div class="card-content"><span class="card-tag">Next Generation</span><h3>Boruto</h3><p>Era damai dan modern Konoha, dilihat dari perjalanan Boruto Uzumaki dan generasi baru shinobi.</p><a class="btn" href="<?= authLink('boruto/index.php') ?>">Buka Halaman</a></div>
        </article>
      </div>
    </section>

  </main>

  <footer class="footer"><div class="footer-inner"><span>PEMWEB TEKKOM 2026</span><span class="footer-divider">|</span><span>KELOMPOK 4 SHIFT C</span></div></footer>
  <script src="js/script.js?v=5"></script>
</body>
</html>
