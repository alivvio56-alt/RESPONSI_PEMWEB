<?php
session_start();
require_once '../config/app.php';
require_once '../config/auth_check.php';
$arcs = [
        ['ep'=>'EP001–032', 'title'=>'Kazekage Rescue', 'desc'=>'Naruto pulang ke Konoha dan segera bergerak menyelamatkan Gaara setelah Akatsuki mulai memburu para Jinchuriki.', 'badge'=>'Canon', 'img'=>'../img/arcs/shippuden-kazekage-rescue.jpg'],
        ['ep'=>'EP033–053', 'title'=>'Long-Awaited Reunion', 'desc'=>'Naruto, Sakura, dan tim baru mengejar jejak Sasuke serta menghadapi konsekuensi hubungan lama Team 7.', 'badge'=>'Canon', 'img'=>'../img/arcs/shippuden-long-awaited-reunion.jpg'],
        ['ep'=>'EP072–088', 'title'=>'Hidan and Kakuzu', 'desc'=>'Team 10 menghadapi duo Akatsuki yang memperlihatkan bahaya nyata organisasi tersebut.', 'badge'=>'Canon', 'img'=>'../img/arcs/shippuden-hidan-and-kakuzu.jpg'],
        ['ep'=>'EP113–143', 'title'=>'Itachi Pursuit Mission', 'desc'=>'Pertarungan dan pengungkapan masa lalu Uchiha mengubah posisi Sasuke dalam konflik utama.', 'badge'=>'Canon', 'img'=>'../img/arcs/shippuden-itachi-pursuit-mission.jpg'],
        ['ep'=>'EP152–175', 'title'=>'Pain’s Assault', 'desc'=>'Naruto menghadapi Pain dalam salah satu konflik paling menentukan bagi Konoha dan pengakuan dirinya.', 'badge'=>'Canon', 'img'=>'../img/arcs/shippuden-pains-assault.jpg'],
        ['ep'=>'EP256–479', 'title'=>'Fourth Shinobi World War', 'desc'=>'Aliansi Shinobi berhadapan dengan ancaman global yang menguji seluruh dunia ninja.', 'badge'=>'Canon/Mixed', 'img'=>'../img/arcs/shippuden-fourth-shinobi-world-war.jpg'],
      ];
$facts = [['Fokus Cerita','Akatsuki dan Sasuke'],['Awal Konflik','Penculikan Gaara'],['Tema','Pengorbanan, perang, rekonsiliasi'],['Posisi Timeline','Setelah timeskip 2,5 tahun']];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Ringkasan Naruto Shippuden: Naruto kembali setelah latihan bersama Jiraiya, Akatsuki memburu Jinchuriki, dan Perang Dunia Shinobi Keempat.">
  <title>Naruto Shippuden — Naruto Mania</title>
  <link rel="stylesheet" href="../css/style.css?v=6"/>
  <link rel="stylesheet" href="../css/anime.css?v=6"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bangers&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="theme-shippuden">
  <nav class="navbar" id="navbar">
    <div class="nav-logo"><a href="../home.php"><img src="../img/logo-naruto.png" alt="Naruto Mania Logo"><span class="logo-text" style="display:none">NARUTO MANIA</span></a></div>
    <div class="nav-links" id="navLinks">
      <a href="../home.php" class="nav-link">Home</a>
      <a href="../naruto/index.php" class="nav-link ">Naruto</a>
      <a href="../shippuden/index.php" class="nav-link active">Shippuden</a>
      <a href="../boruto/index.php" class="nav-link ">Boruto</a>
      <a href="../merch/index.php" class="nav-link">Merch</a>
      <a href="../auth/logout.php" class="nav-link">Logout</a>
      <button class="nav-close" id="navClose" aria-label="Tutup menu">✕</button>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Buka menu"><span></span><span></span><span></span></button>
  </nav>
  <div class="nav-overlay" id="navOverlay"></div>

  <header class="page-hero">
    <div class="hero-bg"><img src="../img/shippuden-bg.jpg" alt="Background Naruto Shippuden"></div>
    <div class="page-hero-content">
      <span class="eyebrow">Anime Guide</span>
      <h1><span class="accent">Shippuden</span></h1>
      <p>Sekuel yang membawa Naruto ke konflik lebih dewasa: Akatsuki, Sasuke, Jinchuriki, dan perang besar yang menentukan nasib dunia shinobi.</p>
      <a class="btn" href="#story">Lihat Story Arc</a>
    </div>
  </header>

  <main class="anime-main">
    <div class="content-shell">
      <section class="overview">
        <article class="panel">
          <img class="logo-series" src="../img/logo-shippuden.png" alt="Logo Naruto Shippuden" onerror="this.style.display='none'">
          <h2>Overview</h2>
          <p>Naruto Shippuden dimulai hampir dua setengah tahun setelah pertarungan di Final Valley. Naruto kembali ke Konoha setelah berlatih bersama Jiraiya, sementara Sakura, Kakashi, dan teman-temannya juga berkembang pesat. Namun, ancaman Akatsuki semakin terbuka ketika organisasi itu mulai memburu para Jinchuriki dan menculik Gaara, Kazekage dari Sunagakure. Dibanding seri awal, Shippuden memiliki skala konflik lebih besar, tone lebih matang, dan pertarungan yang semakin menentukan masa depan dunia ninja.</p>
          <p>..</p>
        </article>
        <aside class="panel poster-card"><img src="../img/shippuden-poster.jpg" alt="Poster Naruto Shippuden"></aside>
      </section>

      <section class="facts" aria-label="Fakta singkat Naruto Shippuden">
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
