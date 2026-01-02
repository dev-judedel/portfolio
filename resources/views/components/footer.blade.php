<footer style="background-color: #0F2340;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            <!-- About Section -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="font-heading text-3xl mb-4" style="color: #FFFFFF;">
                    {{ $profile->full_name ?? 'JUDE' }}
                </h3>
                <p class="mb-6 font-body leading-relaxed max-w-md" style="color: #FFFFFF;">
                    {{ $profile->short_bio ?? 'Full-Stack Developer & UI/UX Designer passionate about creating beautiful, functional web applications.' }}
                </p>
                @if($profile && $profile->social_links)
                <div class="flex space-x-3">
                    @if(!empty($profile->social_links['github']))
                    <a href="{{ $profile->social_links['github'] }}" target="_blank" class="w-11 h-11 rounded-lg flex items-center justify-center transition-all duration-300" style="background-color: rgba(255,255,255,0.1); color: #FFFFFF;" aria-label="GitHub">
                        <i class="fab fa-github text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['linkedin']))
                    <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="w-11 h-11 rounded-lg flex items-center justify-center transition-all duration-300" style="background-color: rgba(255,255,255,0.1); color: #FFFFFF;" aria-label="LinkedIn">
                        <i class="fab fa-linkedin text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['twitter']))
                    <a href="{{ $profile->social_links['twitter'] }}" target="_blank" class="w-11 h-11 rounded-lg flex items-center justify-center transition-all duration-300" style="background-color: rgba(255,255,255,0.1); color: #FFFFFF;" aria-label="Twitter">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($profile->social_links['dribbble']))
                    <a href="{{ $profile->social_links['dribbble'] }}" target="_blank" class="w-11 h-11 rounded-lg flex items-center justify-center transition-all duration-300" style="background-color: rgba(255,255,255,0.1); color: #FFFFFF;" aria-label="Dribbble">
                        <i class="fab fa-dribbble text-lg"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-heading text-lg mb-6" style="color: #FFFFFF;">QUICK LINKS</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="font-body hover:opacity-70 transition-opacity duration-300" style="color: #FFFFFF;">Home</a></li>
                    <li><a href="{{ route('about') }}" class="font-body hover:opacity-70 transition-opacity duration-300" style="color: #FFFFFF;">About</a></li>
                    <li><a href="{{ route('projects.index') }}" class="font-body hover:opacity-70 transition-opacity duration-300" style="color: #FFFFFF;">Projects</a></li>
                    <li><a href="{{ route('services.index') }}" class="font-body hover:opacity-70 transition-opacity duration-300" style="color: #FFFFFF;">Services</a></li>
                    <li><a href="{{ route('contact.index') }}" class="font-body hover:opacity-70 transition-opacity duration-300" style="color: #FFFFFF;">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-heading text-lg mb-6" style="color: #FFFFFF;">GET IN TOUCH</h4>
                <ul class="space-y-4 font-body">
                    @if($profile && $profile->email)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-envelope mt-1" style="color: #FFFFFF;"></i>
                        <span style="color: #FFFFFF;">{{ $profile->email }}</span>
                    </li>
                    @endif
                    @if($profile && $profile->phone)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-phone mt-1" style="color: #FFFFFF;"></i>
                        <span style="color: #FFFFFF;">{{ $profile->phone }}</span>
                    </li>
                    @endif
                    @if($profile && $profile->location)
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1" style="color: #FFFFFF;"></i>
                        <span style="color: #FFFFFF;">{{ $profile->location }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8" style="border-top: 1px solid rgba(255,255,255,0.2);">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm font-body" style="color: #FFFFFF;">
                    &copy; {{ date('Y') }} {{ $profile->full_name ?? 'JUDE' }}. All rights reserved.
                </p>
                <p class="text-sm font-body flex items-center gap-2" style="color: #FFFFFF;">
                    Crafted with <i class="fas fa-heart" style="color: #F87171;"></i> using Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </div>
</footer>
