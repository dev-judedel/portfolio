<nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-40 bg-black/80 backdrop-blur-md border-b border-white/10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white hover:text-white/80 transition-colors duration-300">
                    <span class="text-glow">Portfolio</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                    Projects
                </a>
                <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                    Services
                </a>
                <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                    Blog
                </a>
                <a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                    Contact
                </a>

                <!-- Admin Link (if logged in) -->
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-lg transition-all duration-300 font-medium border border-white/20 constellation-glow">
                        <i class="fas fa-dashboard mr-2"></i> Dashboard
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-200"
                    aria-controls="mobile-menu" 
                    :aria-expanded="mobileMenuOpen"
                >
                    <span class="sr-only">Open main menu</span>
                    <i x-show="!mobileMenuOpen" class="fas fa-bars text-xl"></i>
                    <i x-show="mobileMenuOpen" class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div 
        x-show="mobileMenuOpen" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="md:hidden"
        id="mobile-menu"
    >
        <div class="px-2 pt-2 pb-3 space-y-1 bg-black/90 backdrop-blur-md border-t border-white/10">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-home mr-3"></i> Home
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-user mr-3"></i> About
            </a>
            <a href="{{ route('projects.index') }}" class="mobile-nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase mr-3"></i> Projects
            </a>
            <a href="{{ route('services.index') }}" class="mobile-nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="fas fa-cog mr-3"></i> Services
            </a>
            <a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                <i class="fas fa-blog mr-3"></i> Blog
            </a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                <i class="fas fa-envelope mr-3"></i> Contact
            </a>
            
            @auth
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link">
                    <i class="fas fa-dashboard mr-3"></i> Dashboard
                </a>
            @endauth
        </div>
    </div>
</nav>

<style>
    .nav-link {
        @apply text-white/70 hover:text-white transition-all duration-300 font-light relative;
    }
    
    .nav-link:hover {
        text-shadow: 0 0 10px rgba(255,255,255,0.5);
    }
    
    .nav-link.active {
        @apply text-white font-normal;
        text-shadow: 0 0 10px rgba(255,255,255,0.8);
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, white, transparent);
    }

    .mobile-nav-link {
        @apply block px-3 py-2 rounded-md text-base font-light text-white/70 hover:text-white hover:bg-white/10 transition-all duration-300;
    }

    .mobile-nav-link.active {
        @apply text-white bg-white/10 font-normal;
    }
</style>
