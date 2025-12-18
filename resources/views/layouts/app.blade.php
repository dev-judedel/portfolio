<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Portfolio'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Ultra-Minimalist Space Theme - Professional Black & White */
        body {
            background: #000000;
            /* Subtle star pattern - less prominent */
            background-image: 
                radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px),
                radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px),
                radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 600px 600px, 400px 400px, 300px 300px;
            background-position: 0 0, 50px 80px, 150px 300px;
        }
        
        .space-gradient {
            background: linear-gradient(180deg, 
                rgba(0,0,0,0.98) 0%, 
                rgba(5,5,10,0.95) 50%,
                rgba(0,0,0,0.98) 100%
            );
        }
        
        /* Ultra-subtle glow effects */
        .constellation-glow {
            box-shadow: 
                0 0 30px rgba(255,255,255,0.03),
                0 0 60px rgba(255,255,255,0.02);
        }
        
        .text-glow {
            text-shadow: 
                0 0 20px rgba(255,255,255,0.15),
                0 0 40px rgba(255,255,255,0.08);
        }
        
        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.5);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.15);
        }
        
        /* Selection color */
        ::selection {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
        }
        
        /* Link subtle underline animation */
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
            background: rgba(255,255,255,0.5);
            transition: width 0.3s ease;
        }
        
        .link-underline:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="font-sans antialiased text-white transition-colors duration-300">
    
    <!-- Ultra-Subtle Constellation Canvas -->
    <canvas id="particle-canvas" class="fixed inset-0 pointer-events-none z-0"></canvas>

    <!-- Content Wrapper with minimal overlay -->
    <div class="relative z-10">
        <!-- Navigation -->
        @include('components.navbar')

        <!-- Page Content -->
        <main class="space-gradient">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Minimal Scroll to Top Button -->
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
        class="fixed bottom-8 right-8 bg-white/5 hover:bg-white/10 backdrop-blur-md text-white/60 hover:text-white p-3.5 rounded-lg transition-all duration-300 z-50 border border-white/10 hover:border-white/20 group"
        aria-label="Scroll to top"
    >
        <i class="fas fa-arrow-up text-sm group-hover:-translate-y-0.5 transition-transform"></i>
    </button>

    @stack('scripts')
</body>
</html>
