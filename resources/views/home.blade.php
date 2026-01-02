@extends('layouts.app')

@section('title', 'Home - JUDE')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Text Content -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Greeting -->
                    <div class="hero-animate hero-animate-1">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--color-navy)]/10 rounded-full text-sm font-medium text-[var(--color-navy)]">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            Available for work
                        </span>
                    </div>
                    
                    <!-- Main Heading -->
                    <div class="space-y-4 hero-animate hero-animate-2">
                        <p class="text-lg text-[var(--body-color-muted)] font-body">Hello, I'm</p>
                        <h1 class="font-heading text-6xl md:text-7xl lg:text-8xl text-[var(--color-navy)] leading-none">
                            <span id="typed-name"></span><span class="typing-cursor"></span>
                        </h1>
                    </div>
                    
                    <!-- Title -->
                    <div class="hero-animate hero-animate-3">
                        <h2 class="font-heading text-2xl md:text-3xl text-[var(--color-navy)]/70">
                            <span id="typed-title"></span>
                        </h2>
                    </div>
                    
                    <!-- Description -->
                    <p class="text-lg text-[var(--body-color-muted)] max-w-xl font-body leading-relaxed hero-animate hero-animate-4">
                        {{ $profile->short_bio ?? 'Crafting elegant digital experiences through clean code and thoughtful design. Specializing in modern web applications that make a difference.' }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4 hero-animate hero-animate-5">
                        <a href="{{ route('projects.index') }}" class="btn-primary">
                            <span>View My Work</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                        
                        <a href="{{ route('contact.index') }}" class="btn-secondary">
                            <span>Get in Touch</span>
                            <i class="fas fa-envelope text-sm"></i>
                        </a>
                    </div>

                    <!-- Stats -->
                    @if($profile)
                    <div class="grid grid-cols-3 gap-8 pt-12 hero-animate hero-animate-6">
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl text-[var(--color-navy)]">{{ $profile->years_experience }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Years Experience</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl text-[var(--color-navy)]">{{ $profile->projects_completed }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Projects Done</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl text-[var(--color-navy)]">{{ $profile->happy_clients }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Happy Clients</div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Profile Image with Starburst Effect -->
                <div class="relative hidden lg:flex items-center justify-center hero-animate hero-animate-4">
                    <div class="relative profile-wrapper">
                        <!-- Starburst Animation -->
                        <div class="starburst-container">
                            @for($i = 0; $i < 12; $i++)
                            <div class="starburst-line" style="--rotation: {{ $i * 30 }}deg; --delay: {{ 0.8 + ($i * 0.08) }}s;"></div>
                            @endfor
                        </div>

                        <!-- Sparkles -->
                        <div class="sparkle sparkle-1"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>
                        <div class="sparkle sparkle-2"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>
                        <div class="sparkle sparkle-3"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>

                        <!-- Profile Image -->
                        <div class="relative w-80 h-80 md:w-96 md:h-96 z-10 profile-image-container">
                            @if($profile && $profile->profile_image)
                                <div class="w-full h-full rounded-full overflow-hidden border-4 border-[var(--color-navy)]/20 shadow-2xl profile-glow">
                                    <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                         alt="{{ $profile->full_name }}"
                                         class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-full h-full rounded-full bg-[var(--color-navy)]/10 border-4 border-[var(--color-navy)]/20 flex items-center justify-center profile-glow">
                                    <i class="fas fa-user text-8xl text-[var(--color-navy)]/30"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 hero-animate hero-animate-7">
            <a href="#projects" class="flex flex-col items-center gap-2 text-[var(--body-color-muted)] hover:text-[var(--color-navy)] transition-colors">
                <span class="text-xs font-medium uppercase tracking-widest">Scroll</span>
                <div class="w-6 h-10 border-2 border-current rounded-full flex justify-center pt-2">
                    <div class="w-1 h-2 bg-current rounded-full animate-bounce"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section id="projects" class="py-24 md:py-32 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <span class="section-label scroll-animate">Portfolio</span>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[var(--color-navy)] mt-4 mb-6 scroll-animate stagger-1">SELECTED WORK</h2>
                <p class="text-[var(--body-color-muted)] font-body text-lg max-w-2xl mx-auto scroll-animate stagger-2">
                    A collection of projects that showcase my skills and passion for creating impactful digital experiences.
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredProjects as $index => $project)
                    <article class="group card-modern scroll-animate stagger-{{ min($index + 1, 6) }}">
                        <!-- Project Image -->
                        <div class="relative overflow-hidden aspect-[4/3]">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-[var(--color-navy)]/5">
                                    <i class="fas fa-image text-4xl text-[var(--color-navy)]/20"></i>
                                </div>
                            @endif

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-[var(--color-navy)]/90 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                                <a href="{{ route('projects.show', $project->slug) }}" 
                                   class="btn-primary bg-white text-[var(--color-navy)] hover:bg-[var(--color-beige)]">
                                    <span>View Project</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="p-6 space-y-4">
                            <span class="text-xs font-semibold text-[var(--color-navy)] uppercase tracking-wider">{{ $project->category }}</span>
                            <h3 class="font-heading text-xl text-[var(--color-navy)] group-hover:text-[var(--color-navy-light)] transition-colors">
                                {{ strtoupper($project->title) }}
                            </h3>
                            <p class="text-[var(--body-color-muted)] text-sm font-body line-clamp-2">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 pt-2">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="px-3 py-1 bg-[var(--color-navy)]/5 text-[var(--body-color-muted)] text-xs rounded-full font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 card-modern scroll-animate">
                        <i class="fas fa-folder-open text-[var(--color-navy)]/20 text-6xl mb-4"></i>
                        <p class="text-[var(--body-color-muted)] font-body">No projects available yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Link -->
            @if($featuredProjects->count() > 0)
            <div class="text-center mt-16 scroll-animate">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-lg font-body font-semibold transition-all duration-300" style="background-color: #1B365D; color: #FFFFFF;">
                    <span>View All Projects</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-24 md:py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <span class="section-label scroll-animate">Expertise</span>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[var(--color-navy)] mt-4 mb-6 scroll-animate stagger-1">SKILLS & TOOLS</h2>
                <p class="text-[var(--body-color-muted)] font-body text-lg max-w-2xl mx-auto scroll-animate stagger-2">
                    Technologies I work with to bring ideas to life.
                </p>
            </div>

            <!-- Skills Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($skills as $index => $skill)
                    <div class="group card-modern p-6 text-center scroll-animate-scale" style="transition-delay: {{ $index * 0.05 }}s;">
                        <div class="space-y-4">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--color-navy)]/5 flex items-center justify-center group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                                <i class="{{ $skill->icon }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-body font-semibold text-[var(--body-color)] text-sm">
                                {{ $skill->name }}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 md:py-32 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <span class="section-label scroll-animate">Testimonials</span>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[var(--color-navy)] mt-4 scroll-animate stagger-1">CLIENT FEEDBACK</h2>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $index => $testimonial)
                    <div class="card-modern p-8 space-y-6 scroll-animate stagger-{{ $index + 1 }}">
                        <!-- Quote Icon -->
                        <div class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center">
                            <i class="fas fa-quote-left text-[var(--color-navy)]"></i>
                        </div>
                        
                        <!-- Rating Stars -->
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-sm {{ $i <= $testimonial->rating ? 'text-[var(--color-navy)]' : 'text-[var(--color-navy)]/20' }}"></i>
                            @endfor
                        </div>
                        
                        <!-- Testimonial Text -->
                        <p class="text-[var(--body-color-muted)] font-body leading-relaxed">
                            "{{ $testimonial->testimonial }}"
                        </p>
                        
                        <!-- Client Info -->
                        <div class="flex items-center gap-4 pt-4 border-t border-[var(--border-color)]">
                            <div class="w-12 h-12 rounded-full bg-[var(--color-navy)] flex items-center justify-center text-white font-heading text-lg">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <h5 class="font-body font-semibold text-[var(--body-color)]">{{ $testimonial->client_name }}</h5>
                                <p class="text-sm text-[var(--body-color-muted)]">{{ $testimonial->client_position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 md:py-32 relative overflow-hidden" style="background-color: #1B365D;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-white leading-tight scroll-animate">
                    LET'S CREATE SOMETHING<br>
                    <span class="text-white/70">AMAZING TOGETHER</span>
                </h2>
                <p class="text-xl font-body max-w-2xl mx-auto scroll-animate stagger-1" style="color: #FFFFFF;">
                    Have a project in mind? Let's discuss how we can work together to bring your vision to life.
                </p>
                
                <div class="pt-4 scroll-animate stagger-2">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[#1B365D] rounded-lg font-body font-semibold hover:bg-[#F5F0E8] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Start a Conversation</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Styles -->
    <style>
        /* Hero animations */
        .hero-animate {
            opacity: 0;
            transform: translateY(40px);
        }

        .hero-animate.loaded {
            animation: heroFadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .hero-animate-1.loaded { animation-delay: 0.1s; }
        .hero-animate-2.loaded { animation-delay: 0.2s; }
        .hero-animate-3.loaded { animation-delay: 0.4s; }
        .hero-animate-4.loaded { animation-delay: 0.3s; }
        .hero-animate-5.loaded { animation-delay: 0.5s; }
        .hero-animate-6.loaded { animation-delay: 0.6s; }
        .hero-animate-7.loaded { animation-delay: 0.8s; }

        @keyframes heroFadeIn {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Hero orbs */
        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0;
        }

        .hero-orb.loaded {
            animation: orbFadeIn 1.5s ease-out forwards;
        }

        .hero-orb-1 {
            top: 10%;
            left: 5%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
            opacity: 0.05;
        }

        .hero-orb-2 {
            bottom: 10%;
            right: 5%;
            width: 500px;
            height: 500px;
            background: var(--color-navy);
            opacity: 0.03;
            animation-delay: 0.3s;
        }

        @keyframes orbFadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 0.05; transform: scale(1); }
        }

        /* Starburst */
        .starburst-container {
            width: 500px;
            height: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .starburst-line {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 3px;
            height: 0;
            background: linear-gradient(to top, transparent, var(--color-navy), transparent);
            transform-origin: center bottom;
            transform: translate(-50%, -100%) rotate(var(--rotation));
            opacity: 0;
            border-radius: 2px;
        }

        .starburst-line.animate {
            animation: starburstGrow 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            animation-delay: var(--delay);
        }

        @keyframes starburstGrow {
            0% { height: 0; opacity: 0; }
            100% { height: 80px; opacity: 0.4; }
        }

        /* Sparkles */
        .sparkle {
            position: absolute;
            color: var(--color-navy);
            opacity: 0;
            transform: scale(0) rotate(0deg);
            z-index: 20;
        }

        .sparkle.animate {
            animation: sparkleAppear 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .sparkle svg { width: 20px; height: 20px; }
        .sparkle-1 { top: 5%; right: 10%; animation-delay: 1s; }
        .sparkle-2 { bottom: 15%; left: 5%; animation-delay: 1.2s; }
        .sparkle-2 svg { width: 16px; height: 16px; }
        .sparkle-3 { top: 20%; left: 0%; animation-delay: 1.4s; }
        .sparkle-3 svg { width: 12px; height: 12px; }

        @keyframes sparkleAppear {
            0% { opacity: 0; transform: scale(0) rotate(0deg); }
            50% { opacity: 1; transform: scale(1.3) rotate(180deg); }
            100% { opacity: 0.6; transform: scale(1) rotate(360deg); }
        }

        /* Profile image */
        .profile-image-container {
            opacity: 0;
            transform: scale(0.8);
        }

        .profile-image-container.animate {
            animation: profileScale 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
        }

        @keyframes profileScale {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .profile-glow {
            box-shadow: 0 25px 60px rgba(27, 54, 93, 0.15);
        }

        .profile-glow.animate {
            animation: profileGlowAppear 1s ease 0.8s forwards;
        }

        @keyframes profileGlowAppear {
            from { box-shadow: 0 25px 60px rgba(27, 54, 93, 0.15); }
            to { box-shadow: 0 0 60px rgba(27, 54, 93, 0.15), 0 25px 60px rgba(27, 54, 93, 0.2); }
        }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger hero animations
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('loaded'));
                document.querySelectorAll('.hero-orb').forEach(el => el.classList.add('loaded'));
            }, 100);

            // Trigger profile animations
            setTimeout(() => {
                document.querySelector('.profile-image-container')?.classList.add('animate');
                document.querySelectorAll('.starburst-line').forEach(el => el.classList.add('animate'));
                document.querySelectorAll('.sparkle').forEach(el => el.classList.add('animate'));
                document.querySelector('.profile-glow')?.classList.add('animate');
            }, 300);

            // Typing animation
            const name = "{{ $profile->full_name ?? 'JUDE' }}";
            const title = "{{ $profile->title ?? 'FULL-STACK DEVELOPER' }}";
            
            function typeText(element, text, speed = 100, callback) {
                if (!element) return;
                let i = 0;
                const interval = setInterval(() => {
                    if (i < text.length) {
                        element.textContent += text.charAt(i);
                        i++;
                    } else {
                        clearInterval(interval);
                        if (callback) callback();
                    }
                }, speed);
            }
            
            setTimeout(() => {
                const nameElement = document.getElementById('typed-name');
                const titleElement = document.getElementById('typed-title');
                
                typeText(nameElement, name.toUpperCase(), 80, () => {
                    setTimeout(() => {
                        typeText(titleElement, title.toUpperCase(), 50);
                    }, 300);
                });
            }, 600);
        });
    </script>
@endsection
