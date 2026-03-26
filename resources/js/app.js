import './bootstrap';
import Lenis from '@studio-freight/lenis';

document.addEventListener("DOMContentLoaded", () => {
    const clamp = (value, min, max) => Math.min(Math.max(value, min), max);
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const coarsePointer = window.matchMedia('(hover: none) and (pointer: coarse)').matches;

    // 1. Initialize Lenis for Smooth Scrolling
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    // 2. Intersection Observer for Scroll Animations
    // Select all elements that should animate in on scroll
    const revealElements = document.querySelectorAll('.reveal-up');

    const observerOptions = {
        root: null, // viewport
        rootMargin: '0px 0px -10% 0px', // Trigger slighly before bottom
        threshold: 0.1 // 10% visible
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    revealElements.forEach(el => revealObserver.observe(el));

    // 3. Premium hover tracking for cards on pointer devices
    const floatCards = document.querySelectorAll('.float-card');
    const featureCards = document.querySelectorAll('.feature-card');
    const heroScene = document.querySelector('.hero-scene');

    const resetCardMotion = (card) => {
        card.style.setProperty('--pointer-x', '50%');
        card.style.setProperty('--pointer-y', '50%');
        card.style.setProperty('--card-rotate-x', '0deg');
        card.style.setProperty('--card-rotate-y', '0deg');
    };

    const triggerFeatureGlow = (card) => {
        if (!card) return;

        card.classList.remove('flash-glow');
        void card.offsetWidth;
        card.classList.add('flash-glow');

        clearTimeout(card._featureGlowTimeout);
        card._featureGlowTimeout = window.setTimeout(() => {
            card.classList.remove('flash-glow');
        }, 850);
    };

    const attachFloatCardMotion = (card) => {
        let frameId = null;

        const updateCardMotion = (event) => {
            const rect = card.getBoundingClientRect();
            const x = clamp(((event.clientX - rect.left) / rect.width) * 100, 0, 100);
            const y = clamp(((event.clientY - rect.top) / rect.height) * 100, 0, 100);
            const rotateX = clamp((50 - y) / 6, -7, 7);
            const rotateY = clamp((x - 50) / 7, -7, 7);

            frameId = requestAnimationFrame(() => {
                card.style.setProperty('--pointer-x', `${x}%`);
                card.style.setProperty('--pointer-y', `${y}%`);
                card.style.setProperty('--card-rotate-x', `${rotateX}deg`);
                card.style.setProperty('--card-rotate-y', `${rotateY}deg`);
            });
        };

        card.addEventListener('mouseenter', () => resetCardMotion(card));
        card.addEventListener('mousemove', (event) => {
            if (frameId) cancelAnimationFrame(frameId);
            updateCardMotion(event);
        });
        card.addEventListener('mouseleave', () => {
            if (frameId) cancelAnimationFrame(frameId);
            resetCardMotion(card);
        });
        card.addEventListener('focusin', () => card.classList.add('is-active'));
        card.addEventListener('focusout', () => card.classList.remove('is-active'));
    };

    if (supportsHover && !prefersReducedMotion) {
        floatCards.forEach(attachFloatCardMotion);

        featureCards.forEach(card => {
            card.addEventListener('mouseenter', () => triggerFeatureGlow(card));
        });
    }

    if (heroScene && supportsHover && !prefersReducedMotion) {
        let heroFrame = null;

        const resetHeroDrift = () => {
            heroScene.style.setProperty('--hero-drift-x', '0px');
            heroScene.style.setProperty('--hero-drift-y', '0px');
        };

        heroScene.addEventListener('mousemove', (event) => {
            const rect = heroScene.getBoundingClientRect();
            const offsetX = ((event.clientX - rect.left) / rect.width - 0.5) * 20;
            const offsetY = ((event.clientY - rect.top) / rect.height - 0.5) * 16;

            if (heroFrame) cancelAnimationFrame(heroFrame);
            heroFrame = requestAnimationFrame(() => {
                heroScene.style.setProperty('--hero-drift-x', `${offsetX.toFixed(2)}px`);
                heroScene.style.setProperty('--hero-drift-y', `${offsetY.toFixed(2)}px`);
            });
        });

        heroScene.addEventListener('mouseleave', () => {
            if (heroFrame) cancelAnimationFrame(heroFrame);
            resetHeroDrift();
        });
    }

    // 4. Mobile touch stay-active for float-cards
    if (coarsePointer) {
        floatCards.forEach(card => {
            card.addEventListener('click', function() {
                if (this.classList.contains('feature-card')) {
                    this.classList.add('is-active');
                    triggerFeatureGlow(this);

                    clearTimeout(this._mobileActiveTimeout);
                    this._mobileActiveTimeout = window.setTimeout(() => {
                        this.classList.remove('is-active');
                    }, 700);

                    return;
                }

                floatCards.forEach(c => {
                    if (c !== this) c.classList.remove('is-active');
                });

                this.classList.toggle('is-active');
            });
        });
    }
});
