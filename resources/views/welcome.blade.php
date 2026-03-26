<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" style="color-scheme: dark;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="AquaSmart Ã¢â‚¬â€ Next-gen precision aquaculture technology. Monitor water quality, oxygen, and temperature in real time.">
    <meta name="theme-color" content="#071121">
    <title>AquaSmart | Next-Gen Aquaculture Technology</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ===== BASE ===== */
        body {
            font-family: 'Outfit', sans-serif;
        }

        /* Skip to content (accessibility) */
        .skip-link {
            position: absolute;
            top: -100%;
            left: 1rem;
            background: #00F0FF;
            color: #071121;
            padding: 0.5rem 1rem;
            border-radius: 0 0 0.5rem 0.5rem;
            font-weight: 700;
            z-index: 9999;
            transition: top 0.2s ease;
            text-decoration: none;
        }

        .skip-link:focus {
            top: 0;
        }

        /* Focus ring for keyboard users */
        :focus-visible {
            outline: 2px solid #00F0FF;
            outline-offset: 3px;
            border-radius: 4px;
        }

        /* ===== GLOWS ===== */
        .glow-blob-1 {
            position: absolute;
            top: 10%;
            left: -10%;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(0, 240, 255, 0.15) 0%, transparent 60%);
            filter: blur(80px);
            z-index: -1;
            animation: float 8s infinite alternate ease-in-out;
        }

        .glow-blob-2 {
            position: absolute;
            bottom: 10%;
            right: -10%;
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, rgba(68, 162, 240, 0.1) 0%, transparent 60%);
            filter: blur(100px);
            z-index: -1;
            animation: float 10s infinite alternate-reverse ease-in-out;
        }

        /* ===== GLASS ===== */
        .glass-panel {
            background: var(--surface-glass);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--surface-border);
        }

        /* ===== GRID BACKGROUND ===== */
        .bg-grid {
            background-size: 40px 40px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
        }

        /* ===== BUBBLES ===== */
        @keyframes bubble-rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.6;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                transform: translateY(-100vh) scale(0.6);
                opacity: 0;
            }
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(178, 244, 255, 0.44), rgba(0, 135, 224, 0.16));
            border: 1px solid rgba(190, 246, 255, 0.32);
            box-shadow: 0 0 18px rgba(97, 222, 255, 0.12);
            animation: bubble-rise linear infinite;
            pointer-events: none;
        }

        /* ===== REDUCED MOTION ===== */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            .reveal-up {
                opacity: 1 !important;
                transform: none !important;
            }
        }

        /* ===== NAVBAR ACTIVE LINK ===== */
        .nav-link {
            position: relative;
            color: rgba(161, 161, 170, 1);
            transition: color 0.2s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 1px;
            background: #00F0FF;
            transform: scaleX(0);
            transition: transform 0.25s ease;
            transform-origin: left;
        }

        .nav-link:hover {
            color: #fff;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        /* ===== TOUCH ===== */
        button,
        a {
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
        }

    </style>
</head>

<body
    class="bg-[#071121] text-zinc-300 antialiased selection:bg-[#00F0FF] selection:text-[#071121] min-h-screen overflow-x-hidden">

    <!-- Skip to main content (a11y) -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Ambient Background Glows -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden z-[-1]">
        <div class="glow-blob-1"></div>
        <div class="glow-blob-2"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 glass-panel border-b border-white/5 py-4 backdrop-blur-xl"
        aria-label="Main navigation">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between">

            <!-- Logo (Left) -->
            <div class="flex-1">
                <a href="#" class="flex items-center gap-3 group" aria-label="AquaSmart home">
                    <div
                        class="w-9 h-9 rounded-lg bg-gradient-to-br from-[#00F0FF] to-[#154576] flex items-center justify-center shadow-[0_0_15px_rgba(0,240,255,0.3)] group-hover:shadow-[0_0_25px_rgba(0,240,255,0.5)] transition-shadow duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white"><span
                            class="text-[#00F0FF]">Aqua</span>Smart</span>
                </a>
            </div>

            <!-- Center nav links (Centered) -->
            <div class="hidden md:flex items-center gap-10 text-sm font-medium">
                <a href="#" class="nav-link">Home</a>
                <a href="#features" class="nav-link">System</a>
                <a href="#dashboard" class="nav-link">Dashboard</a>
                <a href="#facility" class="nav-link">Facilities</a>
            </div>

            <!-- CTA Buttons (Right) -->
            <div class="flex-1 flex items-center justify-end gap-3">
                <a href="#"
                    class="hidden md:inline-block px-5 py-2 text-sm font-semibold rounded-full border border-white/10 hover:border-[#00F0FF]/50 hover:bg-[#00F0FF]/10 transition-colors duration-200 text-white">Log
                    in</a>
                <a href="#"
                    class="hidden md:inline-flex px-5 py-2 text-sm font-bold rounded-full bg-white text-black hover:bg-zinc-200 hover:scale-[1.03] transition-transform duration-300 shadow-[0_0_20px_rgba(255,255,255,0.2)]">Get
                    Started</a>
                <!-- Hamburger (mobile only) -->
                <button id="nav-toggle"
                    class="md:hidden w-10 h-10 flex flex-col items-center justify-center gap-[5px] rounded-lg hover:bg-white/10 transition-colors duration-200"
                    aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
                    <span
                        class="nav-bar w-5 h-[2px] bg-white rounded-full transition-transform duration-300 origin-center"></span>
                    <span class="nav-bar w-5 h-[2px] bg-white rounded-full transition-opacity duration-300"></span>
                    <span
                        class="nav-bar w-5 h-[2px] bg-white rounded-full transition-transform duration-300 origin-center"></span>
                </button>
            </div>
        </div>

        <!-- Mobile dropdown Ã¢â‚¬â€ hidden by default via inline style; JS toggles display:block -->
        <div id="mobile-menu" style="display:none" class="border-t border-white/5" aria-hidden="true">
            <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col gap-1">
                <a href="#" class="nav-link block py-3 text-base border-b border-white/5"
                    onclick="aquaNavClose()">Home</a>
                <a href="#features" class="nav-link block py-3 text-base border-b border-white/5"
                    onclick="aquaNavClose()">System</a>
                <a href="#dashboard" class="nav-link block py-3 text-base border-b border-white/5"
                    onclick="aquaNavClose()">Dashboard</a>
                <a href="#facility" class="nav-link block py-3 text-base border-b border-white/5"
                    onclick="aquaNavClose()">Facilities</a>
                <div class="flex gap-3 pt-4 mt-1">
                    <a href="#"
                        class="flex-1 text-center py-2.5 text-sm font-semibold rounded-full border border-white/10 hover:bg-[#00F0FF]/10 hover:border-[#00F0FF]/50 transition-colors duration-200 text-white">Log
                        in</a>
                    <a href="#"
                        class="flex-1 text-center py-2.5 text-sm font-bold rounded-full bg-white text-black hover:bg-zinc-200 transition-colors duration-200">Get
                        Started</a>
                </div>
            </div>
        </div>
    </nav>

    <style>
        /* Hamburger animation: keyed off aria-expanded attribute Ã¢â‚¬â€ no JS class needed */
        #nav-toggle[aria-expanded="true"] .nav-bar:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        #nav-toggle[aria-expanded="true"] .nav-bar:nth-child(2) {
            opacity: 0;
        }

        #nav-toggle[aria-expanded="true"] .nav-bar:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }
    </style>
    <script>
        function aquaNavClose() {
            document.getElementById('mobile-menu').style.display = 'none';
            document.getElementById('mobile-menu').setAttribute('aria-hidden', 'true');
            document.getElementById('nav-toggle').setAttribute('aria-expanded', 'false');
        }
        document.getElementById('nav-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            var nowOpen = (menu.style.display === 'none' || menu.style.display === '');
            menu.style.display = nowOpen ? 'block' : 'none';
            menu.setAttribute('aria-hidden', String(!nowOpen));
            this.setAttribute('aria-expanded', String(nowOpen));
        });
        /* Auto-close if user rotates/resizes to tablet+ */
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) aquaNavClose();
        });
    </script>

    <!-- ===== MAIN CONTENT ===== -->
    <main id="main-content">

        <!-- Hero Section -->
        <section class="hero-scene relative w-full overflow-hidden flex flex-col items-center min-h-[90vh] lg:min-h-screen">

            <!-- Grid Background (hero only) - fades out at 65% height -->
            <div class="hero-grid-layer absolute inset-0 bg-grid pointer-events-none z-0"
                style="mask-image: linear-gradient(to bottom, transparent 0%, black 5%, black 65%, transparent 100%);
                    -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 5%, black 65%, transparent 100%);
                    opacity: 0.5;">
            </div>

            <!-- Global glow behind heading (Pai Joki style) -->
            <div class="hero-aura absolute top-[35%] left-1/2 w-[700px] h-[400px] pointer-events-none z-0"
                style="background: radial-gradient(ellipse at center, rgba(0,100,240,0.40) 0%, rgba(0,240,255,0.15) 40%, transparent 70%); filter: blur(60px);">
            </div>

            <!-- Floating Bubbles -->
            <div class="hero-bubbles absolute inset-0 overflow-hidden pointer-events-none z-0" id="bubbles-container">
                <div class="bubble"
                    style="width:12px;height:12px;left:10%;bottom:-50px;animation-duration:9s;animation-delay:0s;">
                </div>
                <div class="bubble"
                    style="width:8px;height:8px;left:22%;bottom:-50px;animation-duration:12s;animation-delay:2s;"></div>
                <div class="bubble"
                    style="width:18px;height:18px;left:35%;bottom:-50px;animation-duration:10s;animation-delay:1s;">
                </div>
                <div class="bubble"
                    style="width:6px;height:6px;left:48%;bottom:-50px;animation-duration:14s;animation-delay:4s;">
                </div>
                <div class="bubble"
                    style="width:14px;height:14px;left:60%;bottom:-50px;animation-duration:11s;animation-delay:0.5s;">
                </div>
                <div class="bubble"
                    style="width:10px;height:10px;left:72%;bottom:-50px;animation-duration:8s;animation-delay:3s;">
                </div>
                <div class="bubble"
                    style="width:20px;height:20px;left:82%;bottom:-50px;animation-duration:13s;animation-delay:1.5s;">
                </div>
                <div class="bubble"
                    style="width:7px;height:7px;left:90%;bottom:-50px;animation-duration:10s;animation-delay:5s;">
                </div>
                <div class="bubble"
                    style="width:16px;height:16px;left:5%;bottom:-50px;animation-duration:15s;animation-delay:2.5s;">
                </div>
                <div class="bubble"
                    style="width:9px;height:9px;left:55%;bottom:-50px;animation-duration:9s;animation-delay:6s;"></div>
            </div>

            <div
                class="relative w-full max-w-7xl mx-auto px-6 md:px-12 pt-32 pb-20 md:pt-44 md:pb-28 lg:pt-52 lg:pb-36 flex flex-col lg:flex-row items-center justify-between gap-16 z-10">

                <!-- Left text Ã¢â‚¬â€ centered on mobile, left-aligned on desktop -->
                <div
                    class="flex-1 w-full flex flex-col items-center lg:items-start text-center lg:text-left reveal-up">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border border-white/10 text-xs font-semibold text-white mb-8 uppercase tracking-wider backdrop-blur-md">
                        <span class="w-2 h-2 rounded-full bg-[#00F0FF] animate-pulse"></span>
                        Next-Gen Aquaculture Technology
                    </div>

                    <h1
                        class="hero-title font-bold text-white tracking-tight leading-[1.05] mb-6 w-full">
                        Precision <br class="hidden lg:block" />
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#00F0FF] via-[#44AAFF] to-[#44A2F0]"
                            style="filter: drop-shadow(0 0 35px rgba(0,200,255,0.7)) drop-shadow(0 0 70px rgba(0,120,255,0.4));">Farming
                            Data.</span>
                    </h1>

                    <p class="hero-subtitle mb-10 max-w-xl font-light leading-relaxed">
                        Elevate your fish farming with cutting-edge smart sensors and real-time dashboard analytics.
                        Monitor water quality, oxygen levels, and temperature effortlessly.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="#features"
                            class="btn-primary w-full sm:w-auto px-8 py-4 rounded-full text-[#071121] font-bold text-base text-center">
                            Explore Ecosystem
                        </a>
                        <a href="{{ route('demo') }}"
                            class="btn-ghost w-full sm:w-auto px-8 py-4 rounded-full text-white font-medium text-base flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Watch Demo
                        </a>
                    </div>
                </div>

                <!-- Right visual -->
                <div
                    class="flex-1 relative w-full reveal-up reveal-delay-200 flex justify-center lg:justify-end mt-10 lg:mt-0">
                    <div
                        class="hero-visual-shell relative w-full max-w-[480px] aspect-square flex items-center justify-center tilt-image-container">
                        <!-- Decorative rings -->
                        <div
                            class="hero-orbit hero-orbit--outer absolute inset-0">
                        </div>
                        <div
                            class="hero-orbit hero-orbit--inner absolute inset-8">
                        </div>
                        <div class="hero-visual-frame w-full h-full p-0 relative z-10 tilt-image">
                            <img src="{{ asset('images/aqua_sensor.png') }}"
                                alt="AquaSmart underwater IoT sensor buoy" width="480" height="480"
                                fetchpriority="high"
                                class="hero-visual-image w-full h-full object-cover drop-shadow-[0_20px_50px_rgba(0,240,255,0.3)]" />
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Key Features Section -->
        <section id="features" class="w-full py-24 z-10">
            <div class="max-w-7xl mx-auto px-6 md:px-12">
                <div class="text-center mb-16 reveal-up">
                    <h2 class="section-title font-bold text-white mb-4">Master Your <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#00F0FF] to-[#44A2F0]">Ecosystem</span>
                    </h2>
                    <p class="section-subtitle max-w-2xl mx-auto text-pretty">Advanced telemetry meets intuitive design.
                        Our smart tools empower you with actionable insights right at your fingertips.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <!-- Feature Card 1 -->
                    <div
                        class="feature-card feature-card--sensor float-card glass-panel rounded-[2rem] p-8 flex flex-col justify-start relative overflow-hidden group reveal-up reveal-delay-100 glow-border">
                        <div class="feature-card__mesh" aria-hidden="true"></div>
                        <div class="feature-card__wing" aria-hidden="true"></div>
                        <div class="feature-card__pulse" aria-hidden="true"></div>
                        <div class="feature-card__ghost" aria-hidden="true">
                            <svg class="w-24 h-24 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <div class="feature-card__header">
                            <div class="feature-card__icon-shell" aria-hidden="true">
                                <svg class="w-7 h-7 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                    </path>
                                </svg>
                            </div>
                            <div class="feature-card__badge">Realtime</div>
                        </div>
                        <div class="feature-card__eyebrow">
                            <span class="feature-card__eyebrow-dot" aria-hidden="true"></span>
                            Sensor Mesh
                        </div>
                        <h3 class="feature-card__title text-xl font-bold text-white mb-3">Live Water Quality</h3>
                        <p class="feature-card__desc text-sm leading-relaxed mb-6 flex-1">
                            Continuously monitor pH, Dissolved Oxygen (DO), salinity, and turbidity with our
                            military-grade submersive sensors.
                        </p>
                        <div class="feature-card__footer">
                            <div class="feature-card__tags">
                                <div
                                    class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#00F0FF]" aria-hidden="true"></span>
                                    Sensor 1
                                </div>
                                <div class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2"
                                    style="transition-delay: 50ms;">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#6EE7B7]" aria-hidden="true"></span>
                                    Node Basic
                                </div>
                            </div>
                            <div class="feature-card__meta">
                                <span class="feature-card__meta-label">Uptime</span>
                                <span class="feature-card__meta-value">99.8%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2 -->
                    <div
                        class="feature-card feature-card--automation float-card glass-panel rounded-[2rem] p-8 flex flex-col justify-start relative overflow-hidden group reveal-up reveal-delay-200">
                        <div class="feature-card__mesh" aria-hidden="true"></div>
                        <div class="feature-card__wing" aria-hidden="true"></div>
                        <div class="feature-card__pulse" aria-hidden="true"></div>
                        <div class="feature-card__ghost" aria-hidden="true">
                            <svg class="w-24 h-24 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                </path>
                            </svg>
                        </div>
                        <div class="feature-card__header">
                            <div class="feature-card__icon-shell" aria-hidden="true">
                                <svg class="w-7 h-7 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                    </path>
                                </svg>
                            </div>
                            <div class="feature-card__badge">Closed Loop</div>
                        </div>
                        <div class="feature-card__eyebrow">
                            <span class="feature-card__eyebrow-dot" aria-hidden="true"></span>
                            Control Layer
                        </div>
                        <h3 class="feature-card__title text-xl font-bold text-white mb-3">Smart Automation</h3>
                        <p class="feature-card__desc text-sm leading-relaxed mb-6 flex-1">
                            Connect IoT aerators and automated feeders. Trigger actions based on real-time environmental
                            data parameters.
                        </p>
                        <div class="feature-card__footer">
                            <div class="feature-card__tags">
                                <div
                                    class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#7DD3FC]" aria-hidden="true"></span>
                                    Node Guest
                                </div>
                                <div class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2"
                                    style="transition-delay: 50ms;">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#93C5FD]" aria-hidden="true"></span>
                                    Switch
                                </div>
                            </div>
                            <div class="feature-card__meta">
                                <span class="feature-card__meta-label">Response</span>
                                <span class="feature-card__meta-value">0.8s</span>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3 -->
                    <div
                        class="feature-card feature-card--analytics float-card glass-panel rounded-[2rem] p-8 flex flex-col justify-start relative overflow-hidden group reveal-up reveal-delay-300 glow-border">
                        <div class="feature-card__mesh" aria-hidden="true"></div>
                        <div class="feature-card__wing" aria-hidden="true"></div>
                        <div class="feature-card__pulse" aria-hidden="true"></div>
                        <div class="feature-card__ghost" aria-hidden="true">
                            <svg class="w-24 h-24 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                        <div class="feature-card__header">
                            <div class="feature-card__icon-shell" aria-hidden="true">
                                <svg class="w-7 h-7 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                            </div>
                            <div class="feature-card__badge">Trend Model</div>
                        </div>
                        <div class="feature-card__eyebrow">
                            <span class="feature-card__eyebrow-dot" aria-hidden="true"></span>
                            Forecast Engine
                        </div>
                        <h3 class="feature-card__title text-xl font-bold text-white mb-3">Predictive Analytics</h3>
                        <p class="feature-card__desc text-sm leading-relaxed mb-6 flex-1">
                            Leverage AI models to forecast biomass growth, disease risk, and energy consumption across
                            your farming modules.
                        </p>
                        <div class="feature-card__footer">
                            <div class="feature-card__tags">
                                <div
                                    class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#FFB36B]" aria-hidden="true"></span>
                                    Node Pro
                                </div>
                                <div class="feature-card__tag inner-block px-3 py-1.5 rounded-lg border text-xs font-semibold flex items-center gap-2"
                                    style="transition-delay: 50ms;">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#FFD39A]" aria-hidden="true"></span>
                                    Sync DB
                                </div>
                            </div>
                            <div class="feature-card__meta">
                                <span class="feature-card__meta-label">Model Cert.</span>
                                <span class="feature-card__meta-value">A97</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- UI/Dashboard Presentation -->
        <section id="dashboard" class="w-full py-24 z-10">
            <div class="max-w-7xl mx-auto px-6 md:px-12 flex flex-col lg:flex-row items-center gap-16">
                <div class="flex-1 w-full order-2 lg:order-1 relative reveal-left">
                    <div
                        class="w-full aspect-[4/3] rounded-3xl overflow-hidden glass-panel border border-white/10 shadow-[0_20px_50px_-20px_rgba(0,240,255,0.4)] relative group cursor-pointer group float-card tilt-image-container">
                        <img src="{{ asset('images/aqua_dashboard.png') }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 tilt-image"
                            alt="AquaSmart real-time aquaculture dashboard interface" width="800" height="600"
                            loading="lazy" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#071121] via-transparent to-transparent opacity-80">
                        </div>
                        <!-- Mock Overlay Elements -->
                        <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">
                            <div class="glass-panel px-4 py-2 rounded-xl border border-white/20 backdrop-blur-md">
                                <div class="text-xs text-[#00F0FF] uppercase tracking-wider mb-1">Water Temp</div>
                                <div class="text-2xl font-bold text-white tracking-tight">24.5<span
                                        class="text-sm font-normal text-zinc-400">Ã‚Â°C</span></div>
                            </div>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:scale-110 transition-transform shadow-[0_0_15px_rgba(255,255,255,0.5)]">
                                <svg class="w-5 h-5 text-black transform -rotate-45" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex-1 order-1 lg:order-2 reveal-right">
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Deep Context. <br /> <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#00F0FF] to-[#44A2F0]">Clear
                            Visibility.</span></h2>
                    <p class="text-zinc-400 text-lg mb-8 leading-relaxed font-light">
                        Our intuitive dashboard aggregates thousands of data points into a singular clean interface.
                        Monitor entire fleets of aquatic tanks or open-water pens simultaneously on any device.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Customizable alert thresholds</span>
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Historical data exporting (CSV, PDF)</span>
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-[#00F0FF]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Multi-tiered user access control</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Facility / Scale Section -->
        <section id="facility" class="w-full py-24 z-10 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#154576]/10 to-transparent"
                aria-hidden="true"></div>
            <div class="max-w-7xl mx-auto px-6 md:px-12 relative flex flex-col lg:flex-row items-center gap-16">
                <div class="flex-1 reveal-left">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border border-[#44A2F0]/30 text-xs font-semibold text-[#44A2F0] mb-6 uppercase tracking-wider">
                        Infrastructure
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Designed for <br /> <span
                            class="text-white">Massive Scale</span></h2>
                    <p class="text-zinc-400 text-lg mb-8 leading-relaxed font-light">
                        Whether you are managing a boutique indoor RAS (Recirculating Aquaculture System) or an
                        industrial scale offshore farm, AquaSmart seamlessly integrates with your existing
                        infrastructure.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-4xl font-bold text-white tracking-tight mb-1">99.9<span
                                    class="text-[#00F0FF]">%</span></div>
                            <div class="text-sm text-zinc-500">Uptime Reliability</div>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-white tracking-tight mb-1"><span
                                    class="text-[#00F0FF]">+</span>40<span class="text-[#00F0FF]">%</span></div>
                            <div class="text-sm text-zinc-500">Harvest Yields</div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full reveal-right">
                    <div
                        class="aspect-square md:aspect-[4/3] w-full rounded-full lg:rounded-[3rem] overflow-hidden border-4 border-white/5 relative float-card">
                        <img src="{{ asset('images/aqua_facility.png') }}" class="w-full h-full object-cover"
                            alt="Modern Recirculating Aquaculture System facility" width="600" height="600"
                            loading="lazy" />
                        <!-- Vignette -->
                        <div class="absolute inset-0 shadow-[inset_0_0_100px_rgba(7,17,33,0.8)] pointer-events-none">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Monitoring Dashboard Showcase -->
        <section id="biometrics" class="w-full py-24 z-10 relative overflow-hidden">
            <div class="absolute inset-x-0 top-24 h-[420px] bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.08),transparent_62%)] pointer-events-none"
                aria-hidden="true"></div>
            <div class="dashboard-showcase reveal-up">
                <div class="dashboard-showcase-inner max-w-7xl mx-auto px-6 md:px-12 relative">
                    <div class="dashboard-showcase-grid grid grid-cols-1 lg:grid-cols-2 gap-10 xl:gap-14 items-center p-6 md:p-8 xl:p-10">
                        <div class="dashboard-board p-6 md:p-7 reveal-left">
                            <div class="dashboard-metric-glow" aria-hidden="true"></div>
                            <div class="dashboard-water-rings" aria-hidden="true">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="relative z-10 flex items-center justify-between gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_18px_rgba(74,222,128,0.55)]"></span>
                                    <span class="text-sm md:text-base font-semibold text-[#17324D]">Pond A1 - Real-time</span>
                                </div>
                                <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.18em] text-emerald-600">Normal</span>
                            </div>

                            <div class="relative z-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="dashboard-mini-card p-5">
                                    <div class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#6C87A1] mb-3">Temperature</div>
                                    <div class="text-4xl font-bold text-[#122844] tracking-tight">28.5<span class="text-xl text-[#5F7A95] ml-1">&deg;C</span></div>
                                    <div class="inline-flex mt-4 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-600">+0.2&deg;C vs yesterday</div>
                                </div>

                                <div class="dashboard-mini-card p-5">
                                    <div class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#6C87A1] mb-3">pH Level</div>
                                    <div class="text-4xl font-bold text-[#122844] tracking-tight">7.2<span class="text-xl text-[#5F7A95] ml-1">pH</span></div>
                                    <div class="inline-flex mt-4 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">Stable</div>
                                </div>

                                <div class="dashboard-mini-card p-5">
                                    <div class="flex items-start justify-between gap-3 mb-3">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#6C87A1]">Dissolved Oxygen</div>
                                        <span class="text-[#F04444]">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="text-4xl font-bold text-[#FF2B39] tracking-tight">4.2<span class="text-xl text-[#5F7A95] ml-1">mg/L</span></div>
                                    <div class="mt-4 h-2 rounded-full bg-[#E8EDF3] overflow-hidden">
                                        <div class="h-full w-[42%] rounded-full bg-[#FF2B39]"></div>
                                    </div>
                                </div>

                                <div class="dashboard-mini-card p-5">
                                    <div class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#6C87A1] mb-3">Water Level</div>
                                    <div class="text-4xl font-bold text-[#122844] tracking-tight">1.2<span class="text-xl text-[#5F7A95] ml-1">m</span></div>
                                    <div class="inline-flex mt-4 rounded-full bg-rose-100 px-3 py-1 text-xs font-semibold text-rose-500">-0.1m drops</div>
                                </div>
                            </div>

                            <div class="dashboard-status-card relative z-10 mt-4 p-5">
                                <div class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#6C87A1] mb-5">Aerator Status</div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <div class="flex items-center gap-4">
                                        <div class="dashboard-wave-chip w-14 h-14 rounded-2xl flex items-center justify-center">
                                            <svg class="dashboard-wave-icon" fill="none" viewBox="0 0 32 32" aria-hidden="true">
                                                <path d="M5 10C8 7 12 7 15 10C18 13 22 13 27 10" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                                <path d="M5 16C8 13 12 13 15 16C18 19 22 19 27 16" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                                <path d="M5 22C8 19 12 19 15 22C18 25 22 25 27 22" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-3xl font-bold text-[#142743] tracking-tight">Paddle Wheel A</div>
                                            <div class="text-sm font-semibold uppercase tracking-wide text-emerald-600">Running (Auto Mode)</div>
                                        </div>
                                    </div>
                                    <div class="inline-flex items-center justify-center rounded-2xl border border-rose-200 bg-white px-4 py-3 text-base font-semibold text-rose-500 shadow-[0_18px_30px_-24px_rgba(244,63,94,0.45)]">Overload Stop</div>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 reveal-up reveal-delay-200">
                            <div class="dashboard-copy-badge inline-flex items-center gap-3 rounded-full px-4 py-2 text-[11px] font-bold uppercase tracking-[0.22em] text-[#0A96C9]">
                                <svg class="dashboard-wave-icon" fill="none" viewBox="0 0 32 32" aria-hidden="true">
                                    <path d="M5 10C8 7 12 7 15 10C18 13 22 13 27 10" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                    <path d="M5 16C8 13 12 13 15 16C18 19 22 19 27 16" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                    <path d="M5 22C8 19 12 19 15 22C18 25 22 25 27 22" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                </svg>
                                Real-time Data
                            </div>

                            <h2 class="dashboard-copy-title mt-6 text-4xl md:text-6xl font-bold tracking-tight text-[#103455] text-balance">Monitoring Dashboard</h2>
                            <div class="dashboard-copy-wave" aria-hidden="true">
                                <div class="dashboard-copy-wave-burst">
                                    <svg class="dashboard-wave-icon" fill="none" viewBox="0 0 32 32">
                                        <path d="M5 10C8 7 12 7 15 10C18 13 22 13 27 10" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                        <path d="M5 16C8 13 12 13 15 16C18 19 22 19 27 16" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                        <path d="M5 22C8 19 12 19 15 22C18 25 22 25 27 22" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div class="dashboard-copy-wave-line"></div>
                            </div>
                            <p class="dashboard-copy-text mt-6 text-lg md:text-xl leading-relaxed text-[#4C6E8A]">
                                Access detailed pond intelligence from anywhere. AquaSmart visualizes live telemetry,
                                historical movement, and automated response logic in one interface that still feels calm,
                                clear, and premium.
                            </p>

                            <div class="mt-10 space-y-6">
                                <div class="dashboard-info-item pt-6 flex items-start gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-white/70 border border-[#CFE9F4] flex items-center justify-center shadow-[0_18px_34px_-28px_rgba(25,118,168,0.35)]">
                                        <svg class="w-7 h-7 text-[#0A96C9]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 2 2 5-5M5 5v14h14" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="dashboard-info-title text-2xl font-bold text-[#142743]">Historical Trend Analytics</h3>
                                        <p class="dashboard-info-text mt-2 text-base leading-relaxed text-[#5A728A]">Export capability and high-detail visual graphs storing up to one year of parameter history per pond.</p>
                                    </div>
                                </div>

                                <div class="dashboard-info-item pt-6 flex items-start gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-white/70 border border-[#CFE9F4] flex items-center justify-center shadow-[0_18px_34px_-28px_rgba(25,118,168,0.35)]">
                                        <svg class="w-7 h-7 text-[#0A96C9]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="dashboard-info-title text-2xl font-bold text-[#142743]">Custom Alert Thresholds</h3>
                                        <p class="dashboard-info-text mt-2 text-base leading-relaxed text-[#5A728A]">Get lightning-fast notifications via SMS, Email, or WhatsApp when critical metrics drop below safe levels.</p>
                                    </div>
                                </div>

                                <div class="dashboard-info-item pt-6 flex items-start gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-white/70 border border-[#CFE9F4] flex items-center justify-center shadow-[0_18px_34px_-28px_rgba(25,118,168,0.35)]">
                                        <svg class="w-7 h-7 text-[#0A96C9]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="dashboard-info-title text-2xl font-bold text-[#142743]">Mobile PWA Ready</h3>
                                        <p class="dashboard-info-text mt-2 text-base leading-relaxed text-[#5A728A]">Install the dashboard directly on your phone's home screen and respond to conditions while walking the farm.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class="max-w-5xl mx-auto px-6 py-24 z-10 w-full reveal-up">
            <div
                class="relative w-full rounded-[2rem] overflow-hidden glass-panel p-10 md:p-16 text-center border border-[#00F0FF]/20 shadow-[0_0_50px_-10px_rgba(0,240,255,0.15)] flex flex-col items-center">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-gradient-to-b from-[#00F0FF]/20 to-transparent blur-3xl rounded-[100%] z-[-1] pointer-events-none"
                    aria-hidden="true"></div>

                <div class="cta-kicker">Farm-ready platform</div>
                <h2 class="section-title md:text-6xl font-bold text-white mb-6 tracking-tight drop-shadow-md text-balance">
                    Ready to dive in?</h2>
                <p class="text-lg text-zinc-300 mb-10 max-w-xl font-light text-pretty">Join the top aquaculture sites
                    worldwide who use AquaSmart to secure their yields and monitor their environment.</p>

                <a href="#"
                    class="px-10 py-5 rounded-full bg-white text-black font-bold text-lg hover:scale-105 transition-transform duration-300 shadow-[0_0_30px_rgba(255,255,255,0.3)]">
                    Start Your Trial
                </a>
                <div class="cta-trust-strip">
                    <div class="cta-trust-item">
                        <div class="cta-trust-label">Deployment</div>
                        <div class="cta-trust-value">Fast onboarding</div>
                    </div>
                    <div class="cta-trust-item">
                        <div class="cta-trust-label">Monitoring</div>
                        <div class="cta-trust-value">24/7 live telemetry</div>
                    </div>
                    <div class="cta-trust-item">
                        <div class="cta-trust-label">Access</div>
                        <div class="cta-trust-value">Mobile and desktop</div>
                    </div>
                </div>
                <p class="mt-6 text-sm text-zinc-500">No credit card required &bull; Free 14-day evaluation</p>
            </div>
        </section>

    </main><!-- /main-content -->

    <!-- Footer -->
    <footer class="w-full border-t border-white/10 mt-12 bg-[#071121]/80 backdrop-blur-lg pt-16 pb-8 z-10"
        aria-label="Site footer">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-6 h-6 rounded bg-gradient-to-br from-[#00F0FF] to-[#154576] flex items-center justify-center"
                            aria-hidden="true">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-white tracking-wide">AquaSmart</span>
                    </div>
                    <p class="text-sm text-zinc-500 leading-relaxed font-light">Building intelligent tools for modern
                        aquatic farms. Precision data, simplified.</p>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4 tracking-wide">Products</h4>
                    <ul class="space-y-3 text-sm text-zinc-500">
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Sensor
                                Network</a></li>
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Analytics
                                Dashboard</a></li>
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Automated
                                Feeder API</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4 tracking-wide">Resources</h4>
                    <ul class="space-y-3 text-sm text-zinc-500">
                        <li><a href="#"
                                class="hover:text-[#00F0FF] transition-colors duration-200">Documentation</a></li>
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Case
                                Studies</a></li>
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Help
                                Center</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4 tracking-wide">Legal</h4>
                    <ul class="space-y-3 text-sm text-zinc-500">
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Privacy
                                Policy</a></li>
                        <li><a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">Terms of
                                Service</a></li>
                    </ul>
                </div>
            </div>

            <div
                class="pt-8 border-t border-white/5 flex flex-col md:flex-row items-center md:items-end justify-between gap-4 text-xs text-zinc-600">
                <div class="text-center md:text-left">
                    <p>&copy; 2026 AquaSmart Technologies. All rights reserved.</p>
                    <p class="mt-2 text-[11px] text-zinc-500">
                        Produced by <span class="text-zinc-300">Virgiawan Habibie</span> and
                        <span class="text-zinc-300">Juan David Tanesa</span>
                    </p>
                </div>
                <nav aria-label="Social links" class="flex gap-4 mt-2 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors duration-200">Twitter</a>
                    <a href="#" class="hover:text-white transition-colors duration-200">LinkedIn</a>
                    <a href="#" class="hover:text-[#00F0FF] transition-colors duration-200">GitHub Repo</a>
                </nav>
            </div>
        </div>
    </footer>

</body>

</html>

