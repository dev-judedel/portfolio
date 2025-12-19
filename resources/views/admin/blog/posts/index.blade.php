@extends('layouts.app')

@section('title', 'Manage Blog Posts - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Blog Posts</h1>
                    <p class="text-white/40 font-light">Manage your blog posts and articles</p>
                </div>

                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <a href="{{ route('admin.blog.posts.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span>Add Post</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm font-light opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm font-light opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Posts List -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Reading Time</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Views</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Published</th>
                                <th class="px-6 py-4 text-right text-xs font-light text-white/60 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($posts as $post)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    @if($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                                         alt="{{ $post->title }}"
                                         class="w-16 h-16 object-cover rounded-lg border border-white/10">
                                    @else
                                    <div class="w-16 h-16 bg-white/5 rounded-lg border border-white/10 flex items-center justify-center">
                                        <i class="fas fa-image text-white/20"></i>
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-light text-white/80 max-w-xs">{{ $post->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-white/10 rounded text-xs text-white/60 font-light">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($post->status === 'published')
                                    <span class="inline-flex items-center px-2 py-1 bg-green-500/10 border border-green-500/30 rounded text-xs text-green-400 font-light">
                                        <i class="fas fa-check-circle mr-1"></i> Published
                                    </span>
                                    @else
                                    <span class="inline-flex items-center px-2 py-1 bg-white/10 border border-white/20 rounded text-xs text-white/60 font-light">
                                        <i class="fas fa-file-alt mr-1"></i> Draft
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $post->reading_time ?? 0 }} min read</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ number_format($post->views ?? 0) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">
                                        {{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="p-2 hover:bg-white/10 rounded transition-colors" title="Edit">
                                            <i class="fas fa-edit text-white/60 hover:text-white/80"></i>
                                        </a>
                                        <form action="{{ route('admin.blog.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 hover:bg-red-500/10 rounded transition-colors" title="Delete">
                                                <i class="fas fa-trash text-red-400/60 hover:text-red-400"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
            @else
            <div class="text-center py-16 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-white/5 flex items-center justify-center">
                    <i class="fas fa-file-alt text-3xl text-white/20"></i>
                </div>
                <h3 class="text-xl font-light text-white/60 mb-2">No posts yet</h3>
                <p class="text-white/40 text-sm font-light mb-6">Start by creating your first blog post</p>
                <a href="{{ route('admin.blog.posts.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                    <i class="fas fa-plus"></i>
                    <span>Add Post</span>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Back Button -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-white/60 hover:text-white/80 font-light text-sm transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Dashboard</span>
            </a>
        </div>
    </section>

    <!-- Animations -->
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
