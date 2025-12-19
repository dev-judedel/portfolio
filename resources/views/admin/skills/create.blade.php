@extends('layouts.app')

@section('title', 'Add New Skill - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Add New Skill</h1>
                <p class="text-white/40 font-light">Create a new skill entry for your portfolio</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Skill Name -->
                    <div>
                        <label for="name" class="block text-sm font-light text-white/80 mb-2">
                            Skill Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Laravel, React, PHP"
                               required>
                        @error('name')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-light text-white/80 mb-2">
                            Category <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="category"
                               id="category"
                               value="{{ old('category') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Backend, Frontend, Database"
                               required>
                        @error('category')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Proficiency -->
                    <div>
                        <label for="proficiency" class="block text-sm font-light text-white/80 mb-2">
                            Proficiency (1-100) <span class="text-red-400">*</span>
                        </label>
                        <div class="flex items-center gap-4">
                            <input type="range"
                                   name="proficiency"
                                   id="proficiency"
                                   min="1"
                                   max="100"
                                   value="{{ old('proficiency', 50) }}"
                                   class="flex-1"
                                   oninput="document.getElementById('proficiency-value').textContent = this.value + '%'"
                                   required>
                            <span id="proficiency-value" class="text-white/80 font-light min-w-[50px] text-right">{{ old('proficiency', 50) }}%</span>
                        </div>
                        @error('proficiency')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-light text-white/80 mb-2">
                            Icon Class
                        </label>
                        <input type="text"
                               name="icon"
                               id="icon"
                               value="{{ old('icon') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., fab fa-laravel, fas fa-code">
                        <p class="mt-2 text-xs text-white/40 font-light">Use Font Awesome or other icon library classes</p>
                        @error('icon')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label for="order" class="block text-sm font-light text-white/80 mb-2">
                            Display Order
                        </label>
                        <input type="number"
                               name="order"
                               id="order"
                               min="0"
                               value="{{ old('order', 0) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="0">
                        <p class="mt-2 text-xs text-white/40 font-light">Lower numbers appear first</p>
                        @error('order')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div class="flex items-center gap-3">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox"
                               name="is_featured"
                               id="is_featured"
                               value="1"
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="w-5 h-5 bg-white/5 border border-white/10 rounded focus:ring-2 focus:ring-white/10">
                        <label for="is_featured" class="text-sm font-light text-white/80">
                            Featured (Display on homepage)
                        </label>
                        @error('is_featured')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-save mr-2"></i> Save Skill
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
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

        /* Range input styling */
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            background: rgba(255, 255, 255, 0.1);
            outline: none;
            border-radius: 10px;
            height: 8px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
    </style>
@endsection
