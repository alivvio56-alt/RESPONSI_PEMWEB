// home.js

document.addEventListener('DOMContentLoaded', function () {

  /* ===== NAVBAR SCROLL ===== */
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 60);
  });

  /* ===== HAMBURGER MENU ===== */
  const hamburger  = document.getElementById('hamburger');
  const navLinks   = document.getElementById('navLinks');
  const navOverlay = document.getElementById('navOverlay');
  const navClose   = document.getElementById('navClose');

  function openMenu() {
    navLinks.classList.add('open');
    navOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    navLinks.classList.remove('open');
    navOverlay.classList.remove('active');
    document.body.style.overflow = '';
    // Close all dropdowns
    document.querySelectorAll('.nav-item.open').forEach(el => el.classList.remove('open'));
  }

  hamburger.addEventListener('click', openMenu);
  navClose.addEventListener('click', closeMenu);
  navOverlay.addEventListener('click', closeMenu);

  /* ===== MOBILE DROPDOWN TOGGLE ===== */
  if (window.innerWidth <= 768) {
    document.querySelectorAll('.nav-item.dropdown .nav-link').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const parent = this.closest('.nav-item');
        const isOpen = parent.classList.contains('open');
        // Close all first
        document.querySelectorAll('.nav-item.open').forEach(el => el.classList.remove('open'));
        if (!isOpen) parent.classList.add('open');
      });
    });
  }

  /* ===== INTERSECTION OBSERVER for scroll animations ===== */
  const heroSections = document.querySelectorAll('.hero-section');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.15 });

  heroSections.forEach(section => observer.observe(section));

  /* ===== PARALLAX SUBTLE ===== */
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    heroSections.forEach((section, i) => {
      const img = section.querySelector('.hero-img');
      if (!img) return;
      const rect = section.getBoundingClientRect();
      const inView = rect.top < window.innerHeight && rect.bottom > 0;
      if (inView) {
        const offset = (rect.top / window.innerHeight) * 30;
        img.style.transform = `translateY(${offset}px) scale(1.05)`;
      }
    });
  });

});
