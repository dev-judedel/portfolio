<nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="{ 'bg-[var(--page-bg)]/95 backdrop-blur-md shadow-sm': scrolled, 'bg-transparent': !scrolled }"
     class="fixed top-0 left-0 right-0 z-40 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="group flex items-center gap-2">
                    <span class="font-heading text-2xl font-bold text-[var(--page-text)] group-hover:text-[var(--accent-primary)] transition-colors duration-300">
                        Portfolio
                    </span>
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
                <a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                    Contact
                </a>

                <!-- Admin Link (if logged in) -->
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary text-sm">
                        <i class="fas fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="inline-flex items-center justify-center p-2 rounded-lg text-[var(--page-text)] hover:bg-[var(--border-color)] transition-colors duration-200"
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
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        class="md:hidden"
        id="mobile-menu"
    >
        <div class="px-4 pt-2 pb-4 space-y-1 bg-[var(--page-bg)] border-t border-[var(--border-color)] shadow-lg">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-home w-5"></i> Home
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-user w-5"></i> About
            </a>
            <a href="{{ route('projects.index') }}" class="mobile-nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase w-5"></i> Projects
            </a>
            <a href="{{ route('services.index') }}" class="mobile-nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="fas fa-cog w-5"></i> Services
            </a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                <i class="fas fa-envelope w-5"></i> Contact
            </a>
            
            @auth
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link bg-[var(--button-bg)] text-white">
                    <i class="fas fa-dashboard w-5"></i> Dashboard
                </a>
            @endauth
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div class="h-20"></div>

<style>
    .nav-link {
        position: relative;
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;
        font-size: 0.9rem;
        color: var(--page-text-muted);
        transition: color 0.3s ease;
        padding: 0.5rem 0;
    }
    
    .nav-link:hover {
        color: var(--page-text);
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--page-text);
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
        width: 100%;
    }
    
    .nav-link.active {
        color: var(--page-text);
        font-weight: 600;
    }
    
    .nav-link.active::after {
        width: 100%;
    }

    .mobile-nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1rem;
        border-radius: 0.5rem;
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;
        color: var(--page-text-muted);
        transition: all 0.3s ease;
    }

    .mobile-nav-link:hover {
        color: var(--page-text);
        background-color: var(--border-color);
    }

    .mobile-nav-link.active {
        color: var(--page-text);
        background-color: var(--border-color);
        font-weight: 600;
    }
</style>
