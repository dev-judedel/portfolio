@extends('layouts.app')

@section('title', 'Add New Blog Category - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Add New Category</h1>
                <p class="text-white/40 font-light">Create a new blog category</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.blog.categories.store') }}" method="POST" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Category Name -->
                    <div>
                        <label for="name" class="block text-sm font-light text-white/80 mb-2">
                            Category Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Web Development, Design, Technology"
                               required>
                        @error('name')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-light text-white/80 mb-2">
                            Description
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light resize-none"
                            placeholder="Brief description of this category...">{{ old('description') }}</textarea>
                        <p class="mt-2 text-xs text-white/40 font-light">Optional: Provide a brief description of what this category covers</p>
                        @error('description')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-save mr-2"></i> Save Category
                    </button>
                    <a href="{{ route('admin.blog.categories.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
                        Cancel
                    </a>
                </div>
            </form>
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
