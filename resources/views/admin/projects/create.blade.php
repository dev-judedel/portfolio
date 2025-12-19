@extends('layouts.app')

@section('title', 'Add New Project - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Add New Project</h1>
                <p class="text-white/40 font-light">Create a new project entry for your portfolio</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-light text-white/80 mb-2">
                            Project Title <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., E-commerce Platform"
                               required>
                        @error('title')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-light text-white/80 mb-2">
                            Short Description <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="3"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            placeholder="Brief description of the project..."
                            required>{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Long Description -->
                    <div>
                        <label for="long_description" class="block text-sm font-light text-white/80 mb-2">
                            Detailed Description
                        </label>
                        <textarea
                            name="long_description"
                            id="long_description"
                            rows="6"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            placeholder="Detailed description, features, challenges, and outcomes...">{{ old('long_description') }}</textarea>
                        @error('long_description')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category & Client -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-light text-white/80 mb-2">
                                Category
                            </label>
                            <input type="text"
                                   name="category"
                                   id="category"
                                   value="{{ old('category') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., Web Development">
                            @error('category')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client" class="block text-sm font-light text-white/80 mb-2">
                                Client
                            </label>
                            <input type="text"
                                   name="client"
                                   id="client"
                                   value="{{ old('client') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., Acme Inc">
                            @error('client')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- URLs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="project_url" class="block text-sm font-light text-white/80 mb-2">
                                Project URL
                            </label>
                            <input type="url"
                                   name="project_url"
                                   id="project_url"
                                   value="{{ old('project_url') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="https://example.com">
                            @error('project_url')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="github_url" class="block text-sm font-light text-white/80 mb-2">
                                GitHub URL
                            </label>
                            <input type="url"
                                   name="github_url"
                                   id="github_url"
                                   value="{{ old('github_url') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="https://github.com/username/repo">
                            @error('github_url')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Technologies -->
                    <div>
                        <label class="block text-sm font-light text-white/80 mb-2">
                            Technologies Used
                        </label>
                        <div id="technologies-container" class="space-y-2">
                            @if(old('technologies'))
                                @foreach(old('technologies') as $index => $tech)
                                <div class="flex gap-2 technology-item">
                                    <input type="text"
                                           name="technologies[]"
                                           value="{{ $tech }}"
                                           class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                           placeholder="e.g., Laravel, Vue.js, MySQL">
                                    <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                @endforeach
                            @else
                                <div class="flex gap-2 technology-item">
                                    <input type="text"
                                           name="technologies[]"
                                           class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                           placeholder="e.g., Laravel, Vue.js, MySQL">
                                    <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <button type="button" onclick="addTechnology()" class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light transition-all">
                            <i class="fas fa-plus"></i>
                            <span>Add Technology</span>
                        </button>
                        @error('technologies')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-light text-white/80 mb-2">
                                Start Date
                            </label>
                            <input type="date"
                                   name="start_date"
                                   id="start_date"
                                   value="{{ old('start_date') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('start_date')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="completion_date" class="block text-sm font-light text-white/80 mb-2">
                                Completion Date
                            </label>
                            <input type="date"
                                   name="completion_date"
                                   id="completion_date"
                                   value="{{ old('completion_date') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('completion_date')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-light text-white/80 mb-2">
                            Project Status
                        </label>
                        <select name="status"
                                id="status"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            <option value="planning" {{ old('status') == 'planning' ? 'selected' : '' }}>Planning</option>
                            <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', 'completed') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="on-hold" {{ old('status') == 'on-hold' ? 'selected' : '' }}>On Hold</option>
                        </select>
                        @error('status')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-light text-white/80 mb-2">
                            Featured Image
                        </label>
                        <input type="file"
                               name="featured_image"
                               id="featured_image"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-white/10 file:text-white/80 file:text-sm file:font-light hover:file:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               onchange="previewImage(this, 'image-preview')">
                        <p class="mt-2 text-xs text-white/40 font-light">Accepted formats: JPG, PNG, WEBP. Max size: 2MB</p>
                        @error('featured_image')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                        <div id="image-preview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="w-full max-w-md rounded-lg border border-white/10">
                        </div>
                    </div>

                    <!-- Order & Featured -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

                        <div>
                            <label class="block text-sm font-light text-white/80 mb-2">Options</label>
                            <div class="flex items-center gap-3 pt-3">
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
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-save mr-2"></i> Save Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
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
        function addTechnology() {
            const container = document.getElementById('technologies-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 technology-item';
            div.innerHTML = `
                <input type="text"
                       name="technologies[]"
                       class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                       placeholder="e.g., Laravel, Vue.js, MySQL">
                <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.querySelector('img').src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
