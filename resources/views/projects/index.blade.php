@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
    <!-- Projects Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-20 w-72 h-72 bg-[var(--accent-primary)]/10 rounded-full blur-3xl float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-[var(--accent-secondary)]/10 rounded-full blur-3xl float" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="text-center space-y-6">
                <div class="reveal-text reveal-1">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--page-text)]/5 rounded-full text-sm font-medium text-[var(--page-text-muted)]">
                        <i class="fas fa-briefcase text-[var(--accent-primary)]"></i>
                        Portfolio
                    </span>
                </div>
                
                <h1 class="font-display text-5xl md:text-7xl text-[var(--page-text)] reveal-text reveal-2">
                    My Work
                </h1>
                
                <p class="text-lg text-[var(--page-text-muted)] max-w-2xl mx-auto font-body leading-relaxed reveal-text reveal-3">
                    A collection of projects showcasing my skills in web development, design, and problem-solving.
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-8 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-3 fade-in-up">
                <button data-filter="all" class="filter-btn active">
                    All Projects
                </button>
                <button data-filter="web" class="filter-btn">
                    Web Apps
                </button>
                <button data-filter="mobile" class="filter-btn">
                    Mobile
                </button>
                <button data-filter="design" class="filter-btn">
                    Design
                </button>
                <button data-filter="api" class="filter-btn">
                    API
                </button>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $index => $project)
                    <div class="project-item group fade-in-up" 
                         data-category="{{ strtolower($project->category) }}" 
                         style="animation-delay: {{ $index * 0.1 }}s;">
                        
                        <!-- Project Card -->
                        <div class="card-modern h-full flex flex-col overflow-hidden">
                            <!-- Project Image -->
                            <div class="relative overflow-hidden aspect-[4/3]">
                                @if($project->featured_image)
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                         alt="{{ $project->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[var(--accent-primary)]/10 to-[var(--accent-secondary)]/10">
                                        <i class="fas fa-image text-5xl text-[var(--page-text)]/10"></i>
                                    </div>
                                @endif
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[var(--page-text)] via-[var(--page-text)]/60 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-6">
                                    <a href="{{ route('projects.show', $project->slug) }}" 
                                       class="btn-primary text-sm justify-center mb-3">
                                        <span>View Details</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                    
                                    <div class="flex justify-center gap-4">
                                        @if($project->demo_url)
                                        <a href="{{ $project->demo_url }}" 
                                           target="_blank"
                                           class="text-white/70 hover:text-white text-xs transition-colors">
                                            <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                        </a>
                                        @endif
                                        
                                        @if($project->github_url)
                                        <a href="{{ $project->github_url }}" 
                                           target="_blank"
                                           class="text-white/70 hover:text-white text-xs transition-colors">
                                            <i class="fab fa-github mr-1"></i> GitHub
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Project Info -->
                            <div class="p-6 flex-1 flex flex-col space-y-3">
                                <span class="text-xs font-medium text-[var(--accent-primary)] uppercase tracking-wider">
                                    {{ $project->category }}
                                </span>
                                
                                <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] group-hover:text-[var(--accent-primary)] transition-colors">
                                    <a href="{{ route('projects.show', $project->slug) }}">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                
                                <p class="text-[var(--page-text-muted)] text-sm font-body line-clamp-2 flex-1">
                                    {{ Str::limit($project->description, 120) }}
                                </p>
                                
                                <!-- Tech Stack -->
                                @if($project->tech_stack && count($project->tech_stack) > 0)
                                <div class="flex flex-wrap gap-2 pt-2">
                                    @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                                        <span class="px-3 py-1 bg-[var(--page-text)]/5 text-[var(--page-text-muted)] text-xs rounded-full font-medium">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 card-modern">
                        <i class="fas fa-folder-open text-[var(--page-text)]/10 text-6xl mb-4"></i>
                        <p class="text-[var(--page-text-muted)] font-body text-lg">No projects available yet.</p>
                        <p class="text-[var(--page-text-light)] font-body text-sm mt-2">Check back soon for updates!</p>
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
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-[var(--page-text)]"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--accent-primary)]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--accent-secondary)]/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-display text-4xl md:text-6xl text-white leading-tight fade-in-up">
                    Have a Project<br>
                    <span class="text-[var(--accent-primary)]">in Mind?</span>
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.1s;">
                    Let's collaborate and bring your ideas to life.
                </p>
                
                <div class="pt-4 fade-in-up" style="animation-delay: 0.2s;">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[var(--page-text)] rounded-lg font-heading font-semibold hover:bg-[var(--accent-primary)] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Start a Project</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectItems = document.querySelectorAll('.project-item');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    // Update active button
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter projects
                    projectItems.forEach(item => {
                        const category = item.getAttribute('data-category');
                        
                        if (filter === 'all' || category === filter) {
                            item.style.display = 'block';
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0)';
                            }, 10);
                        } else {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                item.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });
        });
    </script>

    <style>
        .filter-btn {
            padding: 0.625rem 1.5rem;
            border-radius: 0.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--page-text-muted);
            background-color: transparent;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            border-color: var(--page-text);
            color: var(--page-text);
        }

        .filter-btn.active {
            background-color: var(--button-bg);
            border-color: var(--button-bg);
            color: white;
        }
        
        .project-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    </style>
@endsection
