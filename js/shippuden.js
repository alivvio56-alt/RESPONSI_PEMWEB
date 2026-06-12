// shippuden.js

/* ===== NAVBAR ===== */
document.addEventListener('DOMContentLoaded', function () {
  const hamburger  = document.getElementById('hamburger');
  const navLinks   = document.getElementById('navLinks');
  const navOverlay = document.getElementById('navOverlay');
  const navClose   = document.getElementById('navClose');

  function openMenu()  { navLinks.classList.add('open'); navOverlay.classList.add('active'); document.body.style.overflow = 'hidden'; }
  function closeMenu() { navLinks.classList.remove('open'); navOverlay.classList.remove('active'); document.body.style.overflow = ''; }

  hamburger && hamburger.addEventListener('click', openMenu);
  navClose  && navClose.addEventListener('click', closeMenu);
  navOverlay && navOverlay.addEventListener('click', closeMenu);
});

/* ===== ARC ACCORDION ===== */
function toggleArc(btn) {
  const item = btn.closest('.arc-item');
  const isOpen = item.classList.contains('open');

  // Close all
  document.querySelectorAll('.arc-item.open').forEach(el => {
    el.classList.remove('open');
    const body = el.querySelector('.arc-body');
    if (body) body.remove();
    const toggle = el.querySelector('.arc-toggle');
    if (toggle) toggle.textContent = '+';
  });

  if (isOpen) return; // clicked an open one → just close

  // Open this one
  item.classList.add('open');
  const toggle = item.querySelector('.arc-toggle');
  if (toggle) toggle.textContent = '−';

  // Build body if it has data
  const idx   = parseInt(item.dataset.index);
  const arc   = arcData[idx];
  if (!arc || !arc.desc) return;

  const body = document.createElement('div');
  body.className = 'arc-body';
  body.innerHTML = `
    <div class="arc-body-inner">
      ${arc.img ? `<img src="${arc.img}" alt="${arc.title}" class="arc-thumb" onerror="this.style.display='none'"/>` : ''}
      <div class="arc-body-text">
        <p>${arc.desc}</p>
        <a href="#" class="see-overview-btn">SEE THE OVERVIEW OF EACH STORY <span>→</span></a>
      </div>
    </div>`;
  item.appendChild(body);
}

// Arc data (mirror of PHP array)
const arcData = [
  {
    ep: "EP221 – 252",
    title: "Kazekage Rescue",
    img: "../img/shippuden-arc1.jpg",
    desc: "A mysterious figure passes through the gates. It's an older Naruto, who has returned from a long training journey with Jiraiya. Naruto Uzumaki is back!"
  },
  { ep: "EP253 – 273", title: "Long-Awaited Reunion",                    img: "", desc: "Naruto and his allies face new enemies in their long-awaited reunion arc." },
  { ep: "EP274 – 291", title: "Guardian Shinobi Twelve",                 img: "", desc: "A special team of twelve elite shinobi are tasked with protecting the Land of Fire." },
  { ep: "EP292 – 308", title: "Immortal Devastators: Hidan and Kakuzu",  img: "", desc: "Team 10 faces the immortal duo Hidan and Kakuzu, members of the Akatsuki." },
  { ep: "EP309 – 332", title: "Three-Tails' Appearance",                 img: "", desc: "The Three-Tails beast appears and both sides race to capture or protect it." },
  { ep: "EP333 – 363", title: "Master's Prophecy and Vengeance",         img: "", desc: "Jiraiya sets out on a dangerous mission tied to a prophecy about the Child of Destiny." },
  { ep: "EP364 – 371", title: "Six-Tails Unleashed",                     img: "", desc: "Utakata, the Six-Tails jinchuriki, is targeted by the Akatsuki." },
  { ep: "EP372 – 395", title: "Two Saviors",                             img: "", desc: "Naruto and Killer Bee emerge as the two great saviors of the ninja world." },
];
