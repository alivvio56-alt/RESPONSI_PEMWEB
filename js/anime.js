function toggleArc(button) {
  const item = button.closest('.arc-item');
  const index = Number(item.dataset.index);
  const data = window.arcData?.[index];
  const isOpen = item.classList.contains('open');

  document.querySelectorAll('.arc-item.open').forEach(openItem => {
    openItem.classList.remove('open');
    const body = openItem.querySelector('.arc-body');
    if (body) body.remove();
    const toggle = openItem.querySelector('.arc-toggle');
    if (toggle) toggle.textContent = '+';
  });

  if (isOpen || !data) return;

  item.classList.add('open');
  button.querySelector('.arc-toggle').textContent = '−';

  const imageSrc = data.img ? escapeHtml(data.img) : '';
  const imageAlt = data.title ? escapeHtml(data.title) : 'Story arc image';

  const body = document.createElement('div');
  body.className = 'arc-body';
  body.innerHTML = `
    <div class="arc-body-inner">
      <img class="arc-thumb" src="${imageSrc}" alt="${imageAlt}" loading="lazy">
      <div class="arc-body-text"><p>${escapeHtml(data.desc)}</p></div>
    </div>`;
  item.appendChild(body);
}

function escapeHtml(value) {
  return String(value)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#039;');
}
