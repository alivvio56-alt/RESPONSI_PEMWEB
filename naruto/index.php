<?php
session_start();
require_once '../config/app.php';
require_once '../config/auth_check.php';
$arcs = [
        ['ep'=>'EP001–005', 'title'=>'Prolog Naruto Uzumaki', 'desc'=>'Naruto diperkenalkan sebagai anak yang sering membuat masalah, tetapi menyimpan ambisi besar untuk menjadi Hokage dan diakui desanya.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-prolog-naruto-uzumaki.jpg'],
        ['ep'=>'EP006–019', 'title'=>'Land of Waves', 'desc'=>'Team 7 menjalani misi besar pertama yang memperlihatkan makna shinobi, pengorbanan, dan ikatan antaranggota tim.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-land-of-waves.jpg'],
        ['ep'=>'EP020–067', 'title'=>'Chunin Exams', 'desc'=>'Ujian Chunin mempertemukan Naruto dengan para ninja muda dari desa lain dan memperluas konflik melalui ancaman Orochimaru.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-chunin-exams.jpg'],
        ['ep'=>'EP068–080', 'title'=>'Konoha Crush', 'desc'=>'Serangan ke Konoha mengubah arah cerita dan menunjukkan besarnya risiko politik antar-desa ninja.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-konoha-crush.jpg'],
        ['ep'=>'EP081–100', 'title'=>'Search for Tsunade', 'desc'=>'Naruto bertemu Tsunade dan mulai memahami tanggung jawab serta warisan para ninja legendaris.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-search-for-tsunade.jpg'],
        ['ep'=>'EP107–135', 'title'=>'Sasuke Recovery Mission', 'desc'=>'Konflik Naruto dan Sasuke mencapai titik emosional penting yang menjadi dasar cerita Shippuden.', 'badge'=>'Canon', 'img'=>'../img/arcs/naruto-sasuke-recovery-mission.jpg'],
      ];
$facts = [['Fokus Cerita','Perjalanan awal Naruto'],['Lokasi Utama','Konohagakure'],['Tema','Pengakuan, tekad, persahabatan'],['Posisi Timeline','Generasi Naruto muda']];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Ringkasan anime Naruto: perjalanan Naruto Uzumaki, Team 7, mimpi menjadi Hokage, dan arc penting era awal.">
  <title>Naruto — Naruto Mania</title>
  <link rel="stylesheet" href="../css/style.css?v=6"/>
  <link rel="stylesheet" href="../css/anime.css?v=6"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bangers&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="theme-naruto">
  <nav class="navbar" id="navbar">
    <div class="nav-logo"><a href="../home.php"><img src="../img/logo-naruto.png" alt="Naruto Mania Logo"><span class="logo-text" style="display:none">NARUTO MANIA</span></a></div>
    <div class="nav-links" id="navLinks">
      <a href="../home.php" class="nav-link">Home</a>
      <a href="../naruto/index.php" class="nav-link active">Naruto</a>
      <a href="../shippuden/index.php" class="nav-link ">Shippuden</a>
      <a href="../boruto/index.php" class="nav-link ">Boruto</a>
      <a href="../merch/index.php" class="nav-link">Merch</a>
      <a href="../auth/logout.php" class="nav-link">Logout</a>
      <button class="nav-close" id="navClose" aria-label="Tutup menu">✕</button>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Buka menu"><span></span><span></span><span></span></button>
  </nav>
  <div class="nav-overlay" id="navOverlay"></div>

  <header class="page-hero">
    <div class="hero-bg"><img src="../img/naruto-bg.jpg" alt="Background Naruto"></div>
    <div class="page-hero-content">
      <span class="eyebrow">Anime Guide</span>
      <h1><span class="accent">Naruto</span></h1>
      <p>Awal perjalanan Naruto Uzumaki sebagai ninja Konoha yang mencari pengakuan, membangun ikatan dengan Team 7, dan mengejar mimpi menjadi Hokage.</p>
      <a class="btn" href="#story">Lihat Story Arc</a>
    </div>
  </header>

  <main class="anime-main">
    <div class="content-shell">
      <section class="overview">
        <article class="panel">
          <img class="logo-series" src="../img/logo-naruto.png" alt="Logo Naruto" onerror="this.style.display='none'">
          <h2>Overview</h2>
          <p>Naruto mengikuti kisah Naruto Uzumaki, seorang ninja muda dari Konohagakure yang tumbuh sebagai anak yatim dan sering dikucilkan karena menjadi wadah Kurama, Rubah Ekor Sembilan. Di balik sifatnya yang keras kepala dan penuh energi, Naruto memiliki tujuan jelas: menjadi Hokage agar diakui oleh seluruh desa. Serial ini membangun fondasi besar tentang persahabatan, kerja keras, rivalitas, dan pilihan moral melalui hubungan Naruto dengan Sakura, Sasuke, Kakashi, serta para shinobi lain.</p>
        </article>
        <aside class="panel poster-card"><img src="../img/naruto-poster.jpg" alt="Poster Naruto"></aside>
      </section>

      <section class="facts" aria-label="Fakta singkat Naruto">
        <?php foreach ($facts as $fact): ?>
          <div class="fact-card"><strong><?= htmlspecialchars($fact[0]) ?></strong><span><?= htmlspecialchars($fact[1]) ?></span></div>
        <?php endforeach; ?>
      </section>

      <section class="arc-section" id="story">
        <h2>Story Arc Pilihan</h2>
        <div class="arc-list">
          <?php foreach ($arcs as $i => $arc): ?>
            <article class="arc-item <?= $i === 0 ? 'open' : '' ?>" data-index="<?= $i ?>">
              <button class="arc-header" type="button" onclick="toggleArc(this)">
                <span class="arc-ep"><?= htmlspecialchars($arc['ep']) ?></span>
                <span class="arc-title"><?= htmlspecialchars($arc['title']) ?></span>
                <span class="badge"><?= htmlspecialchars($arc['badge']) ?></span>
                <span class="arc-toggle"><?= $i === 0 ? '−' : '+' ?></span>
              </button>
              <?php if ($i === 0): ?>
                <div class="arc-body"><div class="arc-body-inner"><img class="arc-thumb" src="<?= htmlspecialchars($arc['img']) ?>" alt="<?= htmlspecialchars($arc['title']) ?>" loading="lazy"><div class="arc-body-text"><p><?= htmlspecialchars($arc['desc']) ?></p></div></div></div>
              <?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>
        <p class="sources">Referensi ringkasan: <a href="https://naruto-official.com/en/anime/naruto2" target="_blank" rel="noopener">Naruto Official Site — Shippuden</a>, <a href="https://naruto-official.com/en/anime/boruto" target="_blank" rel="noopener">Naruto Official Site — Boruto</a>, dan <a href="https://en.wikipedia.org/wiki/Naruto_(TV_series)" target="_blank" rel="noopener">Naruto TV Series overview</a>.</p>
      </section>

      <section class="cta-strip">
        <div><h2>Lanjut Jelajah Seri</h2><p>Pindah ke halaman seri lain untuk melihat perbedaan timeline, konflik, dan generasi karakter.</p></div>
        <a class="btn secondary" href="../home.php#series">Kembali ke Seri</a>
      </section>
    </div>
  </main>

  <footer class="footer"><div class="footer-inner"><span>PEMWEB TEKKOM 2026</span><span class="footer-divider">|</span><span>KELOMPOK 4 SHIFT C</span></div></footer>
  <script>window.arcData = <?= json_encode($arcs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;</script>
  <script src="../js/script.js?v=6"></script>
  <script src="../js/anime.js?v=6"></script>
</body>
</html>
