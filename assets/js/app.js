const shell = document.querySelector('.nav-shell');
const toggle = document.querySelector('.menu-toggle');

toggle?.addEventListener('click', () => {
  const open = shell.classList.toggle('open');
  toggle.setAttribute('aria-expanded', String(open));
});

document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', () => shell?.classList.remove('open'));
});
