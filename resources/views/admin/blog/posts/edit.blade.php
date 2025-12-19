@extends('layouts.app')

@section('title', 'Edit Blog Post - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Edit Post</h1>
                <p class="text-white/40 font-light">Update post information</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.blog.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf
                @method('PUT')

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Category -->
                    <div>
                        <label for="blog_category_id" class="block text-sm font-light text-white/80 mb-2">
                            Category <span class="text-red-400">*</span>
                        </label>
                        <select
                            name="blog_category_id"
                            id="blog_category_id"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            required>
                            <option value="" class="bg-gray-800">Select a category...</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('blog_category_id', $post->blog_category_id) == $category->id ? 'selected' : '' }} class="bg-gray-800">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-light text-white/80 mb-2">
                            Title <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $post->title) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="Enter post title..."
                               required>
                        @error('title')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-light text-white/80 mb-2">
                            Excerpt <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            name="excerpt"
                            id="excerpt"
                            rows="3"
                            maxlength="500"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light resize-none"
                            placeholder="Brief summary of the post (max 500 characters)..."
                            required>{{ old('excerpt', $post->excerpt) }}</textarea>
                        <p class="mt-2 text-xs text-white/40 font-light">Maximum 500 characters</p>
                        @error('excerpt')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-light text-white/80 mb-2">
                            Content <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            name="content"
                            id="content"
                            rows="15"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light resize-none"
                            placeholder="Write your post content here..."
                            required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-light text-white/80 mb-2">
                            Featured Image
                        </label>

                        @if($post->featured_image)
                        <div class="mb-4">
                            <p class="text-xs text-white/40 font-light mb-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $post->featured_image) }}"
                                 alt="{{ $post->title }}"
                                 class="max-w-xs rounded-lg border border-white/10">
                        </div>
                        @endif

                        <input type="file"
                               name="featured_image"
                               id="featured_image"
                               accept="image/*"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-light file:bg-white/10 file:text-white/80 hover:file:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               onchange="previewImage(this)">
                        <p class="mt-2 text-xs text-white/40 font-light">Upload a new image to replace the current one</p>
                        @error('featured_image')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror

                        <!-- Image Preview -->
                        <div id="image-preview" class="mt-4 hidden">
                            <p class="text-xs text-white/40 font-light mb-2">New Image Preview:</p>
                            <img src="" alt="Preview" class="max-w-xs rounded-lg border border-white/10">
                        </div>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags-input" class="block text-sm font-light text-white/80 mb-2">
                            Tags
                        </label>
                        <div class="space-y-3">
                            <div class="flex gap-2">
                                <input type="text"
                                       id="tags-input"
                                       class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                       placeholder="Enter a tag and press Add"
                                       onkeypress="if(event.key === 'Enter') { event.preventDefault(); addTag(); }">
                                <button type="button"
                                        onclick="addTag()"
                                        class="px-4 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white/80 font-light transition-all">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                            <div id="tags-container" class="flex flex-wrap gap-2 min-h-[40px]"></div>
                            <input type="hidden" name="tags" id="tags-hidden" value="{{ old('tags', json_encode($post->tags ?? [])) }}">
                        </div>
                        <p class="mt-2 text-xs text-white/40 font-light">Add tags to categorize your post</p>
                        @error('tags')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-light text-white/80 mb-2">
                            Status <span class="text-red-400">*</span>
                        </label>
                        <select
                            name="status"
                            id="status"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            onchange="togglePublishedAt()"
                            required>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }} class="bg-gray-800">Draft</option>
                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }} class="bg-gray-800">Published</option>
                        </select>
                        @error('status')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published At -->
                    <div id="published-at-container" style="display: none;">
                        <label for="published_at" class="block text-sm font-light text-white/80 mb-2">
                            Published At
                        </label>
                        <input type="datetime-local"
                               name="published_at"
                               id="published_at"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                        <p class="mt-2 text-xs text-white/40 font-light">Leave empty to use current date/time</p>
                        @error('published_at')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-save mr-2"></i> Update Post
                    </button>
                    <a href="{{ route('admin.blog.posts.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>

    <!-- Animations & Scripts -->
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

    <script>
        // Image Preview
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const previewImg = preview.querySelector('img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
            }
        }

        // Tags Management
        let tags = [];

        function addTag() {
            const input = document.getElementById('tags-input');
            const tag = input.value.trim();

            if (tag && !tags.includes(tag)) {
                tags.push(tag);
                updateTagsDisplay();
                input.value = '';
            }
        }

        function removeTag(tag) {
            tags = tags.filter(t => t !== tag);
            updateTagsDisplay();
        }

        function updateTagsDisplay() {
            const container = document.getElementById('tags-container');
            const hidden = document.getElementById('tags-hidden');

            container.innerHTML = tags.map(tag => `
                <span class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded-lg text-white/80 text-sm font-light">
                    ${tag}
                    <button type="button" onclick="removeTag('${tag}')" class="text-white/60 hover:text-red-400 transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </span>
            `).join('');

            hidden.value = JSON.stringify(tags);
        }

        // Initialize tags from old input or existing post
        const oldTags = document.getElementById('tags-hidden').value;
        if (oldTags) {
            try {
                tags = JSON.parse(oldTags);
                updateTagsDisplay();
            } catch (e) {}
        }

        // Toggle Published At Field
        function togglePublishedAt() {
            const status = document.getElementById('status').value;
            const container = document.getElementById('published-at-container');
            container.style.display = status === 'published' ? 'block' : 'none';
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', togglePublishedAt);
    </script>
@endsection
