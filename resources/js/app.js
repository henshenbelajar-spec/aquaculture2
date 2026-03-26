import './bootstrap';
import Lenis from '@studio-freight/lenis';

document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const coarsePointer = window.matchMedia('(hover: none) and (pointer: coarse)').matches;
    const hardwareConcurrency = navigator.hardwareConcurrency ?? 8;
    const deviceMemory = navigator.deviceMemory ?? 8;
    const lowPowerDevice = hardwareConcurrency <= 4 || deviceMemory <= 4;

    root.classList.toggle('is-low-motion', prefersReducedMotion || lowPowerDevice);

    let lenis = null;

    if (!prefersReducedMotion) {
        lenis = new Lenis({
            lerp: lowPowerDevice ? 0.14 : 0.1,
            duration: lowPowerDevice ? undefined : 1.05,
            smoothWheel: true,
            syncTouch: false,
            touchMultiplier: 1,
            wheelMultiplier: lowPowerDevice ? 0.9 : 0.95,
            infinite: false,
            autoResize: true,
        });

        const raf = (time) => {
            lenis.raf(time);
            requestAnimationFrame(raf);
        };

        requestAnimationFrame(raf);

        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', (event) => {
                const href = anchor.getAttribute('href');

                if (!href || href === '#') {
                    return;
                }

                const target = document.querySelector(href);

                if (!target) {
                    return;
                }

                event.preventDefault();
                lenis.scrollTo(target, {
                    offset: -88,
                    duration: lowPowerDevice ? 0.85 : 1.05,
                });
            });
        });
    }

    const revealElements = document.querySelectorAll(
        '.reveal-up, .reveal-left, .reveal-right, .reveal-scale, [data-reveal]'
    );

    const revealElement = (element) => {
        requestAnimationFrame(() => {
            element.classList.add('is-visible');
        });
    };

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealElements.forEach(revealElement);
    } else {
        const revealObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    revealElement(entry.target);
                    observer.unobserve(entry.target);
                });
            },
            {
                root: null,
                rootMargin: '0px 0px -12% 0px',
                threshold: 0.14,
            }
        );

        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });
    }

    const floatCards = document.querySelectorAll('.float-card');
    const featureCards = document.querySelectorAll('.feature-card');

    const triggerFeatureGlow = (card) => {
        card.classList.remove('flash-glow');
        void card.offsetWidth;
        card.classList.add('flash-glow');

        clearTimeout(card._featureGlowTimeout);
        card._featureGlowTimeout = window.setTimeout(() => {
            card.classList.remove('flash-glow');
        }, 760);
    };

    featureCards.forEach((card) => {
        if (supportsHover && !prefersReducedMotion) {
            card.addEventListener('mouseenter', () => {
                triggerFeatureGlow(card);
            });
        }

        card.addEventListener('focusin', () => {
            card.classList.add('is-active');
            triggerFeatureGlow(card);
        });

        card.addEventListener('focusout', () => {
            card.classList.remove('is-active');
        });
    });

    if (coarsePointer) {
        floatCards.forEach((card) => {
            card.addEventListener('click', () => {
                if (!card.classList.contains('feature-card')) {
                    floatCards.forEach((otherCard) => {
                        if (otherCard !== card) {
                            otherCard.classList.remove('is-active');
                        }
                    });
                }

                card.classList.add('is-active');

                if (card.classList.contains('feature-card')) {
                    triggerFeatureGlow(card);
                }

                clearTimeout(card._mobileActiveTimeout);
                card._mobileActiveTimeout = window.setTimeout(() => {
                    card.classList.remove('is-active');
                }, 620);
            });
        });
    }
});
