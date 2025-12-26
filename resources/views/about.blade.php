@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
    <!-- About Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-20 w-72 h-72 bg-[var(--accent-primary)]/10 rounded-full blur-3xl float"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-[var(--accent-secondary)]/10 rounded-full blur-3xl float" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Profile Image with Starburst -->
                <div class="relative flex items-center justify-center slide-in-left">
                    <div class="relative">
                        <!-- Starburst/Spark Animation -->
                        <div class="about-starburst-container">
                            @for($i = 0; $i < 12; $i++)
                            <div class="about-starburst-line" style="--rotation: {{ $i * 30 }}deg; --delay: {{ $i * 0.1 }}s;"></div>
                            @endfor
                        </div>

                        <!-- Sparkle stars -->
                        <div class="about-sparkle about-sparkle-1">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                        </div>
                        <div class="about-sparkle about-sparkle-2">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                        </div>
                        <div class="about-sparkle about-sparkle-3">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                        </div>

                        <!-- AI Cursor -->
                        <div class="about-cursor">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                <path d="M5.5 3.21V20.8C5.5 21.3 6.1 21.56 6.46 21.21L10.67 17H18.5C19.05 17 19.5 16.55 19.5 16V4C19.5 3.45 19.05 3 18.5 3H6.5C5.95 3 5.5 3.45 5.5 3.21Z" fill="var(--accent-primary)"/>
                            </svg>
                        </div>

                        <!-- Image Container -->
                        <div class="relative w-72 h-72 md:w-96 md:h-96 rounded-2xl overflow-hidden shadow-2xl z-10 about-profile-glow">
                            @if($profile && $profile->profile_image)
                                <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                     alt="{{ $profile->full_name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[var(--accent-primary)]/20 to-[var(--accent-secondary)]/20 flex items-center justify-center">
                                    <i class="fas fa-user-circle text-8xl text-[var(--page-text)]/20"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-8 slide-in-right">
                    <div class="reveal-text reveal-1">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--page-text)]/5 rounded-full text-sm font-medium text-[var(--page-text-muted)]">
                            <i class="fas fa-user text-[var(--accent-primary)]"></i>
                            About Me
                        </span>
                    </div>
                    
                    @if($profile)
                    <h1 class="font-display text-5xl md:text-6xl text-[var(--page-text)] reveal-text reveal-2">
                        {{ $profile->full_name }}
                    </h1>
                    
                    <h2 class="font-heading text-xl md:text-2xl text-[var(--accent-primary)] font-medium reveal-text reveal-3">
                        {{ $profile->title }}
                    </h2>
                    
                    <div class="text-lg text-[var(--page-text-muted)] font-body leading-relaxed space-y-4 reveal-text reveal-4">
                        {!! nl2br(e($profile->bio)) !!}
                    </div>

                    @if($profile->cv_file)
                    <div class="pt-4 reveal-text reveal-5">
                        <a href="{{ route('download.cv') }}" class="btn-primary">
                            <i class="fas fa-download"></i>
                            <span>Download CV</span>
                        </a>
                    </div>
                    @endif

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8 reveal-text reveal-6">
                        <div class="text-center">
                            <div class="font-heading text-4xl font-bold text-[var(--page-text)]">{{ $profile->years_experience }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Years</div>
                        </div>
                        <div class="text-center border-x border-[var(--border-color)]">
                            <div class="font-heading text-4xl font-bold text-[var(--page-text)]">{{ $profile->projects_completed }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Projects</div>
                        </div>
                        <div class="text-center">
                            <div class="font-heading text-4xl font-bold text-[var(--page-text)]">{{ $profile->happy_clients }}<span class="text-[var(--accent-primary)]">+</span></div>
                            <div class="text-sm text-[var(--page-text-muted)] font-medium mt-1">Clients</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-32 relative bg-[var(--page-bg-secondary)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Technologies</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">Skills & Tools</h2>
                <p class="text-[var(--page-text-muted)] font-body text-lg max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.2s;">
                    Technologies I work with to build modern applications.
                </p>
            </div>

            <!-- Skills by Category -->
            <div class="space-y-16">
                <!-- Frontend -->
                <div class="fade-in-up">
                    <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] mb-6 text-center">Frontend Development</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                            $frontendSkills = [
                                ['name' => 'HTML5', 'icon' => 'fab fa-html5'],
                                ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt'],
                                ['name' => 'JavaScript', 'icon' => 'fab fa-js'],
                                ['name' => 'Tailwind CSS', 'icon' => 'fas fa-wind'],
                            ];
                        @endphp
                        @foreach($frontendSkills as $index => $skill)
                        <div class="group card-modern p-6 text-center" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-heading font-medium text-[var(--page-text)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Backend -->
                <div class="fade-in-up" style="animation-delay: 0.2s;">
                    <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] mb-6 text-center">Backend Development</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
                        @php
                            $backendSkills = [
                                ['name' => 'Python', 'icon' => 'fab fa-python'],
                                ['name' => 'PHP', 'icon' => 'fab fa-php'],
                                ['name' => 'REST API', 'icon' => 'fas fa-server'],
                            ];
                        @endphp
                        @foreach($backendSkills as $index => $skill)
                        <div class="group card-modern p-6 text-center">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-heading font-medium text-[var(--page-text)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Database -->
                <div class="fade-in-up" style="animation-delay: 0.3s;">
                    <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] mb-6 text-center">Database</h3>
                    <div class="grid grid-cols-2 gap-4 max-w-xl mx-auto">
                        @php
                            $dbSkills = [
                                ['name' => 'MySQL', 'icon' => 'fas fa-database'],
                                ['name' => 'PostgreSQL', 'icon' => 'fas fa-database'],
                            ];
                        @endphp
                        @foreach($dbSkills as $skill)
                        <div class="group card-modern p-6 text-center">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-heading font-medium text-[var(--page-text)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tools -->
                <div class="fade-in-up" style="animation-delay: 0.4s;">
                    <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] mb-6 text-center">Tools & Platforms</h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        @php
                            $tools = [
                                ['name' => 'Git', 'icon' => 'fab fa-git-alt'],
                                ['name' => 'ChatGPT', 'icon' => 'fas fa-robot'],
                                ['name' => 'Claude', 'icon' => 'fas fa-brain'],
                                ['name' => 'Hostinger', 'icon' => 'fas fa-server'],
                                ['name' => 'VS Code', 'icon' => 'fas fa-code'],
                            ];
                        @endphp
                        @foreach($tools as $skill)
                        <div class="group card-modern p-6 text-center">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-heading font-medium text-[var(--page-text)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Experience Section -->
    <section class="py-32 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Experience</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] fade-in-up" style="animation-delay: 0.1s;">Work History</h2>
            </div>

            <!-- Timeline -->
            <div class="relative space-y-12">
                <!-- Timeline Line -->
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-0.5 bg-[var(--border-color)] transform md:-translate-x-1/2"></div>

                <!-- Experience Item 1 -->
                <div class="relative fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--accent-primary)]/10 text-[var(--accent-primary)] text-xs font-medium rounded-full mb-2">August 2025 - Present</span>
                            <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] mb-2">IT Supervisor</h3>
                            <p class="text-[var(--page-text-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--page-text)] rounded-full transform md:-translate-x-1/2 border-4 border-[var(--page-bg)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--page-text-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 2 -->
                <div class="relative fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--page-text)]/5 text-[var(--page-text-muted)] text-xs font-medium rounded-full mb-2">Jan 2021 - August 2025</span>
                            <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] mb-2">Lead Software Developer</h3>
                            <p class="text-[var(--page-text-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--page-text-muted)] rounded-full transform md:-translate-x-1/2 border-4 border-[var(--page-bg)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--page-text-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 3 -->
                <div class="relative fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--page-text)]/5 text-[var(--page-text-muted)] text-xs font-medium rounded-full mb-2">April 2017 - Dec 2020</span>
                            <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] mb-2">Software Developer</h3>
                            <p class="text-[var(--page-text-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--page-text-muted)] rounded-full transform md:-translate-x-1/2 border-4 border-[var(--page-bg)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--page-text-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-[var(--page-text)]"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--accent-primary)]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--accent-secondary)]/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-display text-4xl md:text-6xl text-white leading-tight fade-in-up">
                    Interested in<br>
                    <span class="text-[var(--accent-primary)]">Working Together?</span>
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.1s;">
                    Let's discuss how I can help bring your project to life.
                </p>
                
                <div class="pt-4 fade-in-up" style="animation-delay: 0.2s;">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[var(--page-text)] rounded-lg font-heading font-semibold hover:bg-[var(--accent-primary)] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Get in Touch</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Starburst Animations for About Page -->
    <style>
        /* About page starburst container */
        .about-starburst-container {
            width: 450px;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Individual starburst lines */
        .about-starburst-line {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 3px;
            height: 70px;
            background: linear-gradient(to top, transparent, var(--accent-primary), transparent);
            transform-origin: center bottom;
            transform: translate(-50%, -100%) rotate(var(--rotation));
            animation: about-starburst-pulse 2.5s ease-in-out infinite;
            animation-delay: var(--delay);
            opacity: 0.5;
            border-radius: 2px;
        }

        @keyframes about-starburst-pulse {
            0%, 100% {
                height: 50px;
                opacity: 0.3;
            }
            50% {
                height: 90px;
                opacity: 0.7;
            }
        }

        /* Sparkle stars */
        .about-sparkle {
            position: absolute;
            color: var(--accent-primary);
            animation: about-sparkle-float 3s ease-in-out infinite;
            z-index: 20;
        }

        .about-sparkle svg {
            width: 18px;
            height: 18px;
        }

        .about-sparkle-1 {
            top: 0;
            right: 10%;
            animation-delay: 0s;
        }

        .about-sparkle-2 {
            bottom: 10%;
            left: 0;
            animation-delay: 0.7s;
        }

        .about-sparkle-2 svg {
            width: 14px;
            height: 14px;
        }

        .about-sparkle-3 {
            top: 30%;
            left: -5%;
            animation-delay: 1.2s;
        }

        .about-sparkle-3 svg {
            width: 12px;
            height: 12px;
        }

        @keyframes about-sparkle-float {
            0%, 100% {
                transform: translateY(0) scale(1) rotate(0deg);
                opacity: 0.5;
            }
            50% {
                transform: translateY(-8px) scale(1.15) rotate(180deg);
                opacity: 1;
            }
        }

        /* AI Cursor */
        .about-cursor {
            position: absolute;
            top: 5%;
            right: -5%;
            z-index: 30;
            animation: about-cursor-move 5s ease-in-out infinite;
        }

        .about-cursor svg {
            filter: drop-shadow(0 4px 8px rgba(217, 119, 87, 0.4));
        }

        @keyframes about-cursor-move {
            0%, 100% {
                transform: translate(0, 0) rotate(-8deg);
                opacity: 0.7;
            }
            33% {
                transform: translate(-15px, 25px) rotate(5deg);
                opacity: 1;
            }
            66% {
                transform: translate(-25px, 10px) rotate(-3deg);
                opacity: 0.85;
            }
        }

        /* Profile glow */
        .about-profile-glow {
            box-shadow: 
                0 0 30px rgba(217, 119, 87, 0.12),
                0 0 60px rgba(217, 119, 87, 0.08),
                0 20px 40px rgba(0, 0, 0, 0.12);
            animation: about-profile-pulse 4s ease-in-out infinite;
        }

        @keyframes about-profile-pulse {
            0%, 100% {
                box-shadow: 
                    0 0 30px rgba(217, 119, 87, 0.12),
                    0 0 60px rgba(217, 119, 87, 0.08),
                    0 20px 40px rgba(0, 0, 0, 0.12);
            }
            50% {
                box-shadow: 
                    0 0 50px rgba(217, 119, 87, 0.2),
                    0 0 80px rgba(217, 119, 87, 0.12),
                    0 20px 40px rgba(0, 0, 0, 0.15);
            }
        }
    </style>
@endsection
