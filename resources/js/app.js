// ===================================================================
// OXMOSYS-TECH — Animations & interactions
// ===================================================================

document.addEventListener('DOMContentLoaded', () => {

    // -----------------------------------------------------------------
    // 1. THEME TOGGLE — dark / light
    // -----------------------------------------------------------------
    const THEME_KEY = 'oxmosys-theme';
    const root      = document.documentElement;

    // Sync icon with actual current state (set by the blocking <script>)
    function syncThemeUI() {
        const isDark = root.classList.contains('dark');

        // Desktop
        const icon  = document.getElementById('theme-icon');
        if (icon)  icon.textContent  = isDark ? 'light_mode' : 'dark_mode';

        // Mobile
        const mIcon  = document.getElementById('theme-icon-mobile');
        const mLabel = document.getElementById('theme-label-mobile');
        if (mIcon)  mIcon.textContent  = isDark ? 'light_mode' : 'dark_mode';
        if (mLabel) mLabel.textContent = isDark ? 'Passer en mode clair' : 'Passer en mode sombre';
    }

    function toggleTheme() {
        // Add transition class so switching is smooth
        root.classList.add('theme-switching');

        const goingDark = !root.classList.contains('dark');
        root.classList.toggle('dark', goingDark);
        localStorage.setItem(THEME_KEY, goingDark ? 'dark' : 'light');

        syncThemeUI();

        // Remove transition class after animation completes
        setTimeout(() => root.classList.remove('theme-switching'), 350);
    }

    syncThemeUI();

    document.getElementById('theme-toggle')?.addEventListener('click', toggleTheme);
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', toggleTheme);

    // -----------------------------------------------------------------
    // 2. Scroll reveal — Intersection Observer
    // -----------------------------------------------------------------
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -60px 0px',
    });

    document.querySelectorAll('[data-animate]').forEach(el => revealObserver.observe(el));

    // -----------------------------------------------------------------
    // 3. Counter animation (stats)
    // -----------------------------------------------------------------
    function animateCounter(el) {
        const raw    = el.dataset.target || el.textContent.trim();
        const num    = parseInt(raw, 10);
        const suffix = raw.replace(/^\d+/, '');   // '+', '/7', etc.

        if (isNaN(num)) return;

        const duration = 1600;
        const startTs  = performance.now();

        function tick(now) {
            const elapsed  = now - startTs;
            const progress = Math.min(elapsed / duration, 1);
            const eased    = 1 - Math.pow(1 - progress, 3); // ease-out cubic
            el.textContent = Math.floor(eased * num) + suffix;
            if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.6 });

    document.querySelectorAll('[data-counter]').forEach(el => counterObserver.observe(el));

    // -----------------------------------------------------------------
    // 4. Navbar — shadow + background reinforcement on scroll
    // -----------------------------------------------------------------
    const navbar = document.querySelector('header.fixed');
    if (navbar) {
        const onScroll = () => {
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 50);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // -----------------------------------------------------------------
    // 5. Tilt effect on service cards (desktop only)
    // -----------------------------------------------------------------
    if (!window.matchMedia('(max-width: 768px)').matches) {
        document.querySelectorAll('.tilt-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x    = (e.clientX - rect.left) / rect.width  - 0.5;
                const y    = (e.clientY - rect.top)  / rect.height - 0.5;
                card.style.transform =
                    `perspective(600px) rotateX(${(-y * 6).toFixed(2)}deg) rotateY(${(x * 6).toFixed(2)}deg) translateY(-4px)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    // -----------------------------------------------------------------
    // 6. Ripple effect on buttons with class .btn-ripple
    // -----------------------------------------------------------------
    if (!document.getElementById('ripple-style')) {
        const s = document.createElement('style');
        s.id = 'ripple-style';
        s.textContent = `@keyframes ripple { to { transform:scale(2.5); opacity:0; } }`;
        document.head.appendChild(s);
    }

    // -----------------------------------------------------------------
    // 7. Back to top button
    // -----------------------------------------------------------------
    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
        const toggleBackToTop = () => {
            backToTop.classList.toggle('opacity-0',            window.scrollY < 400);
            backToTop.classList.toggle('pointer-events-none',  window.scrollY < 400);
            backToTop.classList.toggle('translate-y-4',        window.scrollY < 400);
        };
        window.addEventListener('scroll', toggleBackToTop, { passive: true });
        toggleBackToTop();
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // -----------------------------------------------------------------
    // 8. FAQ accordion
    // -----------------------------------------------------------------
    document.querySelectorAll('.faq-item').forEach(item => {
        const btn    = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const icon   = item.querySelector('.faq-icon');
        if (!btn) return;

        btn.addEventListener('click', () => {
            const isOpen = !answer.classList.contains('hidden');
            // Close all
            document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(i => { i.textContent = 'add'; });
            document.querySelectorAll('.faq-item').forEach(it => it.classList.remove('faq-open'));
            // Open clicked if it was closed
            if (!isOpen) {
                answer.classList.remove('hidden');
                icon.textContent = 'remove';
                item.classList.add('faq-open');
            }
        });
    });

    // -----------------------------------------------------------------
    // 9. Form submit — loading state on button
    // -----------------------------------------------------------------
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function () {
            const btn = form.querySelector('[type="submit"]:not([data-no-loading])');
            if (!btn || btn.disabled) return;
            const original = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin shrink-0" style="width:18px;height:18px" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="40" stroke-dashoffset="10" opacity="0.3"/>
                    <path d="M12 2a10 10 0 0 1 10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                Envoi en cours…
            `;
            // Safety net — re-enable after 10s in case of error
            setTimeout(() => { btn.disabled = false; btn.innerHTML = original; }, 10000);
        });
    });

    // -----------------------------------------------------------------
    // 10. Ripple effect on buttons with class .btn-ripple
    // -----------------------------------------------------------------
    document.querySelectorAll('.btn-ripple').forEach(btn => {
        btn.addEventListener('click', function (e) {
            const d    = Math.max(btn.clientWidth, btn.clientHeight);
            const rect = btn.getBoundingClientRect();
            const el   = document.createElement('span');
            el.style.cssText = `
                position:absolute; border-radius:50%; pointer-events:none;
                width:${d}px; height:${d}px;
                left:${e.clientX - rect.left - d / 2}px;
                top:${e.clientY - rect.top  - d / 2}px;
                background:rgba(255,255,255,0.25);
                transform:scale(0);
                animation:ripple 0.55s ease-out forwards;
            `;
            btn.style.position = 'relative';
            btn.style.overflow = 'hidden';
            btn.appendChild(el);
            setTimeout(() => el.remove(), 600);
        });
    });

});
