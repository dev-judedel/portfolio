<nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="{ 'bg-[#F5F0E8]/95 backdrop-blur-md shadow-sm': scrolled, 'bg-transparent': !scrolled }"
     class="fixed top-0 left-0 right-0 z-40 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="group flex items-center gap-2">
                    <span class="font-heading text-3xl transition-colors duration-300" style="color: #1B365D;">
                        JUDE
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" style="color: #1B365D;">
                    Home
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" style="color: #1B365D;">
                    About
                </a>
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" style="color: #1B365D;">
                    Projects
                </a>
                <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" style="color: #1B365D;">
                    Services
                </a>
                <a href="{{ route('contact.index') }}" class="text-sm py-3 px-6 rounded-lg font-semibold inline-flex items-center gap-2 transition-all duration-300" style="background-color: #1B365D; color: #FFFFFF;">
                    <span>Contact</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>

                <!-- Admin Link (if logged in) -->
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: #1B365D;">
                        <i class="fas fa-dashboard"></i>
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="inline-flex items-center justify-center p-2.5 rounded-lg transition-colors duration-200"
                    style="color: #1B365D;"
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
        <div class="px-4 pt-2 pb-4 space-y-1 shadow-lg" style="background-color: #F5F0E8; border-top: 1px solid rgba(27, 54, 93, 0.1);">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}" style="color: #1B365D;">
                <i class="fas fa-home w-5"></i> Home
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}" style="color: #1B365D;">
                <i class="fas fa-user w-5"></i> About
            </a>
            <a href="{{ route('projects.index') }}" class="mobile-nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" style="color: #1B365D;">
                <i class="fas fa-briefcase w-5"></i> Projects
            </a>
            <a href="{{ route('services.index') }}" class="mobile-nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" style="color: #1B365D;">
                <i class="fas fa-cog w-5"></i> Services
            </a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" style="color: #1B365D;">
                <i class="fas fa-envelope w-5"></i> Contact
            </a>
            
            @auth
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link" style="background-color: #1B365D; color: #FFFFFF;">
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
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 0.9rem;
        transition: opacity 0.3s ease;
        padding: 0.5rem 0;
    }
    
    .nav-link:hover {
        opacity: 0.7;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #1B365D;
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
        width: 100%;
    }
    
    .nav-link.active {
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
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .mobile-nav-link:hover {
        background-color: rgba(27, 54, 93, 0.1);
    }

    .mobile-nav-link.active {
        background-color: rgba(27, 54, 93, 0.1);
        font-weight: 600;
    }
</style>
