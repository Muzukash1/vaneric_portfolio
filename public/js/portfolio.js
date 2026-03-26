/* =============================================================
   portfolio.js — Production JS (no CDN dependencies)
   ============================================================= */

document.addEventListener('DOMContentLoaded', () => {

    /* ── Scroll animation engine ── */
    initScrollAnimations();

    /* ── Navbar scroll shadow ── */
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        }, { passive: true });
    }

    /* ── Active nav link ── */
    const sections = document.querySelectorAll('section[id]');
    const navLinks  = document.querySelectorAll('.nav-link');
    const sectionObs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                navLinks.forEach(l =>
                    l.classList.toggle('active', l.getAttribute('href') === '#' + e.target.id)
                );
            }
        });
    }, { rootMargin: '-40% 0px -55% 0px' });
    sections.forEach(s => sectionObs.observe(s));

    /* ── Mobile menu ── */
    const menuBtn    = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach(a =>
            a.addEventListener('click', () => mobileMenu.classList.add('hidden'))
        );
    }

    /* ── Theme: sync UI on load ── */
    const isDark = document.getElementById('html-root')?.classList.contains('dark') ?? true;
    updateToggleUI(isDark);

    if (typeof lucide !== 'undefined') lucide.createIcons();
});

/* ── Scroll animation engine ── */
function initScrollAnimations() {
    const saObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const el    = entry.target;
            const delay = parseInt(el.dataset.saDelay || '0', 10);
            if (entry.isIntersecting) {
                setTimeout(() => el.classList.add('sa-visible'), delay);
            } else {
                el.classList.remove('sa-visible');
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    const groupObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('sa-visible');
            } else {
                entry.target.classList.remove('sa-visible');
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

    document.querySelectorAll('.sa').forEach(el => saObserver.observe(el));
    document.querySelectorAll('.sa-group').forEach(el => groupObserver.observe(el));
}

/* ── Theme toggle ── */
function toggleTheme() {
    const html   = document.getElementById('html-root');
    const isDark = html.classList.contains('dark');
    html.classList.toggle('dark', !isDark);
    localStorage.setItem('portfolio-theme', !isDark ? 'dark' : 'light');
    updateToggleUI(!isDark);
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

function updateToggleUI(isDark) {
    const knob     = document.getElementById('toggle-knob');
    const track    = document.getElementById('toggle-track');
    const sun      = document.getElementById('toggle-sun');
    const moon     = document.getElementById('toggle-moon');
    const knobIcon = document.getElementById('knob-icon');
    if (!knob) return;

    if (isDark) {
        knob.style.transform   = 'translateX(0px)';
        knob.style.background  = 'linear-gradient(135deg,#7B5CF0,#A78BFA)';
        track.style.background = 'linear-gradient(135deg,#1A1A2E,#12121F)';
        sun.style.opacity  = '0'; sun.style.transform  = 'translateY(-50%) scale(0.6)';
        moon.style.opacity = '1'; moon.style.transform = 'translateY(-50%) scale(1)';
        if (knobIcon) knobIcon.setAttribute('data-lucide', 'moon');
    } else {
        knob.style.transform   = 'translateX(28px)';
        knob.style.background  = 'linear-gradient(135deg,#FFD700,#FFA500)';
        track.style.background = 'linear-gradient(135deg,#ECEEFF,#D4CFFF)';
        sun.style.opacity  = '1'; sun.style.transform  = 'translateY(-50%) scale(1)';
        moon.style.opacity = '0'; moon.style.transform = 'translateY(-50%) scale(0.6)';
        if (knobIcon) knobIcon.setAttribute('data-lucide', 'sun');
    }
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

/* ── Portfolio tab switcher (global) ── */
function switchTab(tab) {
    document.querySelectorAll('.portfolio-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));
    document.getElementById('tab-' + tab).classList.add('active');
    const panel = document.getElementById('panel-' + tab);
    panel.classList.remove('hidden');
    panel.querySelectorAll('.sa,.sa-group').forEach(el => {
        el.classList.remove('sa-visible');
        void el.offsetWidth;
        setTimeout(() => el.classList.add('sa-visible'), 60);
    });
    if (typeof lucide !== 'undefined') lucide.createIcons();
}
