@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
    <!-- Hero Section - Ultra-Minimalist Constellation Theme -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Text Content -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Greeting with fade-in effect -->
                    <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                        <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Welcome</p>
                        <div class="w-12 h-px bg-white/20"></div>
                    </div>
                    
                    <h1 class="opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                        <span class="block text-5xl md:text-7xl font-extralight mb-4 text-white/50">
                            Hello, I'm
                        </span>
                        <span class="block text-5xl md:text-7xl font-light text-white tracking-tight">
                            {{ $profile->full_name ?? 'Developer' }}
                        </span>
                    </h1>
                    
                    <h2 class="text-xl md:text-2xl text-white/60 font-light tracking-wide opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
                        {{ $profile->title ?? 'Full-Stack Developer' }}
                    </h2>
                    
                    <p class="text-base text-white/45 max-w-xl font-light leading-relaxed opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
                        {{ $profile->short_bio ?? 'Crafting elegant digital experiences through clean code and thoughtful design.' }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-6 opacity-0 animate-fade-in" style="animation-delay: 1s;">
                        <a href="{{ route('projects.index') }}" class="group relative px-8 py-3.5 overflow-hidden">
                            <div class="absolute inset-0 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg transition-all duration-500 group-hover:bg-white/10 group-hover:border-white/30"></div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                            </div>
                            <span class="relative flex items-center justify-center gap-2 text-white font-light">
                                <i class="fas fa-briefcase text-sm"></i>
                                <span>View Work</span>
                            </span>
                        </a>
                        
                        <a href="{{ route('contact.index') }}" class="group relative px-8 py-3.5 overflow-hidden">
                            <div class="absolute inset-0 border border-white/15 rounded-lg transition-all duration-500 group-hover:border-white/30 group-hover:bg-white/5"></div>
                            <span class="relative flex items-center justify-center gap-2 text-white/70 group-hover:text-white font-light transition-colors">
                                <i class="fas fa-envelope text-sm"></i>
                                <span>Get in Touch</span>
                            </span>
                        </a>
                    </div>

                    <!-- Stats - Ultra Minimal -->
                    @if($profile)
                    <div class="grid grid-cols-3 gap-8 pt-12 opacity-0 animate-fade-in" style="animation-delay: 1.2s;">
                        <div class="text-center space-y-2">
                            <div class="text-4xl font-extralight text-white/90">{{ $profile->years_experience }}<span class="text-white/40">+</span></div>
                            <div class="text-[10px] text-white/40 uppercase tracking-[0.2em] font-light">Years</div>
                        </div>
                        <div class="text-center space-y-2 border-x border-white/10">
                            <div class="text-4xl font-extralight text-white/90">{{ $profile->projects_completed }}<span class="text-white/40">+</span></div>
                            <div class="text-[10px] text-white/40 uppercase tracking-[0.2em] font-light">Projects</div>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="text-4xl font-extralight text-white/90">{{ $profile->happy_clients }}<span class="text-white/40">+</span></div>
                            <div class="text-[10px] text-white/40 uppercase tracking-[0.2em] font-light">Clients</div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Profile Image with Orbital Animation -->
                <div class="relative hidden lg:flex items-center justify-center opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
                    <div class="relative w-full max-w-lg aspect-square">
                        <canvas
                            id="particle-canvas"
                            class="absolute inset-0 pointer-events-none rounded-full opacity-80 z-0"
                            style="mix-blend-mode: screen;"
                        ></canvas>

                        <!-- Outer ring -->
                        <div class="absolute inset-0 border border-white/5 rounded-full animate-spin-slow z-10"></div>

                        <!-- Middle rings -->
                        <div class="absolute inset-12 border border-white/8 rounded-full animate-spin-reverse z-10"></div>
                        <div class="absolute inset-24 border border-white/6 rounded-full animate-spin-slow z-10" style="animation-duration: 40s;"></div>

                        <!-- Inner glow -->
                        <div class="absolute inset-32 bg-white/5 rounded-full blur-3xl animate-pulse-slow z-10"></div>

                        <!-- Profile Image -->
                        <div class="absolute inset-0 flex items-center justify-center z-20">
                            <div class="relative group">
                                @if($profile && $profile->profile_image)
                                    <div class="relative w-64 h-64 rounded-full overflow-hidden border-4 border-white/10 group-hover:border-white/30 transition-all duration-500">
                                        <img src="{{ asset('storage/' . $profile->profile_image) }}"
                                             alt="{{ $profile->full_name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                    </div>
                                    <div class="absolute -inset-4 bg-white/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
                                @else
                                    <div class="w-64 h-64 rounded-full bg-white/5 border-4 border-white/10 flex items-center justify-center">
                                        <i class="fas fa-user text-7xl text-white/20"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Floating dots -->
                        <div class="absolute top-0 left-1/2 w-2 h-2 bg-white/30 rounded-full animate-orbit z-10"></div>
                        <div class="absolute top-1/4 right-0 w-1.5 h-1.5 bg-white/20 rounded-full animate-orbit-reverse z-10" style="animation-delay: 2s;"></div>
                        <div class="absolute bottom-1/4 left-0 w-1.5 h-1.5 bg-white/20 rounded-full animate-orbit z-10" style="animation-delay: 4s;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subtle Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 opacity-0 animate-fade-in" style="animation-delay: 1.4s;">
            <div class="flex flex-col items-center gap-2 animate-bounce-slow">
                <span class="text-[10px] text-white/30 uppercase tracking-[0.2em] font-light">Scroll</span>
                <div class="w-px h-12 bg-gradient-to-b from-white/30 via-white/10 to-transparent"></div>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section - Ultra Clean -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Portfolio</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Selected Work</h2>
                <p class="text-white/40 font-light text-sm">Recent projects and collaborations</p>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($featuredProjects as $index => $project)
                    <div class="group project-card opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <!-- Project Image -->
                        <div class="relative overflow-hidden aspect-[4/3] bg-black/20 rounded-lg mb-4">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-white/5">
                                    <i class="fas fa-image text-4xl text-white/10"></i>
                                </div>
                            @endif

                            <!-- Subtle overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <a href="{{ route('projects.show', $project->slug) }}" 
                                       class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm font-light transition-colors">
                                        <span>View Project</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Border effect -->
                            <div class="absolute inset-0 border border-white/10 rounded-lg group-hover:border-white/20 transition-colors duration-500"></div>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="space-y-3">
                            <span class="text-[10px] font-light text-white/30 uppercase tracking-[0.2em]">{{ $project->category }}</span>
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-white/40 text-sm font-light leading-relaxed line-clamp-2">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 pt-2">
                                @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                                    <span class="px-3 py-1 bg-white/5 text-white/50 text-[10px] rounded border border-white/10 font-light uppercase tracking-wider">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <i class="fas fa-folder-open text-white/10 text-5xl mb-4"></i>
                        <p class="text-white/30 font-light">No projects available yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Link -->
            @if($featuredProjects->count() > 0)
            <div class="text-center mt-16">
                <a href="{{ route('projects.index') }}" 
                   class="group inline-flex items-center gap-3 text-white/60 hover:text-white transition-colors font-light">
                    <span class="text-sm">View All Projects</span>
                    <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Skills Section - Grid Layout -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Skills</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Expertise</h2>
                <p class="text-white/40 font-light text-sm">Technologies and tools</p>
            </div>

            <!-- Skills Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($skills as $index => $skill)
                    <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.05 }}s;">
                        <div class="space-y-4">
                            <i class="{{ $skill->icon }} text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                            <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">
                                {{ $skill->name }}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section - Minimalist Cards -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Testimonials</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Client Feedback</h2>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($testimonials as $index => $testimonial)
                    <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/10 transition-all duration-500 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <!-- Rating Stars -->
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-xs {{ $i <= $testimonial->rating ? 'text-white/30' : 'text-white/10' }}"></i>
                            @endfor
                        </div>
                        
                        <!-- Testimonial Text -->
                        <p class="text-white/50 font-light leading-relaxed text-sm min-h-[6rem]">
                            "{{ $testimonial->testimonial }}"
                        </p>
                        
                        <!-- Client Info -->
                        <div class="flex items-center space-x-3 pt-4 border-t border-white/10">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white/40 text-xs font-light border border-white/10">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <h5 class="font-light text-white/80 text-sm">{{ $testimonial->client_name }}</h5>
                                <p class="text-[10px] text-white/30 font-light uppercase tracking-wider">{{ $testimonial->client_position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section - Ultra Minimal -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Let's Create<br>Something Together
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Have a project in mind? Let's discuss how we can work together.
                </p>
            </div>
            
            <a href="{{ route('contact.index') }}" 
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">Start a Conversation</span>
                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </section>

    <!-- Custom Animations -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes spinReverse {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        
        @keyframes orbit {
            from { transform: rotate(0deg) translateX(200px) rotate(0deg); }
            to { transform: rotate(360deg) translateX(200px) rotate(-360deg); }
        }
        
        @keyframes orbitReverse {
            from { transform: rotate(360deg) translateX(150px) rotate(-360deg); }
            to { transform: rotate(0deg) translateX(150px) rotate(0deg); }
        }
        
        @keyframes pulseSlow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }
        
        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-spin-slow {
            animation: spinSlow 60s linear infinite;
        }
        
        .animate-spin-reverse {
            animation: spinReverse 45s linear infinite;
        }
        
        .animate-orbit {
            animation: orbit 20s linear infinite;
        }
        
        .animate-orbit-reverse {
            animation: orbitReverse 25s linear infinite;
        }
        
        .animate-pulse-slow {
            animation: pulseSlow 4s ease-in-out infinite;
        }
        
        .animate-bounce-slow {
            animation: bounceSlow 3s ease-in-out infinite;
        }
        
        .animate-shimmer {
            animation: shimmer 2s ease-in-out;
        }
    </style>
@endsection
