/* ═══════════════════════════════════════════════════════════════
   portfolio.js
   ═══════════════════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

    /* ──────────────────────────────────────────────────────────
       1. SCROLL ANIMATION ENGINE
       Key behaviour:
       - Triggers IN  when element enters viewport (scroll down)
       - Triggers OUT when element leaves viewport  (scroll up)
       - So every time you scroll past a section it animates again
    ────────────────────────────────────────────────────────── */
    initScrollAnimations();

    /* ──────────────────────────────────────────────────────────
       2. NAVBAR scroll shadow
    ────────────────────────────────────────────────────────── */
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        }, { passive: true });
    }

    /* ──────────────────────────────────────────────────────────
       3. ACTIVE nav link — highlights as you scroll
    ────────────────────────────────────────────────────────── */
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

    /* ──────────────────────────────────────────────────────────
       4. MOBILE MENU
    ────────────────────────────────────────────────────────── */
    const menuBtn    = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach(a =>
            a.addEventListener('click', () => mobileMenu.classList.add('hidden'))
        );
    }

});


/* ═══════════════════════════════════════════════════════════════
   SCROLL ANIMATION ENGINE
   ═══════════════════════════════════════════════════════════════
   Uses IntersectionObserver with threshold 0 so we get BOTH
   entry and exit callbacks. On enter → add .sa-visible (animates in).
   On exit  → remove .sa-visible (resets, ready for next scroll).

   Supported data-sa values:
     fade-up | fade-down | fade-left (=slide-left) | fade-right (=slide-right)
     slide-left | slide-right | scale-up | fade

   data-sa-delay="200"  → ms delay before the in-animation plays
   data-sa-stagger      → on a container, children get auto stagger

   sa-group             → shorthand: marks a flex/grid container
                          whose children each animate in sequence
   ═══════════════════════════════════════════════════════════════ */
function initScrollAnimations() {

    /* Inject base CSS once */
    if (!document.getElementById('sa-styles')) {
        const style = document.createElement('style');
        style.id = 'sa-styles';
        style.textContent = `
            /* Individual animated elements */
            .sa {
                will-change: opacity, transform;
                transition-property: opacity, transform;
                transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
                transition-duration: 0.65s;
            }

            /* Default hidden states per animation type */
            .sa[data-sa="fade-up"]    { opacity:0; transform:translateY(44px); }
            .sa[data-sa="fade-down"]  { opacity:0; transform:translateY(-36px); }
            .sa[data-sa="fade-left"],
            .sa[data-sa="slide-left"] { opacity:0; transform:translateX(-50px); }
            .sa[data-sa="fade-right"],
            .sa[data-sa="slide-right"]{ opacity:0; transform:translateX(50px); }
            .sa[data-sa="scale-up"]   { opacity:0; transform:scale(0.88); }
            .sa[data-sa="fade"]       { opacity:0; transform:none; }

            /* Visible state — same for all */
            .sa.sa-visible {
                opacity: 1 !important;
                transform: none !important;
            }

            /* sa-group: the container itself doesn't animate,
               but each child does with stagger */
            .sa-group > * {
                opacity: 0;
                transform: translateY(32px);
                will-change: opacity, transform;
                transition: opacity 0.55s cubic-bezier(0.22,1,0.36,1),
                            transform 0.55s cubic-bezier(0.22,1,0.36,1);
            }
            /* Each child gets a stagger via nth-child delays */
            .sa-group.sa-visible > *:nth-child(1)  { transition-delay: 0.04s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(2)  { transition-delay: 0.12s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(3)  { transition-delay: 0.20s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(4)  { transition-delay: 0.28s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(5)  { transition-delay: 0.36s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(6)  { transition-delay: 0.44s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(7)  { transition-delay: 0.52s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(8)  { transition-delay: 0.60s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(9)  { transition-delay: 0.68s;  opacity:1; transform:none; }
            .sa-group.sa-visible > *:nth-child(10) { transition-delay: 0.76s;  opacity:1; transform:none; }

            /* Exit state — remove delays so exit is instant/quick */
            .sa-group:not(.sa-visible) > * {
                transition-delay: 0s !important;
                opacity: 0 !important;
                transform: translateY(32px) !important;
            }
        `;
        document.head.appendChild(style);
    }

    /* ── Observe individual .sa elements ── */
    const saObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const el    = entry.target;
            const delay = parseInt(el.dataset.saDelay || '0', 10);

            if (entry.isIntersecting) {
                /* Animate IN */
                setTimeout(() => el.classList.add('sa-visible'), delay);
            } else {
                /* Animate OUT — reset immediately so it's ready next pass */
                el.classList.remove('sa-visible');
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    /* ── Observe .sa-group containers ── */
    const groupObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('sa-visible');
            } else {
                entry.target.classList.remove('sa-visible');
            }
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -30px 0px'
    });

    document.querySelectorAll('.sa').forEach(el => saObserver.observe(el));
    document.querySelectorAll('.sa-group').forEach(el => groupObserver.observe(el));
}


/* ═══════════════════════════════════════════════════════════════
   THEME TOGGLE
   ═══════════════════════════════════════════════════════════════ */

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
