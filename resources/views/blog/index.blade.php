@extends('layouts.app')

@section('title', 'Blog - Portfolio')

@section('content')
    <!-- Blog Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Insights</p>
                    <div class="w-12 h-px bg-white/20 mx-auto"></div>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extralight text-white tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    Blog
                </h1>
                
                <p class="text-base text-white/45 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
                    Thoughts on web development, design, and technology trends.
                </p>
            </div>
        </div>
    </section>

    <!-- Categories Filter -->
    @if($categories && $categories->count() > 0)
    <section class="py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-3 opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
                <a href="{{ route('blog.index') }}" 
                   class="px-6 py-2.5 {{ !request('category') ? 'bg-white/10 border-white/20 text-white/80' : 'bg-white/5 border-white/10 text-white/60 hover:bg-white/10 hover:border-white/20 hover:text-white/80' }} border rounded-lg text-sm font-light uppercase tracking-wider transition-all duration-300">
                    All Posts
                </a>
                
                @foreach($categories as $category)
                <a href="{{ route('blog.category', $category->slug) }}" 
                   class="px-6 py-2.5 {{ request('category') == $category->slug ? 'bg-white/10 border-white/20 text-white/80' : 'bg-white/5 border-white/10 text-white/60 hover:bg-white/10 hover:border-white/20 hover:text-white/80' }} border rounded-lg text-sm font-light uppercase tracking-wider transition-all duration-300">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Posts Grid -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $index => $post)
                    <article class="group opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <a href="{{ route('blog.show', $post->slug) }}" class="block h-full">
                            <div class="h-full flex flex-col">
                                <!-- Featured Image -->
                                <div class="relative overflow-hidden aspect-[16/10] bg-black/20 rounded-lg mb-4">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-full h-full object-cover opacity-40 group-hover:opacity-60 group-hover:scale-105 transition-all duration-700">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-newspaper text-6xl text-white/10"></i>
                                        </div>
                                    @endif
                                    
                                    <!-- Border Effect -->
                                    <div class="absolute inset-0 border border-white/10 rounded-lg group-hover:border-white/20 transition-colors duration-500"></div>
                                </div>
                                
                                <!-- Post Info -->
                                <div class="flex-1 flex flex-col space-y-3">
                                    <!-- Meta Info -->
                                    <div class="flex items-center gap-3 text-[10px] text-white/30 uppercase tracking-[0.2em] font-light">
                                        @if($post->category)
                                        <span>{{ $post->category->name }}</span>
                                        <span>•</span>
                                        @endif
                                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                                        <span>•</span>
                                        <span>{{ $post->reading_time }} min read</span>
                                    </div>
                                    
                                    <!-- Title -->
                                    <h2 class="text-xl font-light text-white/90 group-hover:text-white transition-colors leading-snug">
                                        {{ $post->title }}
                                    </h2>
                                    
                                    <!-- Excerpt -->
                                    <p class="text-white/40 text-sm font-light leading-relaxed line-clamp-3 flex-1">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                                    </p>
                                    
                                    <!-- Read More Link -->
                                    <div class="pt-2">
                                        <span class="inline-flex items-center gap-2 text-white/60 group-hover:text-white text-sm font-light transition-colors">
                                            <span>Read More</span>
                                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <i class="fas fa-newspaper text-white/10 text-6xl mb-4"></i>
                        <p class="text-white/30 font-light text-lg">No blog posts available yet.</p>
                        <p class="text-white/20 font-light text-sm mt-2">Check back soon for updates!</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
            <div class="mt-16 flex justify-center">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section (Optional) -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-12 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 text-center space-y-6">
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl font-extralight text-white tracking-tight">
                        Stay Updated
                    </h2>
                    <p class="text-white/40 font-light">
                        Subscribe to get notified about new blog posts and updates.
                    </p>
                </div>
                
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Your email address"
                        class="flex-1 px-6 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:border-white/30 focus:outline-none transition-colors font-light">
                    <button 
                        type="submit"
                        class="px-8 py-3 bg-white/10 hover:bg-white/15 border border-white/20 rounded-lg text-white font-light transition-all duration-300">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Need Help with<br>Your Project?
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Let's discuss how I can bring your ideas to life.
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
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
@endsection
