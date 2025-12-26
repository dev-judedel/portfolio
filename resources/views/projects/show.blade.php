@extends('layouts.app')

@section('title', $project->title . ' - Projects')

@section('content')
    <!-- Project Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-20 w-72 h-72 bg-[var(--accent-primary)]/10 rounded-full blur-3xl float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-[var(--accent-secondary)]/10 rounded-full blur-3xl float" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <!-- Back Link -->
                <div class="reveal-text reveal-1">
                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex items-center gap-2 text-[var(--page-text-muted)] hover:text-[var(--page-text)] text-sm font-medium transition-colors">
                        <i class="fas fa-arrow-left text-xs"></i>
                        <span>Back to Projects</span>
                    </a>
                </div>

                <!-- Category Badge -->
                <div class="reveal-text reveal-2">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--accent-primary)]/10 rounded-full text-sm font-medium text-[var(--accent-primary)]">
                        {{ $project->category }}
                    </span>
                </div>
                
                <!-- Project Title -->
                <h1 class="font-display text-5xl md:text-7xl text-[var(--page-text)] reveal-text reveal-3">
                    {{ $project->title }}
                </h1>
                
                <!-- Project Description -->
                <p class="text-lg text-[var(--page-text-muted)] font-body leading-relaxed max-w-2xl mx-auto reveal-text reveal-4">
                    {{ $project->description }}
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-center gap-4 pt-6 reveal-text reveal-5">
                    @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" class="btn-primary">
                        <i class="fas fa-external-link-alt text-sm"></i>
                        <span>View Live Demo</span>
                    </a>
                    @endif
                    
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="btn-secondary">
                        <i class="fab fa-github text-sm"></i>
                        <span>View on GitHub</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Featured Image -->
    @if($project->featured_image)
    <section class="py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card-modern overflow-hidden fade-in-up">
                <img src="{{ asset('storage/' . $project->featured_image) }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-auto object-cover">
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
                    <div class="space-y-6 fade-in-up">
                        <div class="flex items-center gap-4">
                            <div class="section-divider"></div>
                            <h2 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Overview</h2>
                        </div>
                        
                        <div class="text-[var(--page-text-muted)] font-body leading-relaxed text-lg">
                            {!! nl2br(e($project->long_description ?? $project->description)) !!}
                        </div>
                    </div>

                    <!-- Key Features -->
                    @if($project->features && count($project->features) > 0)
                    <div class="space-y-6 fade-in-up" style="animation-delay: 0.1s;">
                        <div class="flex items-center gap-4">
                            <div class="section-divider"></div>
                            <h2 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Key Features</h2>
                        </div>
                        
                        <ul class="space-y-4">
                            @foreach($project->features as $feature)
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-[var(--accent-primary)]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-check text-[var(--accent-primary)] text-xs"></i>
                                </div>
                                <span class="text-[var(--page-text-muted)] font-body">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Project Gallery -->
                    @if($project->images && $project->images->count() > 0)
                    <div class="space-y-6 fade-in-up" style="animation-delay: 0.2s;">
                        <div class="flex items-center gap-4">
                            <div class="section-divider"></div>
                            <h2 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Gallery</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($project->images as $image)
                            <div class="card-modern overflow-hidden group cursor-pointer">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     alt="{{ $image->caption ?? $project->title }}" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-6">
                    
                    <!-- Project Info Card -->
                    <div class="card-modern p-8 space-y-6 fade-in-up" style="animation-delay: 0.1s;">
                        <h3 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Project Info</h3>
                        
                        <div class="space-y-5">
                            <!-- Client -->
                            @if($project->client_name)
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[var(--page-text-light)] font-medium mb-1">Client</p>
                                <p class="text-[var(--page-text)] font-body">{{ $project->client_name }}</p>
                            </div>
                            @endif
                            
                            <!-- Date -->
                            @if($project->completion_date)
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[var(--page-text-light)] font-medium mb-1">Completed</p>
                                <p class="text-[var(--page-text)] font-body">{{ \Carbon\Carbon::parse($project->completion_date)->format('F Y') }}</p>
                            </div>
                            @endif
                            
                            <!-- Duration -->
                            @if($project->duration)
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[var(--page-text-light)] font-medium mb-1">Duration</p>
                                <p class="text-[var(--page-text)] font-body">{{ $project->duration }}</p>
                            </div>
                            @endif
                            
                            <!-- Category -->
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[var(--page-text-light)] font-medium mb-1">Category</p>
                                <p class="text-[var(--page-text)] font-body">{{ $project->category }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    @if($project->tech_stack && count($project->tech_stack) > 0)
                    <div class="card-modern p-8 space-y-6 fade-in-up" style="animation-delay: 0.2s;">
                        <h3 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Technologies</h3>
                        
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tech_stack as $tech)
                            <span class="px-3 py-1.5 bg-[var(--page-text)]/5 text-[var(--page-text-muted)] text-xs rounded-lg font-medium">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share Project -->
                    <div class="card-modern p-8 space-y-6 fade-in-up" style="animation-delay: 0.3s;">
                        <h3 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Share Project</h3>
                        
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('projects.show', $project->slug)) }}&text={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center p-3 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-lg transition-all duration-300 group">
                                <i class="fab fa-twitter text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('projects.show', $project->slug)) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center p-3 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-lg transition-all duration-300 group">
                                <i class="fab fa-facebook-f text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('projects.show', $project->slug)) }}&title={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="flex-1 flex items-center justify-center p-3 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-lg transition-all duration-300 group">
                                <i class="fab fa-linkedin-in text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects && $relatedProjects->count() > 0)
    <section class="py-32 relative bg-[var(--page-bg-secondary)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">More Work</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] fade-in-up" style="animation-delay: 0.1s;">Related Projects</h2>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedProjects as $index => $relatedProject)
                    <div class="group card-modern overflow-hidden fade-in-up" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                        <a href="{{ route('projects.show', $relatedProject->slug) }}" class="block">
                            <div class="relative overflow-hidden aspect-[4/3]">
                                @if($relatedProject->featured_image)
                                    <img src="{{ asset('storage/' . $relatedProject->featured_image) }}" 
                                         alt="{{ $relatedProject->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[var(--accent-primary)]/10 to-[var(--accent-secondary)]/10">
                                        <i class="fas fa-image text-5xl text-[var(--page-text)]/10"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6 space-y-2">
                                <span class="text-xs font-medium text-[var(--accent-primary)] uppercase tracking-wider">{{ $relatedProject->category }}</span>
                                <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] group-hover:text-[var(--accent-primary)] transition-colors">
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
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-[var(--page-text)]"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--accent-primary)]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--accent-secondary)]/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-display text-4xl md:text-6xl text-white leading-tight fade-in-up">
                    Like What<br>
                    <span class="text-[var(--accent-primary)]">You See?</span>
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.1s;">
                    Let's discuss how I can help with your next project.
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
@endsection
