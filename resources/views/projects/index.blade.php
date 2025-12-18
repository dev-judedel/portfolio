@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
    <!-- Projects Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Portfolio</p>
                    <div class="w-12 h-px bg-white/20 mx-auto"></div>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extralight text-white tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    My Work
                </h1>
                
                <p class="text-base text-white/45 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
                    A collection of projects showcasing my skills in web development, design, and problem-solving.
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-3 opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
                <button data-filter="all" class="filter-btn active px-6 py-2.5 bg-white/10 hover:bg-white/15 border border-white/20 rounded-lg text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                    All Projects
                </button>
                <button data-filter="web" class="filter-btn px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                    Web Apps
                </button>
                <button data-filter="mobile" class="filter-btn px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                    Mobile
                </button>
                <button data-filter="design" class="filter-btn px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                    Design
                </button>
                <button data-filter="api" class="filter-btn px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                    API
                </button>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $index => $project)
                    <div class="project-item group opacity-0 animate-fade-in-up" 
                         data-category="{{ strtolower($project->category) }}" 
                         style="animation-delay: {{ $index * 0.1 }}s;">
                        
                        <!-- Project Card -->
                        <div class="relative h-full flex flex-col">
                            <!-- Project Image -->
                            <div class="relative overflow-hidden aspect-[4/3] bg-black/20 rounded-lg mb-4">
                                @if($project->featured_image)
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                         alt="{{ $project->title }}" 
                                         class="w-full h-full object-cover opacity-40 group-hover:opacity-60 group-hover:scale-105 transition-all duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-image text-6xl text-white/10"></i>
                                    </div>
                                @endif
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="absolute bottom-0 left-0 right-0 p-6 space-y-3">
                                        <a href="{{ route('projects.show', $project->slug) }}" 
                                           class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm font-light transition-colors">
                                            <span>View Details</span>
                                            <i class="fas fa-arrow-right text-xs"></i>
                                        </a>
                                        
                                        <div class="flex gap-3">
                                            @if($project->demo_url)
                                            <a href="{{ $project->demo_url }}" 
                                               target="_blank"
                                               class="text-white/60 hover:text-white text-xs transition-colors">
                                                <i class="fas fa-external-link-alt mr-1"></i> Live Demo
                                            </a>
                                            @endif
                                            
                                            @if($project->github_url)
                                            <a href="{{ $project->github_url }}" 
                                               target="_blank"
                                               class="text-white/60 hover:text-white text-xs transition-colors">
                                                <i class="fab fa-github mr-1"></i> GitHub
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Border Effect -->
                                <div class="absolute inset-0 border border-white/10 rounded-lg group-hover:border-white/20 transition-colors duration-500"></div>
                            </div>
                            
                            <!-- Project Info -->
                            <div class="flex-1 flex flex-col space-y-3">
                                <span class="text-[10px] font-light text-white/30 uppercase tracking-[0.2em]">
                                    {{ $project->category }}
                                </span>
                                
                                <h3 class="text-lg font-light text-white/90 group-hover:text-white transition-colors">
                                    <a href="{{ route('projects.show', $project->slug) }}">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                
                                <p class="text-white/40 text-sm font-light leading-relaxed line-clamp-2 flex-1">
                                    {{ Str::limit($project->description, 120) }}
                                </p>
                                
                                <!-- Tech Stack -->
                                @if($project->tech_stack && count($project->tech_stack) > 0)
                                <div class="flex flex-wrap gap-2 pt-2">
                                    @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                                        <span class="px-3 py-1 bg-white/5 text-white/50 text-[10px] rounded border border-white/10 font-light uppercase tracking-wider">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <i class="fas fa-folder-open text-white/10 text-6xl mb-4"></i>
                        <p class="text-white/30 font-light text-lg">No projects available yet.</p>
                        <p class="text-white/20 font-light text-sm mt-2">Check back soon for updates!</p>
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
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Have a Project<br>in Mind?
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Let's collaborate and bring your ideas to life.
                </p>
            </div>
            
            <a href="{{ route('contact.index') }}" 
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">Start a Project</span>
                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
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
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-white/10', 'border-white/20', 'text-white/80');
                        b.classList.add('bg-white/5', 'border-white/10', 'text-white/60');
                    });
                    
                    this.classList.add('active', 'bg-white/10', 'border-white/20', 'text-white/80');
                    this.classList.remove('bg-white/5', 'border-white/10', 'text-white/60');
                    
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
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .project-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    </style>
@endsection
