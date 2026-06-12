<?php
session_start();
require_once '../config/app.php';
require_once '../config/auth_check.php';
$arcs = [
        ['ep'=>'EP001–015', 'title'=>'Academy Entrance', 'desc'=>'Boruto memulai kehidupan akademi di Konoha modern dan menghadapi fenomena misterius yang mengganggu desa.', 'badge'=>'Anime Canon', 'img'=>'../img/arcs/boruto-academy-entrance.jpg'],
        ['ep'=>'EP019–024', 'title'=>'Sarada Uchiha', 'desc'=>'Sarada mencari jawaban tentang keluarganya dan memperkuat posisinya sebagai bagian dari generasi baru.', 'badge'=>'Manga/Anime', 'img'=>'../img/arcs/boruto-sarada-uchiha.jpg'],
        ['ep'=>'EP051–066', 'title'=>'Chunin Exams / Momoshiki', 'desc'=>'Ujian Chunin mempertemukan Boruto dengan tekanan sebagai anak Hokage dan ancaman Otsutsuki.', 'badge'=>'Canon', 'img'=>'../img/arcs/boruto-chunin-exams-momoshiki.jpg'],
        ['ep'=>'EP120–136', 'title'=>'One-Tail Escort', 'desc'=>'Boruto terlibat dalam misi yang menghubungkan generasi baru dengan warisan para Jinchuriki.', 'badge'=>'Anime Canon', 'img'=>'../img/arcs/boruto-one-tail-escort.jpg'],
        ['ep'=>'EP157–180', 'title'=>'Kara Actuation', 'desc'=>'Ancaman Kara mulai diperkenalkan sebagai organisasi berbahaya di era baru.', 'badge'=>'Anime Canon', 'img'=>'../img/arcs/boruto-kara-actuation.jpg'],
        ['ep'=>'EP181–220', 'title'=>'Kawaki / Kara', 'desc'=>'Kawaki memasuki pusat cerita dan membuka konflik besar yang mengubah arah Boruto.', 'badge'=>'Canon/Mixed', 'img'=>'../img/arcs/boruto-kawaki-kara.jpg'],
      ];
$facts = [['Fokus Cerita','Generasi baru shinobi'],['Tokoh Utama','Boruto Uzumaki'],['Tema','Identitas, modernisasi, warisan'],['Posisi Timeline','Setelah Naruto menjadi Hokage']];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Ringkasan Boruto: Naruto Next Generations: era modern Konoha, Boruto Uzumaki, generasi baru shinobi, dan tantangan pasca-era Naruto.">
  <title>Boruto — Naruto Mania</title>
  <link rel="stylesheet" href="../css/style.css?v=6"/>
  <link rel="stylesheet" href="../css/anime.css?v=6"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bangers&family=Oswald:wght@400;600;700&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="theme-boruto">
  <nav class="navbar" id="navbar">
    <div class="nav-logo"><a href="../home.php"><img src="../img/logo-naruto.png" alt="Naruto Mania Logo"><span class="logo-text" style="display:none">NARUTO MANIA</span></a></div>
    <div class="nav-links" id="navLinks">
      <a href="../home.php" class="nav-link">Home</a>
      <a href="../naruto/index.php" class="nav-link ">Naruto</a>
      <a href="../shippuden/index.php" class="nav-link ">Shippuden</a>
      <a href="../boruto/index.php" class="nav-link active">Boruto</a>
      <a href="../merch/index.php" class="nav-link">Merch</a>
      <a href="../auth/logout.php" class="nav-link">Logout</a>
      <button class="nav-close" id="navClose" aria-label="Tutup menu">✕</button>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Buka menu"><span></span><span></span><span></span></button>
  </nav>
  <div class="nav-overlay" id="navOverlay"></div>

  <header class="page-hero">
    <div class="hero-bg"><img src="../img/boruto-bg.jpg" alt="Background Boruto"></div>
    <div class="page-hero-content">
      <span class="eyebrow">Anime Guide</span>
      <h1><span class="accent">Boruto</span></h1>
      <p>Era baru Konoha yang lebih damai dan modern, dilihat dari Boruto Uzumaki serta generasi shinobi setelah Naruto menjadi Hokage Ketujuh.</p>
      <a class="btn" href="#story">Lihat Story Arc</a>
    </div>
  </header>

  <main class="anime-main">
    <div class="content-shell">
      <section class="overview">
        <article class="panel">
          <img class="logo-series" src="../img/boruto-logo.png" alt="Logo Boruto" onerror="this.style.display='none'">
          <h2>Overview</h2>
          <p>Boruto menampilkan Konohagakure yang memasuki masa damai dan modern, dengan gedung tinggi, layar besar, dan sistem transportasi yang berkembang. Naruto Uzumaki kini menjadi Hokage Ketujuh, sementara putranya, Boruto, memulai perjalanan sendiri di Akademi Ninja. Cerita Boruto tidak sekadar mengulang kisah Naruto; fokusnya berada pada beban identitas sebagai anak Hokage, perubahan peran shinobi, dan tantangan baru yang muncul di era teknologi dan perdamaian.</p>
          <p>.....</p>
        </article>
        <aside class="panel poster-card"><img src="../img/boruto-poster.jpg" alt="Poster Boruto"></aside>
      </section>

      <section class="facts" aria-label="Fakta singkat Boruto">
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
