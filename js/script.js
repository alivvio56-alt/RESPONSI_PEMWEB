document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.getElementById('navLinks');
  const navOverlay = document.getElementById('navOverlay');
  const navClose = document.getElementById('navClose');

  if (navbar) {
    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 30));
  }

  const openMenu = () => {
    if (!navLinks || !navOverlay) return;
    navLinks.classList.add('open');
    navOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeMenu = () => {
    if (!navLinks || !navOverlay) return;
    navLinks.classList.remove('open');
    navOverlay.classList.remove('active');
    document.body.style.overflow = '';
    document.querySelectorAll('.dropdown.open').forEach(el => el.classList.remove('open'));
  };

  hamburger && hamburger.addEventListener('click', openMenu);
  navClose && navClose.addEventListener('click', closeMenu);
  navOverlay && navOverlay.addEventListener('click', closeMenu);

  document.querySelectorAll('.dropdown > .nav-link').forEach(link => {
    link.addEventListener('click', (event) => {
      if (window.innerWidth > 820) return;
      event.preventDefault();
      link.closest('.dropdown')?.classList.toggle('open');
    });
  });
});
