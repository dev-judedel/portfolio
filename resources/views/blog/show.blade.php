@extends('layouts.app')

@section('title', $post->title . ' - Blog')

@section('content')
    <!-- Blog Post Hero -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <!-- Back Link -->
                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <a href="{{ route('blog.index') }}" 
                       class="inline-flex items-center gap-2 text-white/50 hover:text-white/80 text-sm font-light transition-colors">
                        <i class="fas fa-arrow-left text-xs"></i>
                        <span>Back to Blog</span>
                    </a>
                </div>

                <!-- Category Badge -->
                @if($post->category)
                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <a href="{{ route('blog.category', $post->category->slug) }}"
                       class="inline-block px-4 py-1.5 bg-white/5 hover:bg-white/10 text-white/40 hover:text-white/60 text-[10px] rounded border border-white/10 hover:border-white/20 font-light uppercase tracking-[0.2em] transition-all">
                        {{ $post->category->name }}
                    </a>
                </div>
                @endif
                
                <!-- Post Title -->
                <h1 class="text-4xl md:text-6xl font-extralight text-white tracking-tight leading-tight opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                    {{ $post->title }}
                </h1>
                
                <!-- Meta Information -->
                <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-white/40 font-light opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-xs"></i>
                        <span>{{ $post->published_at->format('F d, Y') }}</span>
                    </div>
                    <span>•</span>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-xs"></i>
                        <span>{{ $post->reading_time }} min read</span>
                    </div>
                    @if($post->author)
                    <span>•</span>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-user text-xs"></i>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($post->featured_image)
    <section class="py-8 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-lg overflow-hidden border border-white/10 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s;">
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-auto object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Post Content -->
    <section class="py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                
                <!-- Sidebar (Left) -->
                <div class="lg:col-span-1 space-y-8 order-2 lg:order-1">
                    
                    <!-- Share Section -->
                    <div class="sticky top-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Share</h3>
                        
                        <div class="flex lg:flex-col gap-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                               target="_blank"
                               class="flex items-center justify-center gap-2 px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300 group">
                                <i class="fab fa-twitter text-white/50 group-hover:text-white/80"></i>
                                <span class="hidden lg:inline text-white/50 group-hover:text-white/80 text-sm font-light">Twitter</span>
                            </a>
                            
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" 
                               target="_blank"
                               class="flex items-center justify-center gap-2 px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300 group">
                                <i class="fab fa-facebook-f text-white/50 group-hover:text-white/80"></i>
                                <span class="hidden lg:inline text-white/50 group-hover:text-white/80 text-sm font-light">Facebook</span>
                            </a>
                            
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}" 
                               target="_blank"
                               class="flex items-center justify-center gap-2 px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300 group">
                                <i class="fab fa-linkedin-in text-white/50 group-hover:text-white/80"></i>
                                <span class="hidden lg:inline text-white/50 group-hover:text-white/80 text-sm font-light">LinkedIn</span>
                            </a>
                            
                            <button 
                                onclick="copyToClipboard()"
                                class="flex items-center justify-center gap-2 px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300 group">
                                <i class="fas fa-link text-white/50 group-hover:text-white/80"></i>
                                <span class="hidden lg:inline text-white/50 group-hover:text-white/80 text-sm font-light">Copy Link</span>
                            </button>
                        </div>
                    </div>

                    <!-- Tags -->
                    @if($post->tags && count($post->tags) > 0)
                    <div class="space-y-4 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                        <h3 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                            <span class="px-3 py-1 bg-white/5 text-white/50 text-[10px] rounded border border-white/10 font-light uppercase tracking-wider">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Main Content -->
                <article class="lg:col-span-3 order-1 lg:order-2 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <!-- Post Content -->
                    <div class="prose prose-invert prose-lg max-w-none">
                        <div class="text-white/60 font-light leading-relaxed space-y-6">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <!-- Author Box -->
                    @if($post->author)
                    <div class="mt-16 p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10">
                        <div class="flex items-start gap-6">
                            <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center text-white/40 text-xl font-light border border-white/10 flex-shrink-0">
                                {{ substr($post->author->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg font-light text-white/90 mb-2">{{ $post->author->name }}</h4>
                                @if($post->author->profile && $post->author->profile->bio)
                                <p class="text-white/50 font-light text-sm leading-relaxed">
                                    {{ Str::limit($post->author->profile->bio, 200) }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </article>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    @if($relatedPosts && $relatedPosts->count() > 0)
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">More Posts</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Related Articles</h2>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $index => $relatedPost)
                    <article class="group opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <a href="{{ route('blog.show', $relatedPost->slug) }}" class="block">
                            <div class="relative overflow-hidden aspect-[16/10] bg-black/20 rounded-lg mb-4">
                                @if($relatedPost->featured_image)
                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                         alt="{{ $relatedPost->title }}" 
                                         class="w-full h-full object-cover opacity-40 group-hover:opacity-60 group-hover:scale-105 transition-all duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-newspaper text-6xl text-white/10"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 border border-white/10 rounded-lg group-hover:border-white/20 transition-colors duration-500"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-[10px] text-white/30 uppercase tracking-[0.2em] font-light">
                                    <span>{{ $relatedPost->published_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-lg font-light text-white/90 group-hover:text-white transition-colors line-clamp-2">
                                    {{ $relatedPost->title }}
                                </h3>
                            </div>
                        </a>
                    </article>
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
                    Let's Work<br>Together
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Have a project in mind? Let's discuss how I can help.
                </p>
            </div>
            
            <a href="{{ route('contact.index') }}" 
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">Get in Touch</span>
                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </section>

    <!-- Copy Link Script -->
    <script>
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                // Show temporary success message
                const btn = event.currentTarget;
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check text-green-400"></i><span class="hidden lg:inline text-green-400 text-sm font-light">Copied!</span>';
                
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                }, 2000);
            });
        }
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

        /* Custom Prose Styles for Dark Mode */
        .prose-invert {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .prose-invert h2 {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            margin-top: 2em;
            margin-bottom: 1em;
            font-size: 1.75em;
        }
        
        .prose-invert h3 {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 300;
            margin-top: 1.5em;
            margin-bottom: 0.75em;
            font-size: 1.5em;
        }
        
        .prose-invert p {
            margin-bottom: 1.5em;
            line-height: 1.8;
        }
        
        .prose-invert a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: underline;
            text-decoration-color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s;
        }
        
        .prose-invert a:hover {
            color: rgba(255, 255, 255, 1);
            text-decoration-color: rgba(255, 255, 255, 0.6);
        }
        
        .prose-invert ul, .prose-invert ol {
            margin-top: 1.5em;
            margin-bottom: 1.5em;
            padding-left: 1.5em;
        }
        
        .prose-invert li {
            margin-bottom: 0.5em;
        }
        
        .prose-invert blockquote {
            border-left: 3px solid rgba(255, 255, 255, 0.2);
            padding-left: 1.5em;
            font-style: italic;
            color: rgba(255, 255, 255, 0.5);
            margin: 2em 0;
        }
        
        .prose-invert code {
            background: rgba(255, 255, 255, 0.05);
            padding: 0.25em 0.5em;
            border-radius: 0.25em;
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .prose-invert pre {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5em;
            border-radius: 0.5em;
            overflow-x: auto;
            margin: 2em 0;
        }
        
        .prose-invert img {
            border-radius: 0.5em;
            margin: 2em 0;
        }
    </style>
@endsection
