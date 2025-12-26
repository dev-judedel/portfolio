@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
    <!-- Hero Section - Modern AI Theme with Typing Animation -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Floating gradient orbs -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[var(--accent-primary)]/10 rounded-full blur-3xl float" style="animation-delay: 0s;"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[var(--accent-secondary)]/10 rounded-full blur-3xl float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[var(--accent-primary)]/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Text Content -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Greeting -->
                    <div class="reveal-text reveal-1">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--page-text)]/5 rounded-full text-sm font-medium text-[var(--page-text-muted)]">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            Available for work
                        </span>
                    </div>
                    
                    <!-- Main Heading with Typing Effect -->
                    <div class="space-y-4 reveal-text reveal-2">
                        <h1 class="font-display text-5xl md:text-7xl lg:text-8xl text-[var(--page-text)] leading-[1.1]">
                            Hello, I'm
                        </h1>
                        <h1 class="font-heading text-5xl md:text-7xl lg:text-8xl font-bold text-[var(--page-text)]">
                            <span id="typed-name"></span><span class="typing-cursor"></span>
                        </h1>
                    </div>
                    
                    <!-- Title with Typing -->
                    <div class="reveal-text reveal-3">
                        <h2 class="font-heading text-xl md:text-2xl text-[var(--page-text-muted)] font-medium">
                            <span id="typed-title"></span>
                        </h2>
                    </div>
                    
                    <!-- Description -->
                    <p class="text-lg text-[var(--page-text-muted)] max-w-xl font-body leading-relaxed reveal-text reveal-4">
                        {{ $profile->short_bio ?? 'Crafting elegant digital experiences through clean code and thoughtful design. Specializing in modern web applications that make a difference.' }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4 reveal-text reveal-5">
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
                    <div class="grid grid-cols-3 gap-8 pt-12 reveal-text reveal-6">
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl font-bold text-[var(--page-text)]">{{ $profile->years_experience }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Years Experience</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl font-bold text-[var(--page-text)]">{{ $profile->projects_completed }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Projects Done</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="font-heading text-4xl md:text-5xl font-bold text-[var(--page-text)]">{{ $profile->happy_clients }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Happy Clients</div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Profile Image with Starburst Effect -->
                <div class="relative hidden lg:flex items-center justify-center reveal-text reveal-4">
                    <div class="relative">
                        <!-- Starburst/Spark Animation -->
                        <div class="starburst-container absolute inset-0 flex items-center justify-center">
                            <!-- Radiating lines -->
                            @for($i = 0; $i < 12; $i++)
                            <div class="starburst-line" style="--rotation: {{ $i * 30 }}deg; --delay: {{ $i * 0.1 }}s;"></div>
                            @endfor
                        </div>

                        <!-- Animated cursor sparkles -->
                        <div class="sparkle sparkle-1"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>
                        <div class="sparkle sparkle-2"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>
                        <div class="sparkle sparkle-3"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>
                        <div class="sparkle sparkle-4"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg></div>

                        <!-- AI Cursor animation -->
                        <div class="ai-cursor">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 3.21V20.8C5.5 21.3 6.1 21.56 6.46 21.21L10.67 17H18.5C19.05 17 19.5 16.55 19.5 16V4C19.5 3.45 19.05 3 18.5 3H6.5C5.95 3 5.5 3.45 5.5 3.21Z" fill="var(--accent-primary)"/>
                            </svg>
                        </div>

                        <!-- Profile Image Container -->
                        <div class="relative w-80 h-80 md:w-96 md:h-96 z-10">
                            @if($profile && $profile->profile_image)
                                <div class="w-full h-full rounded-full overflow-hidden border-4 border-[var(--page-text)]/10 shadow-2xl profile-glow">
                                    <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                         alt="{{ $profile->full_name }}"
                                         class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-full h-full rounded-full bg-gradient-to-br from-[var(--accent-primary)]/20 to-[var(--accent-secondary)]/20 border-4 border-[var(--page-text)]/10 flex items-center justify-center">
                                    <i class="fas fa-user text-8xl text-[var(--page-text)]/20"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 reveal-text reveal-8">
            <a href="#projects" class="flex flex-col items-center gap-2 text-[var(--page-text-muted)] hover:text-[var(--page-text)] transition-colors">
                <span class="text-xs font-medium uppercase tracking-widest">Scroll</span>
                <div class="w-6 h-10 border-2 border-current rounded-full flex justify-center pt-2">
                    <div class="w-1 h-2 bg-current rounded-full animate-bounce"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section id="projects" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Portfolio</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">Selected Work</h2>
                <p class="text-[var(--page-text-muted)] font-body text-lg max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.2s;">
                    A collection of projects that showcase my skills and passion for creating impactful digital experiences.
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredProjects as $index => $project)
                    <div class="group card-modern overflow-hidden fade-in-up" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                        <!-- Project Image -->
                        <div class="relative overflow-hidden aspect-[4/3]">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[var(--accent-primary)]/10 to-[var(--accent-secondary)]/10">
                                    <i class="fas fa-image text-4xl text-[var(--page-text)]/20"></i>
                                </div>
                            @endif

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[var(--page-text)] via-[var(--page-text)]/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-6">
                                <a href="{{ route('projects.show', $project->slug) }}" 
                                   class="btn-primary text-sm w-full justify-center">
                                    <span>View Project</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="p-6 space-y-4">
                            <span class="text-xs font-medium text-[var(--accent-primary)] uppercase tracking-wider">{{ $project->category }}</span>
                            <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] group-hover:text-[var(--accent-primary)] transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-[var(--page-text-muted)] text-sm font-body line-clamp-2">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 pt-2">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="px-3 py-1 bg-[var(--page-text)]/5 text-[var(--page-text-muted)] text-xs rounded-full font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 card-modern">
                        <i class="fas fa-folder-open text-[var(--page-text)]/10 text-6xl mb-4"></i>
                        <p class="text-[var(--page-text-muted)] font-body">No projects available yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Link -->
            @if($featuredProjects->count() > 0)
            <div class="text-center mt-16 fade-in-up">
                <a href="{{ route('projects.index') }}" class="btn-secondary">
                    <span>View All Projects</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-32 relative bg-[var(--page-bg-secondary)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Expertise</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">Skills & Tools</h2>
                <p class="text-[var(--page-text-muted)] font-body text-lg max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.2s;">
                    Technologies I work with to bring ideas to life.
                </p>
            </div>

            <!-- Skills Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($skills as $index => $skill)
                    <div class="group card-modern p-6 text-center fade-in-up" style="animation-delay: {{ $index * 0.05 }}s;">
                        <div class="space-y-4">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                <i class="{{ $skill->icon }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-heading font-medium text-[var(--page-text)] text-sm">
                                {{ $skill->name }}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Testimonials</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">Client Feedback</h2>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $index => $testimonial)
                    <div class="card-modern p-8 space-y-6 fade-in-up" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                        <!-- Quote Icon -->
                        <div class="w-12 h-12 rounded-xl bg-[var(--accent-primary)]/10 flex items-center justify-center">
                            <i class="fas fa-quote-left text-[var(--accent-primary)]"></i>
                        </div>
                        
                        <!-- Rating Stars -->
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-sm {{ $i <= $testimonial->rating ? 'text-[var(--accent-primary)]' : 'text-[var(--border-color)]' }}"></i>
                            @endfor
                        </div>
                        
                        <!-- Testimonial Text -->
                        <p class="text-[var(--page-text-muted)] font-body leading-relaxed">
                            "{{ $testimonial->testimonial }}"
                        </p>
                        
                        <!-- Client Info -->
                        <div class="flex items-center gap-4 pt-4 border-t border-[var(--border-color)]">
                            <div class="w-12 h-12 rounded-full bg-[var(--page-text)] flex items-center justify-center text-white font-heading font-bold">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <h5 class="font-heading font-semibold text-[var(--page-text)]">{{ $testimonial->client_name }}</h5>
                                <p class="text-sm text-[var(--page-text-muted)]">{{ $testimonial->client_position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 bg-[var(--page-text)]"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--accent-primary)]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--accent-secondary)]/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-display text-4xl md:text-6xl text-white leading-tight fade-in-up">
                    Let's Create Something<br>
                    <span class="text-[var(--accent-primary)]">Amazing Together</span>
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.1s;">
                    Have a project in mind? Let's discuss how we can work together to bring your vision to life.
                </p>
                
                <div class="pt-4 fade-in-up" style="animation-delay: 0.2s;">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[var(--page-text)] rounded-lg font-heading font-semibold hover:bg-[var(--accent-primary)] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Start a Conversation</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Typing Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const name = "{{ $profile->full_name ?? 'Developer' }}";
            const title = "{{ $profile->title ?? 'Full-Stack Developer' }}";
            
            function typeText(element, text, speed = 100, callback) {
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
            
            // Start typing after a short delay
            setTimeout(() => {
                const nameElement = document.getElementById('typed-name');
                const titleElement = document.getElementById('typed-title');
                
                typeText(nameElement, name, 80, () => {
                    setTimeout(() => {
                        typeText(titleElement, title, 50);
                    }, 300);
                });
            }, 800);
        });
    </script>

    <!-- Starburst & Cursor Animations -->
    <style>
        /* Starburst container */
        .starburst-container {
            width: 500px;
            height: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Individual starburst lines */
        .starburst-line {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 3px;
            height: 80px;
            background: linear-gradient(to top, transparent, var(--accent-primary), transparent);
            transform-origin: center bottom;
            transform: translate(-50%, -100%) rotate(var(--rotation));
            animation: starburst-pulse 2s ease-in-out infinite;
            animation-delay: var(--delay);
            opacity: 0.6;
            border-radius: 2px;
        }

        @keyframes starburst-pulse {
            0%, 100% {
                height: 60px;
                opacity: 0.4;
            }
            50% {
                height: 100px;
                opacity: 0.8;
            }
        }

        /* Sparkle stars */
        .sparkle {
            position: absolute;
            color: var(--accent-primary);
            animation: sparkle-float 3s ease-in-out infinite;
            z-index: 20;
        }

        .sparkle svg {
            width: 20px;
            height: 20px;
        }

        .sparkle-1 {
            top: 5%;
            right: 10%;
            animation-delay: 0s;
        }

        .sparkle-2 {
            bottom: 15%;
            left: 5%;
            animation-delay: 0.5s;
        }

        .sparkle-2 svg {
            width: 16px;
            height: 16px;
        }

        .sparkle-3 {
            top: 20%;
            left: 0%;
            animation-delay: 1s;
        }

        .sparkle-3 svg {
            width: 12px;
            height: 12px;
        }

        .sparkle-4 {
            bottom: 5%;
            right: 5%;
            animation-delay: 1.5s;
        }

        .sparkle-4 svg {
            width: 14px;
            height: 14px;
        }

        @keyframes sparkle-float {
            0%, 100% {
                transform: translateY(0) scale(1) rotate(0deg);
                opacity: 0.6;
            }
            50% {
                transform: translateY(-10px) scale(1.2) rotate(180deg);
                opacity: 1;
            }
        }

        /* AI Cursor animation */
        .ai-cursor {
            position: absolute;
            top: 10%;
            right: -10%;
            z-index: 30;
            animation: cursor-move 4s ease-in-out infinite;
        }

        .ai-cursor svg {
            filter: drop-shadow(0 4px 6px rgba(217, 119, 87, 0.3));
        }

        @keyframes cursor-move {
            0%, 100% {
                transform: translate(0, 0) rotate(-5deg);
                opacity: 0.8;
            }
            25% {
                transform: translate(-20px, 30px) rotate(5deg);
                opacity: 1;
            }
            50% {
                transform: translate(-40px, 10px) rotate(-3deg);
                opacity: 0.9;
            }
            75% {
                transform: translate(-10px, 40px) rotate(8deg);
                opacity: 1;
            }
        }

        /* Profile glow effect */
        .profile-glow {
            box-shadow: 
                0 0 40px rgba(217, 119, 87, 0.15),
                0 0 80px rgba(217, 119, 87, 0.1),
                0 25px 50px rgba(0, 0, 0, 0.15);
            animation: profile-pulse 4s ease-in-out infinite;
        }

        @keyframes profile-pulse {
            0%, 100% {
                box-shadow: 
                    0 0 40px rgba(217, 119, 87, 0.15),
                    0 0 80px rgba(217, 119, 87, 0.1),
                    0 25px 50px rgba(0, 0, 0, 0.15);
            }
            50% {
                box-shadow: 
                    0 0 60px rgba(217, 119, 87, 0.25),
                    0 0 100px rgba(217, 119, 87, 0.15),
                    0 25px 50px rgba(0, 0, 0, 0.2);
            }
        }

        /* Additional sparkle burst on hover */
        .starburst-container:hover .starburst-line {
            animation-duration: 1s;
        }
    </style>
@endsection
