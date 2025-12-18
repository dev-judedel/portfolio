@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
    <!-- About Hero Section - Aligned with Homepage -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Profile Image/Visual -->
                <div class="relative opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="relative w-full max-w-lg mx-auto aspect-square">
                        <!-- Orbital rings -->
                        <div class="absolute inset-0 border border-white/5 rounded-full animate-spin-slow"></div>
                        <div class="absolute inset-12 border border-white/8 rounded-full animate-spin-reverse"></div>
                        <div class="absolute inset-24 border border-white/6 rounded-full animate-spin-slow" style="animation-duration: 40s;"></div>
                        
                        <!-- Center profile placeholder -->
                        <div class="absolute inset-32 bg-white/5 rounded-full blur-3xl animate-pulse-slow"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-user-circle text-9xl text-white/20"></i>
                        </div>
                        
                        <!-- Floating dots -->
                        <div class="absolute top-0 left-1/2 w-2 h-2 bg-white/30 rounded-full animate-orbit"></div>
                        <div class="absolute top-1/4 right-0 w-1.5 h-1.5 bg-white/20 rounded-full animate-orbit-reverse" style="animation-delay: 2s;"></div>
                        <div class="absolute bottom-1/4 left-0 w-1.5 h-1.5 bg-white/20 rounded-full animate-orbit" style="animation-delay: 4s;"></div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-8 opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="space-y-2">
                        <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">About Me</p>
                        <div class="w-12 h-px bg-white/20"></div>
                    </div>
                    
                    @if($profile)
                    <h1 class="text-5xl md:text-6xl font-extralight text-white tracking-tight">
                        {{ $profile->full_name }}
                    </h1>
                    
                    <h2 class="text-xl md:text-2xl text-white/60 font-light tracking-wide">
                        {{ $profile->title }}
                    </h2>
                    
                    <div class="text-base text-white/45 font-light leading-relaxed space-y-4">
                        {!! nl2br(e($profile->bio)) !!}
                    </div>

                    @if($profile->cv_file)
                    <div class="pt-6">
                        <a href="{{ route('download.cv') }}" class="group relative inline-flex items-center px-8 py-3.5 overflow-hidden">
                            <div class="absolute inset-0 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg transition-all duration-500 group-hover:bg-white/10 group-hover:border-white/30"></div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                            </div>
                            <span class="relative flex items-center justify-center gap-2 text-white font-light">
                                <i class="fas fa-download text-sm"></i>
                                <span>Download CV</span>
                            </span>
                        </a>
                    </div>
                    @endif

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8">
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
            </div>
        </div>
    </section>

    <!-- Skills Section - Ultra Clean -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Technologies</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Skills & Tools</h2>
                <p class="text-white/40 font-light text-sm">Technologies I work with</p>
            </div>

            <!-- Skills Grid by Category -->
            <div class="space-y-16">
                <!-- Frontend -->
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light mb-6 text-center">Frontend</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-html5 text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">HTML5</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-css3-alt text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">CSS3</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-js text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">JavaScript</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-wind text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">Tailwind CSS</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light mb-6 text-center">Backend</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-python text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">Python</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-php text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">PHP</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-server text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">REST API</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database -->
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light mb-6 text-center">Database</h3>
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-database text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">MySQL</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-database text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">PostgreSQL</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tools -->
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light mb-6 text-center">Tools</h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fab fa-git-alt text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">Git</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-robot text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">ChatGPT</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-brain text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">Claude</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-server text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">Hostinger</h4>
                            </div>
                        </div>
                        <div class="group text-center p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500">
                            <div class="space-y-4">
                                <i class="fas fa-code text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                                <h4 class="font-light text-white/60 group-hover:text-white/90 transition-colors text-xs uppercase tracking-wider">VS Code</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Experience Section - Minimalist Timeline -->
    <section class="py-32 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Experience</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Work History</h2>
            </div>

            <!-- Timeline -->
            <div class="relative space-y-12">
                <!-- Timeline Line -->
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-white/10 transform md:-translate-x-1/2"></div>

                <!-- Experience Item 1 -->
                <div class="relative opacity-0 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block text-[10px] uppercase tracking-[0.2em] text-white/40 font-light mb-2">August 2025 - Present</span>
                            <h3 class="text-xl font-light text-white mb-2">IT Supervisor</h3>
                            <p class="text-white/50 text-sm font-light">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-0 md:left-1/2 w-3 h-3 bg-white/30 border-4 border-[#010101] rounded-full transform md:-translate-x-1/2"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-white/40 font-light text-sm leading-relaxed">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 2 -->
                <div class="relative opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block text-[10px] uppercase tracking-[0.2em] text-white/40 font-light mb-2">Jan 2021 - August 2025</span>
                            <h3 class="text-xl font-light text-white mb-2">Lead Software Developer</h3>
                            <p class="text-white/50 text-sm font-light">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-0 md:left-1/2 w-3 h-3 bg-white/30 border-4 border-[#010101] rounded-full transform md:-translate-x-1/2"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-white/40 font-light text-sm leading-relaxed">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Item 3 -->
                <div class="relative opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-12">
                            <span class="inline-block text-[10px] uppercase tracking-[0.2em] text-white/40 font-light mb-2">April 2017 - Dec 2020</span>
                            <h3 class="text-xl font-light text-white mb-2">Software Developer</h3>
                            <p class="text-white/50 text-sm font-light">Asian Land Strategies Corporation</p>
                        </div>
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-0 md:left-1/2 w-3 h-3 bg-white/30 border-4 border-[#010101] rounded-full transform md:-translate-x-1/2"></div>
                        
                        <div class="md:w-1/2 md:pl-12 pl-8">
                            <p class="text-white/40 font-light text-sm leading-relaxed">Development python software, web development ERP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Interested in<br>Working Together?
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Let's discuss how I can help bring your project to life.
                </p>
            </div>
            
            <a href="{{ route('contact.index') }}" 
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">Get in Touch</span>
                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </section>

    <!-- Custom Animations (matching homepage) -->
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
        
        .animate-shimmer {
            animation: shimmer 2s ease-in-out;
        }
    </style>
@endsection
