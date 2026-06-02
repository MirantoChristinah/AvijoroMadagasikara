/* ============================================================
   AVIJORO — main.js  (partagé entre toutes les pages)
   ============================================================ */

/* ── Hamburger / Drawer ── */
const hamburger = document.getElementById('hamburger');
const drawer    = document.getElementById('drawer');
const overlay   = document.getElementById('drawerOverlay');
const drawerClose = document.getElementById('drawerClose');

function openDrawer() {
  drawer.classList.add('open');
  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeDrawer() {
  drawer.classList.remove('open');
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}
hamburger?.addEventListener('click', openDrawer);
drawerClose?.addEventListener('click', closeDrawer);
overlay?.addEventListener('click', closeDrawer);

/* Accordion parent links in drawer */
document.querySelectorAll('.drawer-parent').forEach(btn => {
  btn.addEventListener('click', e => {
    e.preventDefault();
    const sub = btn.nextElementSibling;
    btn.classList.toggle('open');
    sub?.classList.toggle('open');
  });
});

/* ── Active nav link ── */
const currentPage = location.pathname.split('/').pop() || 'index.html';
document.querySelectorAll('.nav-link, .drawer-link').forEach(link => {
  if (link.getAttribute('href') === currentPage) link.classList.add('active');
});

/* ── Back to top ── */
const backTop = document.getElementById('backTop');
window.addEventListener('scroll', () => {
  backTop?.classList.toggle('visible', window.scrollY > 400);
});
backTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

/* ── Scroll reveal ── */
const reveals = document.querySelectorAll('.reveal');
const io = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
}, { threshold: 0.12 });
reveals.forEach(el => io.observe(el));

/* ── FAQ accordion ── */
document.querySelectorAll('.faq-question').forEach(q => {
  q.addEventListener('click', () => {
    const answer = q.nextElementSibling;
    const isOpen = q.classList.contains('active');
    document.querySelectorAll('.faq-question').forEach(x => { x.classList.remove('active'); x.nextElementSibling?.classList.remove('open'); });
    if (!isOpen) { q.classList.add('active'); answer?.classList.add('open'); }
  });
});

/* ── Filter tabs ── */
document.querySelectorAll('.filter-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    tab.closest('.filter-tabs').querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    const filter = tab.dataset.filter;
    document.querySelectorAll('[data-category]').forEach(card => {
      card.closest('.card-wrap').style.display = (filter === 'all' || card.dataset.category === filter) ? '' : 'none';
    });
  });
});

/* ── Donation amount buttons ── */
document.querySelectorAll('.amount-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    btn.closest('.amount-grid').querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const customInput = document.getElementById('customAmount');
    if (btn.dataset.value === 'custom') { customInput?.focus(); }
    else if (customInput) { customInput.value = btn.dataset.value || ''; }
  });
});

/* ── Donation method selection ── */
document.querySelectorAll('.donation-method').forEach(m => {
  m.addEventListener('click', () => {
    document.querySelectorAll('.donation-method').forEach(x => x.classList.remove('active'));
    m.classList.add('active');
    const panels = document.querySelectorAll('.method-panel');
    panels.forEach(p => p.style.display = 'none');
    const target = document.getElementById(m.dataset.method + 'Panel');
    if (target) target.style.display = 'block';
  });
});

/* ── Navbar scroll shadow ── */
window.addEventListener('scroll', () => {
  document.querySelector('.navbar')?.classList.toggle('scrolled', window.scrollY > 10);
});

/* ── Smooth scroll for anchor links ── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      const offset = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--navbar-h')) || 72;
      window.scrollTo({ top: target.offsetTop - offset - 8, behavior: 'smooth' });
      closeDrawer();
    }
  });
});

/* ── Counter animation ── */
function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const duration = 1500;
  const step = target / (duration / 16);
  let current = 0;
  const timer = setInterval(() => {
    current += step;
    if (current >= target) { current = target; clearInterval(timer); }
    el.textContent = Math.floor(current).toLocaleString() + (el.dataset.suffix || '');
  }, 16);
}
const counterObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); counterObs.unobserve(e.target); } });
}, { threshold: 0.5 });
document.querySelectorAll('[data-target]').forEach(el => counterObs.observe(el));
