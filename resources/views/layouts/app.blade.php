<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'JUDE'))</title>

    <!-- Fonts - Anton for Headers, Inter for Body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* =============================================
           JUDE Portfolio - Warm Beige & Navy Design System
           Professional, Creative, Calm Aesthetic
           WCAG Accessible Contrast Ratios
           ============================================= */
        
        :root {
            /* Core Colors */
            --color-beige: #F5F0E8;
            --color-beige-dark: #EBE4D8;
            --color-beige-light: #FAF8F4;
            --color-navy: #1B365D;
            --color-navy-light: #2A4A7A;
            --color-navy-dark: #0F2340;
            --color-black: #1A1A1A;
            --color-black-soft: #2D2D2D;
            --color-white: #FFFFFF;
            
            /* Semantic Colors */
            --page-bg: var(--color-beige);
            --page-bg-secondary: var(--color-beige-dark);
            --page-bg-card: var(--color-white);
            --heading-color: var(--color-navy);
            --body-color: var(--color-black);
            --body-color-muted: #4A4A4A;
            --body-color-light: #6B6B6B;
            
            /* Accent & Interactive */
            --accent-primary: var(--color-navy);
            --accent-hover: var(--color-navy-light);
            --border-color: rgba(27, 54, 93, 0.12);
            --border-hover: rgba(27, 54, 93, 0.25);
            
            /* Buttons */
            --button-bg: var(--color-navy);
            --button-bg-hover: var(--color-navy-light);
            --button-text: var(--color-white);
            
            /* Spacing Scale */
            --space-xs: 0.5rem;
            --space-sm: 1rem;
            --space-md: 1.5rem;
            --space-lg: 2rem;
            --space-xl: 3rem;
            --space-2xl: 4rem;
            --space-3xl: 6rem;
            --space-4xl: 8rem;
        }

        * {
            scroll-behavior: smooth;
        }

        /* Base Typography */
        body {
            background-color: var(--page-bg);
            color: var(--body-color);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 16px;
            line-height: 1.7;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Typography Classes */
        .font-heading {
            font-family: 'Anton', sans-serif;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 0.02em;
            color: var(--heading-color);
        }
        
        .font-body {
            font-family: 'Inter', sans-serif;
            color: var(--body-color);
        }

        /* Heading Hierarchy */
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Anton', sans-serif;
            text-transform: uppercase;
            font-weight: 400;
            color: var(--heading-color);
            letter-spacing: 0.02em;
            line-height: 1.1;
        }

        h1, .h1 { font-size: clamp(2.5rem, 8vw, 5rem); }
        h2, .h2 { font-size: clamp(2rem, 6vw, 3.5rem); }
        h3, .h3 { font-size: clamp(1.5rem, 4vw, 2rem); }
        h4, .h4 { font-size: clamp(1.25rem, 3vw, 1.5rem); }
        h5, .h5 { font-size: 1.125rem; }
        h6, .h6 { font-size: 1rem; }

        /* Body Text */
        p, .body-text {
            font-family: 'Inter', sans-serif;
            color: var(--body-color);
            font-weight: 400;
            line-height: 1.7;
        }

        .text-muted {
            color: var(--body-color-muted);
        }

        .text-light {
            color: var(--body-color-light);
        }

        /* Page Background */
        .page-gradient {
            background: linear-gradient(180deg, 
                var(--color-beige-light) 0%, 
                var(--color-beige) 30%,
                var(--color-beige-dark) 70%,
                var(--color-beige) 100%
            );
            min-height: 100vh;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--color-beige-dark);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--color-navy);
            border-radius: 5px;
            border: 2px solid var(--color-beige-dark);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-navy-light);
        }
        
        /* Selection */
        ::selection {
            background: var(--color-navy);
            color: var(--color-white);
        }

        /* =============================================
           BUTTONS
           ============================================= */
        
        .btn-primary {
            background-color: var(--button-bg);
            color: var(--button-text);
            border: 2px solid var(--button-bg);
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }
        
        .btn-primary:hover {
            background-color: var(--button-bg-hover);
            border-color: var(--button-bg-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(27, 54, 93, 0.25);
        }

        .btn-primary:focus {
            outline: 3px solid var(--color-navy-light);
            outline-offset: 2px;
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--color-navy);
            border: 2px solid var(--color-navy);
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }
        
        .btn-secondary:hover {
            background-color: var(--color-navy);
            color: var(--color-white);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(27, 54, 93, 0.2);
        }

        .btn-secondary:focus {
            outline: 3px solid var(--color-navy-light);
            outline-offset: 2px;
        }

        /* =============================================
           CARDS
           ============================================= */

        .card-modern {
            background: var(--page-bg-card);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .card-modern:hover {
            border-color: var(--border-hover);
            transform: translateY(-6px);
            box-shadow: 0 25px 50px rgba(27, 54, 93, 0.12);
        }

        /* =============================================
           LINKS
           ============================================= */

        a {
            color: var(--color-navy);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--color-navy-light);
        }

        .link-underline {
            position: relative;
        }
        
        .link-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: var(--color-navy);
            transition: width 0.3s ease;
        }
        
        .link-underline:hover::after {
            width: 100%;
        }

        /* =============================================
           SECTION STYLING
           ============================================= */

        .section-divider {
            width: 80px;
            height: 3px;
            background: var(--color-navy);
        }

        .section-label {
            font-family: 'Inter', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--body-color-muted);
        }

        /* =============================================
           ANIMATIONS
           ============================================= */

        /* Typing cursor */
        .typing-cursor {
            display: inline-block;
            width: 3px;
            height: 1em;
            background-color: var(--color-navy);
            margin-left: 4px;
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Reveal animations */
        .reveal-text {
            opacity: 0;
            transform: translateY(30px);
            animation: revealText 0.8s ease forwards;
        }

        @keyframes revealText {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reveal-1 { animation-delay: 0.1s; }
        .reveal-2 { animation-delay: 0.2s; }
        .reveal-3 { animation-delay: 0.3s; }
        .reveal-4 { animation-delay: 0.4s; }
        .reveal-5 { animation-delay: 0.5s; }
        .reveal-6 { animation-delay: 0.6s; }
        .reveal-7 { animation-delay: 0.7s; }
        .reveal-8 { animation-delay: 0.8s; }

        /* Fade animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Slide animations */
        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            animation: slideInLeft 0.8s ease forwards;
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            animation: slideInRight 0.8s ease forwards;
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Float animation */
        .float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* =============================================
           SCROLL ANIMATIONS
           ============================================= */

        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-animate.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-animate-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-animate-left.in-view {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-animate-right.in-view {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-animate-scale.in-view {
            opacity: 1;
            transform: scale(1);
        }

        /* Stagger delays */
        .stagger-1 { transition-delay: 0.1s; }
        .stagger-2 { transition-delay: 0.2s; }
        .stagger-3 { transition-delay: 0.3s; }
        .stagger-4 { transition-delay: 0.4s; }
        .stagger-5 { transition-delay: 0.5s; }
        .stagger-6 { transition-delay: 0.6s; }

        /* =============================================
           UTILITY CLASSES
           ============================================= */

        .bg-beige { background-color: var(--color-beige); }
        .bg-beige-dark { background-color: var(--color-beige-dark); }
        .bg-beige-light { background-color: var(--color-beige-light); }
        .bg-navy { background-color: var(--color-navy); }
        .bg-white { background-color: var(--color-white); }

        .text-navy { color: var(--color-navy); }
        .text-black { color: var(--body-color); }

        /* Focus visible for accessibility */
        :focus-visible {
            outline: 3px solid var(--color-navy-light);
            outline-offset: 2px;
        }

        /* Skip link for accessibility */
        .skip-link {
            position: absolute;
            top: -100%;
            left: 0;
            background: var(--color-navy);
            color: var(--color-white);
            padding: 1rem 2rem;
            z-index: 9999;
            transition: top 0.3s;
        }

        .skip-link:focus {
            top: 0;
        }

        /* =============================================
           RESPONSIVE ADJUSTMENTS
           ============================================= */

        @media (max-width: 768px) {
            body {
                font-size: 15px;
            }

            .btn-primary,
            .btn-secondary {
                padding: 0.875rem 1.5rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            body {
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="font-body antialiased">
    <!-- Skip Link for Accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Content Wrapper -->
    <div class="relative">
        <!-- Navigation -->
        @include('components.navbar')

        <!-- Page Content -->
        <main id="main-content" class="page-gradient">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Scroll to Top Button -->
    <button 
        x-data="{ show: false }"
        x-show="show"
        x-on:scroll.window="show = window.pageYOffset > 300"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-8 right-8 bg-[var(--color-navy)] hover:bg-[var(--color-navy-light)] text-white p-4 rounded-lg transition-all duration-300 z-50 shadow-lg hover:shadow-xl group"
        aria-label="Scroll to top"
    >
        <i class="fas fa-arrow-up text-sm group-hover:-translate-y-0.5 transition-transform"></i>
    </button>

    @stack('scripts')

    <!-- Global Scroll Animation Observer -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -80px 0px',
                threshold: 0.1
            };

            const scrollObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale').forEach(el => {
                scrollObserver.observe(el);
            });
        });
    </script>
</body>
</html>
