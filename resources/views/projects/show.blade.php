@extends('layouts.app')

@section('title', $project->title . ' - Projects')

@section('content')
    <!-- Project Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <!-- Back Link -->
                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex items-center gap-2 text-white/50 hover:text-white/80 text-sm font-light transition-colors">
                        <i class="fas fa-arrow-left text-xs"></i>
                        <span>Back to Projects</span>
                    </a>
                </div>

                <!-- Category Badge -->
                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <span class="inline-block px-4 py-1.5 bg-white/5 text-white/40 text-[10px] rounded border border-white/10 font-light uppercase tracking-[0.2em]">
                        {{ $project->category }}
                    </span>
                </div>
                
                <!-- Project Title -->
                <h1 class="text-5xl md:text-7xl font-extralight text-white tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                    {{ $project->title }}
                </h1>
                
                <!-- Project Description -->
                <p class="text-lg text-white/45 font-light leading-relaxed max-w-2xl mx-auto opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    {{ $project->description }}
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-center gap-4 pt-6 opacity-0 animate-fade-in" style="animation-delay: 0.5s;">
                    @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" 
                       target="_blank"
                       class="group relative px-8 py-3.5 overflow-hidden">
                        <div class="absolute inset-0 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg transition-all duration-500 group-hover:bg-white/10 group-hover:border-white/30"></div>
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                        </div>
                        <span class="relative flex items-center justify-center gap-2 text-white font-light">
                            <i class="fas fa-external-link-alt text-sm"></i>
                            <span>View Live Demo</span>
                        </span>
                    </a>
                    @endif
                    
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" 
                       target="_blank"
                       class="group relative px-8 py-3.5 overflow-hidden">
                        <div class="absolute inset-0 border border-white/15 rounded-lg transition-all duration-500 group-hover:border-white/30 group-hover:bg-white/5"></div>
                        <span class="relative flex items-center justify-center gap-2 text-white/70 group-hover:text-white font-light transition-colors">
                            <i class="fab fa-github text-sm"></i>
                            <span>View on GitHub</span>
                        </span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Featured Image -->
    @if($project->featured_image)
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-lg overflow-hidden border border-white/10 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                <img src="{{ asset('storage/' . $project->featured_image) }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-auto object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- Project Details -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    
                    <!-- Project Overview -->
                    <div class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-px bg-white/20"></div>
                            <h2 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Overview</h2>
                        </div>
                        
                        <div class="prose prose-invert max-w-none">
                            <p class="text-white/50 font-light leading-relaxed text-base">
                                {!! nl2br(e($project->long_description ?? $project->description)) !!}
                            </p>
                        </div>
                    </div>

                    <!-- Key Features -->
                    @if($project->features && count($project->features) > 0)
                    <div class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-px bg-white/20"></div>
                            <h2 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Key Features</h2>
                        </div>
                        
                        <ul class="space-y-3">
                            @foreach($project->features as $feature)
                            <li class="flex items-start gap-3 text-white/50 font-light">
                                <i class="fas fa-check-circle text-white/30 mt-1 text-sm"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Project Gallery -->
                    @if($project->images && $project->images->count() > 0)
                    <div class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-px bg-white/20"></div>
                            <h2 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Gallery</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($project->images as $image)
                            <div class="relative rounded-lg overflow-hidden border border-white/10 group cursor-pointer">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     alt="{{ $image->caption ?? $project->title }}" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <i class="fas fa-search-plus text-white/80 text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-8">
                    
                    <!-- Project Info Card -->
                    <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s;">
                        <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Project Info</h3>
                        
                        <div class="space-y-4">
                            <!-- Client -->
                            @if($project->client_name)
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-light mb-1">Client</p>
                                <p class="text-white/70 font-light">{{ $project->client_name }}</p>
                            </div>
                            @endif
                            
                            <!-- Date -->
                            @if($project->completion_date)
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-light mb-1">Completed</p>
                                <p class="text-white/70 font-light">{{ \Carbon\Carbon::parse($project->completion_date)->format('F Y') }}</p>
                            </div>
                            @endif
                            
                            <!-- Duration -->
                            @if($project->duration)
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-light mb-1">Duration</p>
                                <p class="text-white/70 font-light">{{ $project->duration }}</p>
                            </div>
                            @endif
                            
                            <!-- Category -->
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-white/30 font-light mb-1">Category</p>
                                <p class="text-white/70 font-light">{{ $project->category }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    @if($project->tech_stack && count($project->tech_stack) > 0)
                    <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                        <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Technologies</h3>
                        
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tech_stack as $tech)
                            <span class="px-3 py-1.5 bg-white/5 text-white/60 text-[10px] rounded border border-white/10 font-light uppercase tracking-wider">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share Project -->
                    <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.7s;">
                        <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Share Project</h3>
                        
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('projects.show', $project->slug)) }}&text={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                <i class="fab fa-twitter text-white/50"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('projects.show', $project->slug)) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                <i class="fab fa-facebook-f text-white/50"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('projects.show', $project->slug)) }}&title={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                <i class="fab fa-linkedin-in text-white/50"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects && $relatedProjects->count() > 0)
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">More Work</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Related Projects</h2>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProjects as $index => $relatedProject)
                    <div class="group opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <a href="{{ route('projects.show', $relatedProject->slug) }}" class="block">
                            <div class="relative overflow-hidden aspect-[4/3] bg-black/20 rounded-lg mb-4">
                                @if($relatedProject->featured_image)
                                    <img src="{{ asset('storage/' . $relatedProject->featured_image) }}" 
                                         alt="{{ $relatedProject->title }}" 
                                         class="w-full h-full object-cover opacity-40 group-hover:opacity-60 group-hover:scale-105 transition-all duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-image text-6xl text-white/10"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 border border-white/10 rounded-lg group-hover:border-white/20 transition-colors duration-500"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <span class="text-[10px] font-light text-white/30 uppercase tracking-[0.2em]">{{ $relatedProject->category }}</span>
                                <h3 class="text-lg font-light text-white/90 group-hover:text-white transition-colors">
                                    {{ $relatedProject->title }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Like What<br>You See?
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Let's discuss how I can help with your next project.
                </p>
            </div>
            
            <a href="{{ route('contact.index') }}" 
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">Get in Touch</span>
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
        
        .animate-shimmer {
            animation: shimmer 2s ease-in-out;
        }
    </style>
@endsection
