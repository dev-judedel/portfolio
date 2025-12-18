<footer class="bg-black/90 border-t border-white/10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- About Section -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold text-white mb-4 text-glow">
                    Portfolio
                </h3>
                <p class="text-white/60 mb-4 font-light">
                    Full-Stack Developer & UI/UX Designer passionate about creating beautiful, functional web applications.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="social-link" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ route('projects.index') }}" class="footer-link">Projects</a></li>
                    <li><a href="{{ route('services.index') }}" class="footer-link">Services</a></li>
                    <li><a href="{{ route('blog.index') }}" class="footer-link">Blog</a></li>
                    <li><a href="{{ route('contact.index') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-semibold text-white mb-4">Get in Touch</h4>
                <ul class="space-y-2 text-white/60 font-light">
                    <li class="flex items-start">
                        <i class="fas fa-envelope mt-1 mr-2 text-white/40"></i>
                        <span>judedelacruz2025@gmail.com</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone mt-1 mr-2 text-white/40"></i>
                        <span>63 (956) 130-5511</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-2 text-white/40"></i>
                        <span>Bulacan, PH</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-white/60 text-sm font-light">
                    &copy; {{ date('Y') }} Portfolio. All rights reserved.
                </p>
                <p class="text-white/60 text-sm mt-2 md:mt-0 font-light">
                    Crafted with <i class="fas fa-heart text-white/40"></i> using Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .social-link {
        @apply w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center text-white/70 hover:text-white hover:bg-white/20 transition-all duration-300 border border-white/10;
    }

    .social-link:hover {
        box-shadow: 0 0 20px rgba(255,255,255,0.2);
    }

    .footer-link {
        @apply text-white/60 hover:text-white transition-colors duration-300 font-light;
    }

    .footer-link:hover {
        text-shadow: 0 0 10px rgba(255,255,255,0.5);
    }
</style>
