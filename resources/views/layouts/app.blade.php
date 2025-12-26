<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Portfolio'))</title>

    <!-- Fonts - Distinctive Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Claude-Inspired Light Theme - Modern AI Aesthetic */
        :root {
            --page-bg: #FFFAF5;
            --page-bg-secondary: #FFF7F0;
            --page-text: #1a1a1a;
            --page-text-muted: #6b6b6b;
            --page-text-light: #9a9a9a;
            --accent-primary: #D97757;
            --accent-secondary: #CC785C;
            --border-color: rgba(26, 26, 26, 0.1);
            --border-hover: rgba(26, 26, 26, 0.2);
            --button-bg: #1a1a1a;
            --button-bg-hover: #2d2d2d;
            --button-text: #ffffff;
            --card-bg: rgba(255, 255, 255, 0.7);
            --card-border: rgba(26, 26, 26, 0.08);
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--page-bg);
            color: var(--page-text);
            font-family: 'DM Sans', sans-serif;
        }

        /* Typography */
        .font-display {
            font-family: 'Instrument Serif', serif;
        }
        
        .font-heading {
            font-family: 'Syne', sans-serif;
        }
        
        .font-body {
            font-family: 'DM Sans', sans-serif;
        }

        /* Subtle grain texture overlay */
        .grain-overlay::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.03;
            z-index: 1000;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }
        
        /* Page gradient background */
        .page-gradient {
            background: linear-gradient(180deg, 
                var(--page-bg) 0%, 
                var(--page-bg-secondary) 50%,
                var(--page-bg) 100%
            );
        }
        
        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--page-bg);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(26, 26, 26, 0.15);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(26, 26, 26, 0.25);
        }
        
        /* Selection color */
        ::selection {
            background: var(--accent-primary);
            color: #ffffff;
        }
        
        /* Link underline animation */
        .link-underline {
            position: relative;
        }
        
        .link-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background: var(--page-text);
            transition: width 0.3s ease;
        }
        
        .link-underline:hover::after {
            width: 100%;
        }

        /* Black buttons */
        .btn-primary {
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary:hover {
            background-color: var(--button-bg-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26, 26, 26, 0.2);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--page-text);
            border: 1px solid var(--border-color);
            padding: 0.875rem 2rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-secondary:hover {
            border-color: var(--page-text);
            background-color: var(--page-text);
            color: var(--button-text);
        }

        /* Card styles */
        .card-modern {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            transition: all 0.4s ease;
        }

        .card-modern:hover {
            border-color: var(--border-hover);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(26, 26, 26, 0.08);
        }

        /* Typing cursor animation */
        .typing-cursor {
            display: inline-block;
            width: 3px;
            height: 1em;
            background-color: var(--accent-primary);
            margin-left: 4px;
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Text reveal animation */
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

        /* Staggered animations */
        .reveal-1 { animation-delay: 0.1s; }
        .reveal-2 { animation-delay: 0.2s; }
        .reveal-3 { animation-delay: 0.3s; }
        .reveal-4 { animation-delay: 0.4s; }
        .reveal-5 { animation-delay: 0.5s; }
        .reveal-6 { animation-delay: 0.6s; }
        .reveal-7 { animation-delay: 0.7s; }
        .reveal-8 { animation-delay: 0.8s; }

        /* Fade in up animation */
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

        /* Slide in animation */
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

        /* Scale in animation */
        .scale-in {
            opacity: 0;
            transform: scale(0.9);
            animation: scaleIn 0.6s ease forwards;
        }

        @keyframes scaleIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Floating animation */
        .float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Pulse glow */
        .pulse-glow {
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(217, 119, 87, 0.2);
            }
            50% { 
                box-shadow: 0 0 40px rgba(217, 119, 87, 0.4);
            }
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, var(--page-text) 0%, var(--page-text-muted) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Section divider */
        .section-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, var(--page-text), transparent);
        }
    </style>
</head>
<body class="font-body antialiased grain-overlay">
    
    <!-- Content Wrapper -->
    <div class="relative z-10">
        <!-- Navigation -->
        @include('components.navbar')

        <!-- Page Content -->
        <main class="page-gradient">
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
        class="fixed bottom-8 right-8 bg-[var(--button-bg)] hover:bg-[var(--button-bg-hover)] text-white p-3.5 rounded-lg transition-all duration-300 z-50 shadow-lg hover:shadow-xl group"
        aria-label="Scroll to top"
    >
        <i class="fas fa-arrow-up text-sm group-hover:-translate-y-0.5 transition-transform"></i>
    </button>

    @stack('scripts')
</body>
</html>
