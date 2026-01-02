@extends('layouts.app')

@section('title', 'About - JUDE')

@section('content')
    <!-- About Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Profile Image with Starburst -->
                <div class="relative flex items-center justify-center hero-animate hero-animate-1">
                    <div class="relative profile-wrapper">
                        <!-- Starburst Animation -->
                        <div class="about-starburst-container">
                            @for($i = 0; $i < 12; $i++)
                            <div class="about-starburst-line" style="--rotation: {{ $i * 30 }}deg; --delay: {{ 0.6 + ($i * 0.08) }}s;"></div>
                            @endfor
                        </div>

                        <!-- Sparkles -->
                        <div class="about-sparkle about-sparkle-1">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                        </div>
                        <div class="about-sparkle about-sparkle-2">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
                        </div>

                        <!-- Image Container -->
                        <div class="relative w-72 h-72 md:w-96 md:h-96 rounded-2xl overflow-hidden shadow-2xl z-10 about-profile-image about-profile-glow">
                            @if($profile && $profile->profile_image)
                                <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                     alt="{{ $profile->full_name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-[var(--color-navy)]/10 flex items-center justify-center">
                                    <i class="fas fa-user-circle text-8xl text-[var(--color-navy)]/30"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-8">
                    <div class="hero-animate hero-animate-2">
                        <span class="section-label">About Me</span>
                    </div>
                    
                    @if($profile)
                    <h1 class="font-heading text-5xl md:text-6xl text-[var(--color-navy)] hero-animate hero-animate-3">
                        {{ strtoupper($profile->full_name) }}
                    </h1>
                    
                    <h2 class="font-heading text-2xl md:text-3xl text-[var(--color-navy)]/70 hero-animate hero-animate-4">
                        {{ strtoupper($profile->title) }}
                    </h2>
                    
                    <div class="text-lg text-[var(--body-color-muted)] font-body leading-relaxed space-y-4 hero-animate hero-animate-5">
                        {!! nl2br(e($profile->bio)) !!}
                    </div>

                    @if($profile->cv_file)
                    <div class="pt-4 hero-animate hero-animate-6">
                        <a href="{{ route('download.cv') }}" class="btn-primary">
                            <i class="fas fa-download"></i>
                            <span>Download CV</span>
                        </a>
                    </div>
                    @endif

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8 hero-animate hero-animate-7">
                        <div class="text-center">
                            <div class="font-heading text-4xl text-[var(--color-navy)]">{{ $profile->years_experience }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Years</div>
                        </div>
                        <div class="text-center border-x border-[var(--border-color)]">
                            <div class="font-heading text-4xl text-[var(--color-navy)]">{{ $profile->projects_completed }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Projects</div>
                        </div>
                        <div class="text-center">
                            <div class="font-heading text-4xl text-[var(--color-navy)]">{{ $profile->happy_clients }}+</div>
                            <div class="text-sm text-[var(--body-color-muted)] font-medium mt-1">Clients</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-24 md:py-32 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <span class="section-label scroll-animate">Technologies</span>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[var(--color-navy)] mt-4 mb-6 scroll-animate stagger-1">SKILLS & TOOLS</h2>
                <p class="text-[var(--body-color-muted)] font-body text-lg max-w-2xl mx-auto scroll-animate stagger-2">
                    Technologies I work with to build modern applications.
                </p>
            </div>

            <!-- Skills by Category -->
            <div class="space-y-16">
                <!-- Frontend -->
                <div class="scroll-animate">
                    <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6 text-center">FRONTEND DEVELOPMENT</h3>
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
                        <div class="group card-modern p-6 text-center scroll-animate-scale" style="transition-delay: {{ $index * 0.1 }}s;">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--color-navy)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-body font-semibold text-[var(--body-color)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Backend -->
                <div class="scroll-animate stagger-1">
                    <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6 text-center">BACKEND DEVELOPMENT</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
                        @php
                            $backendSkills = [
                                ['name' => 'Python', 'icon' => 'fab fa-python'],
                                ['name' => 'PHP', 'icon' => 'fab fa-php'],
                                ['name' => 'REST API', 'icon' => 'fas fa-server'],
                            ];
                        @endphp
                        @foreach($backendSkills as $index => $skill)
                        <div class="group card-modern p-6 text-center scroll-animate-scale" style="transition-delay: {{ 0.1 + ($index * 0.1) }}s;">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--color-navy)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-body font-semibold text-[var(--body-color)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tools -->
                <div class="scroll-animate stagger-2">
                    <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6 text-center">TOOLS & PLATFORMS</h3>
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
                        @foreach($tools as $index => $skill)
                        <div class="group card-modern p-6 text-center scroll-animate-scale" style="transition-delay: {{ 0.2 + ($index * 0.1) }}s;">
                            <div class="w-14 h-14 mx-auto rounded-xl bg-[var(--color-navy)]/5 flex items-center justify-center mb-4 group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                                <i class="{{ $skill['icon'] }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h4 class="font-body font-semibold text-[var(--body-color)]">{{ $skill['name'] }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Experience Section -->
    <section class="py-24 md:py-32 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <span class="section-label scroll-animate">Experience</span>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[var(--color-navy)] scroll-animate stagger-1">WORK HISTORY</h2>
            </div>

            <!-- Timeline -->
            <div class="relative space-y-12">
                <!-- Timeline Line -->
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-0.5 bg-[var(--color-navy)]/20 transform md:-translate-x-1/2"></div>

                <!-- Experience Item 1 -->
                <div class="relative scroll-animate">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--color-navy)]/10 text-[var(--color-navy)] text-xs font-semibold rounded-full mb-2">August 2025 - Present</span>
                            <h3 class="font-heading text-xl text-[var(--color-navy)] mb-2">IT SUPERVISOR</h3>
                            <p class="text-[var(--body-color-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--color-navy)] rounded-full transform md:-translate-x-1/2 border-4 border-[var(--color-beige)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--body-color-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 2 -->
                <div class="relative scroll-animate stagger-1">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--color-navy)]/5 text-[var(--body-color-muted)] text-xs font-semibold rounded-full mb-2">Jan 2021 - August 2025</span>
                            <h3 class="font-heading text-xl text-[var(--color-navy)] mb-2">LEAD SOFTWARE DEVELOPER</h3>
                            <p class="text-[var(--body-color-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--color-navy)]/50 rounded-full transform md:-translate-x-1/2 border-4 border-[var(--color-beige)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--body-color-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 3 -->
                <div class="relative scroll-animate stagger-2">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block px-3 py-1 bg-[var(--color-navy)]/5 text-[var(--body-color-muted)] text-xs font-semibold rounded-full mb-2">April 2017 - Dec 2020</span>
                            <h3 class="font-heading text-xl text-[var(--color-navy)] mb-2">SOFTWARE DEVELOPER</h3>
                            <p class="text-[var(--body-color-muted)] font-medium">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-[var(--color-navy)]/30 rounded-full transform md:-translate-x-1/2 border-4 border-[var(--color-beige)]"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-[var(--body-color-muted)] font-body">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 md:py-32 relative overflow-hidden" style="background-color: #1B365D;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl leading-tight scroll-animate" style="color: #FFFFFF;">
                    INTERESTED IN<br>
                    <span style="color: #FFFFFF;">WORKING TOGETHER?</span>
                </h2>
                <p class="text-xl font-body max-w-2xl mx-auto scroll-animate stagger-1" style="color: #FFFFFF;">
                    Let's discuss how I can help bring your project to life.
                </p>
                
                <div class="pt-4 scroll-animate stagger-2">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[#1B365D] rounded-lg font-body font-semibold hover:bg-[#F5F0E8] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Get in Touch</span>
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
        .hero-animate-3.loaded { animation-delay: 0.3s; }
        .hero-animate-4.loaded { animation-delay: 0.4s; }
        .hero-animate-5.loaded { animation-delay: 0.5s; }
        .hero-animate-6.loaded { animation-delay: 0.6s; }
        .hero-animate-7.loaded { animation-delay: 0.7s; }

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
            right: 10%;
            width: 300px;
            height: 300px;
            background: var(--color-navy);
        }

        .hero-orb-2 {
            bottom: 10%;
            left: 10%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
            animation-delay: 0.3s;
        }

        @keyframes orbFadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 0.05; transform: scale(1); }
        }

        /* About starburst */
        .about-starburst-container {
            width: 450px;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .about-starburst-line {
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

        .about-starburst-line.animate {
            animation: aboutStarburstGrow 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            animation-delay: var(--delay);
        }

        @keyframes aboutStarburstGrow {
            from { height: 0; opacity: 0; }
            to { height: 70px; opacity: 0.3; }
        }

        /* About sparkles */
        .about-sparkle {
            position: absolute;
            color: var(--color-navy);
            opacity: 0;
            transform: scale(0);
            z-index: 20;
        }

        .about-sparkle.animate {
            animation: aboutSparkleAppear 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .about-sparkle svg { width: 18px; height: 18px; }
        .about-sparkle-1 { top: 0; right: 10%; animation-delay: 0.8s; }
        .about-sparkle-2 { bottom: 10%; left: 0; animation-delay: 1s; }
        .about-sparkle-2 svg { width: 14px; height: 14px; }

        @keyframes aboutSparkleAppear {
            0% { opacity: 0; transform: scale(0) rotate(0deg); }
            50% { opacity: 1; transform: scale(1.3) rotate(180deg); }
            100% { opacity: 0.5; transform: scale(1) rotate(360deg); }
        }

        /* About profile image */
        .about-profile-image {
            opacity: 0;
            transform: scale(0.8);
        }

        .about-profile-image.animate {
            animation: aboutProfileScale 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
        }

        @keyframes aboutProfileScale {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .about-profile-glow {
            box-shadow: 0 20px 40px rgba(27, 54, 93, 0.12);
        }

        .about-profile-glow.animate {
            animation: aboutGlowAppear 1s ease 0.6s forwards;
        }

        @keyframes aboutGlowAppear {
            from { box-shadow: 0 20px 40px rgba(27, 54, 93, 0.12); }
            to { box-shadow: 0 0 50px rgba(27, 54, 93, 0.1), 0 20px 40px rgba(27, 54, 93, 0.15); }
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
                document.querySelector('.about-profile-image')?.classList.add('animate');
                document.querySelectorAll('.about-starburst-line').forEach(el => el.classList.add('animate'));
                document.querySelectorAll('.about-sparkle').forEach(el => el.classList.add('animate'));
                document.querySelector('.about-profile-glow')?.classList.add('animate');
            }, 200);
        });
    </script>
@endsection
