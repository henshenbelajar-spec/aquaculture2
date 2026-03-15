import './bootstrap';
import Lenis from '@studio-freight/lenis';

document.addEventListener("DOMContentLoaded", () => {
    const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

    // 1. Initialize Lenis for Smooth Scrolling
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // https://www.desmos.com/calculator/brs54l4xou
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    // lenis.on('scroll', (e) => {
    //     console.log(e)
    // })

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
                // Add the visible class to trigger the animation
                entry.target.classList.add('is-visible');
                
                // Optionally stop observing once revealed
                // observer.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    revealElements.forEach(el => revealObserver.observe(el));

    // 3. Premium hover tracking for cards on pointer devices
    const floatCards = document.querySelectorAll('.float-card');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const coarsePointer = window.matchMedia('(hover: none) and (pointer: coarse)').matches;

    const resetCardMotion = (card) => {
        card.style.setProperty('--pointer-x', '50%');
        card.style.setProperty('--pointer-y', '50%');
        card.style.setProperty('--card-rotate-x', '0deg');
        card.style.setProperty('--card-rotate-y', '0deg');
    };

    if (supportsHover && !prefersReducedMotion) {
        floatCards.forEach(card => {
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

            card.addEventListener('mouseenter', resetCardMotion.bind(null, card));
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
        });
    }

    // 4. Mobile touch stay-active for float-cards
    if (coarsePointer) {
        floatCards.forEach(card => {
            card.addEventListener('click', function() {
                floatCards.forEach(c => {
                    if (c !== this) c.classList.remove('is-active');
                });

                this.classList.toggle('is-active');
            });
        });
    }
});
