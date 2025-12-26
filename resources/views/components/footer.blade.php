<footer class="bg-[var(--page-text)] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            <!-- About Section -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="font-heading text-2xl font-bold text-white mb-4">
                    {{ $profile->full_name ?? 'Portfolio' }}
                </h3>
                <p class="text-white/60 mb-6 font-body leading-relaxed">
                    {{ $profile->short_bio ?? 'Full-Stack Developer & UI/UX Designer passionate about creating beautiful, functional web applications.' }}
                </p>
                @if($profile && $profile->social_links)
                <div class="flex space-x-3">
                    @if(!empty($profile->social_links['github']))
                    <a href="{{ $profile->social_links['github'] }}" target="_blank" class="social-link" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['linkedin']))
                    <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['twitter']))
                    <a href="{{ $profile->social_links['twitter'] }}" target="_blank" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['dribbble']))
                    <a href="{{ $profile->social_links['dribbble'] }}" target="_blank" class="social-link" aria-label="Dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-heading font-semibold text-white mb-6 text-sm uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ route('projects.index') }}" class="footer-link">Projects</a></li>
                    <li><a href="{{ route('services.index') }}" class="footer-link">Services</a></li>
                    <li><a href="{{ route('contact.index') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-heading font-semibold text-white mb-6 text-sm uppercase tracking-wider">Get in Touch</h4>
                <ul class="space-y-3 text-white/60 font-body">
                    @if($profile && $profile->email)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope mt-1 text-white/40"></i>
                        <span>{{ $profile->email }}</span>
                    </li>
                    @endif
                    @if($profile && $profile->phone)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-phone mt-1 text-white/40"></i>
                        <span>{{ $profile->phone }}</span>
                    </li>
                    @endif
                    @if($profile && $profile->location)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-white/40"></i>
                        <span>{{ $profile->location }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/50 text-sm font-body">
                    &copy; {{ date('Y') }} {{ $profile->full_name ?? 'Portfolio' }}. All rights reserved.
                </p>
                <p class="text-white/50 text-sm font-body flex items-center gap-2">
                    Crafted with <i class="fas fa-heart text-[var(--accent-primary)]"></i> using Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background-color: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background-color: var(--accent-primary);
        color: white;
        transform: translateY(-2px);
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.6);
        font-family: 'DM Sans', sans-serif;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .footer-link:hover {
        color: white;
        transform: translateX(4px);
    }
</style>
