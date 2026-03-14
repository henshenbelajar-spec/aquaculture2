import './bootstrap';
import Lenis from '@studio-freight/lenis';

document.addEventListener("DOMContentLoaded", () => {
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

    // 3. Mobile touch stay-active for float-cards
    const floatCards = document.querySelectorAll('.float-card');
    floatCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove active from others
            floatCards.forEach(c => {
                if(c !== this) c.classList.remove('is-active');
            });
            // Toggle active on clicked card
            this.classList.toggle('is-active');
        });
    });
});
