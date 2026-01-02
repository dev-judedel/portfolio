@extends('layouts.app')

@section('title', $project->title . ' - JUDE')

@section('content')
    <!-- Project Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-10">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <!-- Back Link -->
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-[var(--body-color-muted)] hover:text-[var(--color-navy)] transition-colors mb-8 hero-animate hero-animate-1">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Projects</span>
            </a>

            <div class="max-w-4xl">
                <span class="inline-block px-4 py-2 bg-[var(--color-navy)]/10 text-[var(--color-navy)] text-sm font-semibold rounded-full mb-6 hero-animate hero-animate-2">
                    {{ $project->category }}
                </span>
                
                <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl text-[var(--color-navy)] mb-6 hero-animate hero-animate-3">
                    {{ strtoupper($project->title) }}
                </h1>
                
                <p class="text-xl text-[var(--body-color-muted)] font-body leading-relaxed hero-animate hero-animate-4">
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="py-24 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Featured Image -->
                    @if($project->featured_image)
                    <div class="card-modern overflow-hidden scroll-animate">
                        <img src="{{ asset('storage/' . $project->featured_image) }}" 
                             alt="{{ $project->title }}"
                             class="w-full h-auto">
                    </div>
                    @endif

                    <!-- Project Overview -->
                    <div class="card-modern p-8 scroll-animate stagger-1">
                        <h2 class="font-heading text-2xl text-[var(--color-navy)] mb-6">PROJECT OVERVIEW</h2>
                        <div class="prose prose-lg max-w-none text-[var(--body-color-muted)] font-body">
                            {!! nl2br(e($project->content ?? $project->description)) !!}
                        </div>
                    </div>

                    <!-- Key Features -->
                    @if($project->features)
                    <div class="card-modern p-8 scroll-animate stagger-2">
                        <h2 class="font-heading text-2xl text-[var(--color-navy)] mb-6">KEY FEATURES</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($project->features as $feature)
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-[var(--color-navy)]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-check text-[var(--color-navy)] text-xs"></i>
                                </div>
                                <span class="text-[var(--body-color-muted)] font-body">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Gallery -->
                    @if($project->images && count($project->images) > 0)
                    <div class="scroll-animate stagger-3">
                        <h2 class="font-heading text-2xl text-[var(--color-navy)] mb-6">PROJECT GALLERY</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($project->images as $image)
                            <div class="card-modern overflow-hidden">
                                <img src="{{ asset('storage/' . $image) }}" 
                                     alt="{{ $project->title }} screenshot"
                                     class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Project Info -->
                    <div class="card-modern p-8 scroll-animate">
                        <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6">PROJECT INFO</h3>
                        <div class="space-y-4">
                            @if($project->client_name)
                            <div>
                                <span class="text-sm text-[var(--body-color-muted)] block mb-1">Client</span>
                                <span class="font-medium text-[var(--body-color)]">{{ $project->client_name }}</span>
                            </div>
                            @endif
                            
                            <div>
                                <span class="text-sm text-[var(--body-color-muted)] block mb-1">Category</span>
                                <span class="font-medium text-[var(--body-color)]">{{ $project->category }}</span>
                            </div>
                            
                            @if($project->completed_date)
                            <div>
                                <span class="text-sm text-[var(--body-color-muted)] block mb-1">Completed</span>
                                <span class="font-medium text-[var(--body-color)]">{{ \Carbon\Carbon::parse($project->completed_date)->format('F Y') }}</span>
                            </div>
                            @endif

                            @if($project->project_url)
                            <div class="pt-4">
                                <a href="{{ $project->project_url }}" target="_blank" class="btn-primary w-full justify-center">
                                    <span>View Live Site</span>
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                            @endif

                            @if($project->github_url)
                            <div>
                                <a href="{{ $project->github_url }}" target="_blank" class="btn-secondary w-full justify-center">
                                    <i class="fab fa-github"></i>
                                    <span>View Code</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    @if($project->tech_stack)
                    <div class="card-modern p-8 scroll-animate stagger-1">
                        <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6">TECH STACK</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tech_stack as $tech)
                            <span class="px-4 py-2 bg-[var(--color-navy)]/10 text-[var(--color-navy)] text-sm font-medium rounded-lg">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share -->
                    <div class="card-modern p-8 scroll-animate stagger-2">
                        <h3 class="font-heading text-xl text-[var(--color-navy)] mb-6">SHARE PROJECT</h3>
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($project->title) }}" 
                               target="_blank"
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                               target="_blank"
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if(isset($relatedProjects) && $relatedProjects->count() > 0)
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-3xl text-[var(--color-navy)] mb-12 scroll-animate">RELATED PROJECTS</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedProjects as $index => $related)
                <article class="group card-modern scroll-animate" style="transition-delay: {{ $index * 0.1 }}s;">
                    <div class="relative overflow-hidden aspect-[4/3]">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}"
                                 alt="{{ $related->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-[var(--color-navy)]/5">
                                <i class="fas fa-image text-4xl text-[var(--color-navy)]/20"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-[var(--color-navy)]/90 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                            <a href="{{ route('projects.show', $related->slug) }}" class="btn-primary bg-white text-[var(--color-navy)]">
                                View Project
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-[var(--color-navy)] uppercase tracking-wider">{{ $related->category }}</span>
                        <h3 class="font-heading text-lg text-[var(--color-navy)] mt-2">{{ strtoupper($related->title) }}</h3>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden" style="background-color: #1B365D;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-heading text-4xl md:text-5xl scroll-animate" style="color: #FFFFFF;">
                    INTERESTED IN WORKING TOGETHER?
                </h2>
                <p class="text-xl font-body max-w-2xl mx-auto scroll-animate stagger-1" style="color: #FFFFFF;">
                    Let's discuss your project and create something amazing.
                </p>
                <div class="pt-4 scroll-animate stagger-2">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-[#1B365D] rounded-lg font-body font-semibold hover:bg-[#F5F0E8] transition-all">
                        <span>Get in Touch</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Styles -->
    <style>
        .hero-animate {
            opacity: 0;
            transform: translateY(30px);
        }
        .hero-animate.loaded {
            animation: heroFadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .hero-animate-1.loaded { animation-delay: 0.1s; }
        .hero-animate-2.loaded { animation-delay: 0.2s; }
        .hero-animate-3.loaded { animation-delay: 0.3s; }
        .hero-animate-4.loaded { animation-delay: 0.4s; }

        @keyframes heroFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0;
        }
        .hero-orb.loaded { animation: orbFadeIn 1.5s ease-out forwards; }
        .hero-orb-1 {
            top: 10%;
            right: 10%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
        }
        @keyframes orbFadeIn { to { opacity: 0.05; } }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('loaded'));
                document.querySelectorAll('.hero-orb').forEach(el => el.classList.add('loaded'));
            }, 100);
        });
    </script>
@endsection
