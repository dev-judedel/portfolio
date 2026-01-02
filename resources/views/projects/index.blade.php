@extends('layouts.app')

@section('title', 'Projects - JUDE')

@section('content')
    <!-- Projects Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-10">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center relative z-10">
            <span class="section-label hero-animate hero-animate-1">Portfolio</span>
            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl text-[var(--color-navy)] mt-4 mb-6 hero-animate hero-animate-2">
                MY PROJECTS
            </h1>
            <p class="text-xl text-[var(--body-color-muted)] font-body max-w-2xl mx-auto hero-animate hero-animate-3">
                A showcase of my recent work, featuring web applications, APIs, and more.
            </p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-24 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-16 scroll-animate">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="web">Web Apps</button>
                <button class="filter-btn" data-filter="mobile">Mobile</button>
                <button class="filter-btn" data-filter="design">Design</button>
                <button class="filter-btn" data-filter="api">API</button>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
                @forelse($projects as $index => $project)
                    <article class="group card-modern project-card scroll-animate" 
                             data-category="{{ strtolower($project->category) }}"
                             style="transition-delay: {{ ($index % 6) * 0.1 }}s;">
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
                                    <span>View Details</span>
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
                                {{ Str::limit($project->description, 120) }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 pt-2">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 4) as $tech)
                                    <span class="px-3 py-1 bg-[var(--color-navy)]/5 text-[var(--body-color-muted)] text-xs rounded-full font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 card-modern">
                        <i class="fas fa-folder-open text-[var(--color-navy)]/20 text-6xl mb-4"></i>
                        <p class="text-[var(--body-color-muted)] font-body">No projects available yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="mt-16 flex justify-center">
                {{ $projects->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden" style="background-color: #1B365D;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-heading text-4xl md:text-5xl scroll-animate" style="color: #FFFFFF;">
                    HAVE A PROJECT IN MIND?
                </h2>
                <p class="text-xl font-body max-w-2xl mx-auto scroll-animate stagger-1" style="color: #FFFFFF;">
                    Let's collaborate and create something amazing together.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4 scroll-animate stagger-2">
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
            top: 20%;
            left: 10%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
        }
        @keyframes orbFadeIn { to { opacity: 0.05; } }

        /* Filter buttons */
        .filter-btn {
            padding: 0.75rem 1.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--body-color-muted);
            background: var(--color-white);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .filter-btn:hover {
            border-color: var(--color-navy);
            color: var(--color-navy);
        }
        .filter-btn.active {
            background: var(--color-navy);
            color: white;
            border-color: var(--color-navy);
        }

        .project-card.hidden {
            display: none;
        }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('loaded'));
                document.querySelectorAll('.hero-orb').forEach(el => el.classList.add('loaded'));
            }, 100);

            // Filter functionality
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projects = document.querySelectorAll('.project-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const filter = btn.dataset.filter;

                    projects.forEach(project => {
                        if (filter === 'all' || project.dataset.category === filter) {
                            project.classList.remove('hidden');
                        } else {
                            project.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>
@endsection
