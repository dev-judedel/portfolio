@extends('layouts.app')

@section('title', 'Edit Experience - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Edit Experience</h1>
                <p class="text-white/40 font-light">Update work experience information</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" enctype="multipart/form-data" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf
                @method('PUT')

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Company -->
                    <div>
                        <label for="company" class="block text-sm font-light text-white/80 mb-2">
                            Company Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="company"
                               id="company"
                               value="{{ old('company', $experience->company) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Acme Corporation"
                               required>
                        @error('company')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-light text-white/80 mb-2">
                            Position/Job Title <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="position"
                               id="position"
                               value="{{ old('position', $experience->position) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Senior Full Stack Developer"
                               required>
                        @error('position')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-light text-white/80 mb-2">
                            Location
                        </label>
                        <input type="text"
                               name="location"
                               id="location"
                               value="{{ old('location', $experience->location) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., San Francisco, CA / Remote">
                        @error('location')
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
                            rows="5"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            placeholder="Describe your role, responsibilities, and achievements...">{{ old('description', $experience->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date Range -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-light text-white/80 mb-2">
                                Start Date <span class="text-red-400">*</span>
                            </label>
                            <input type="date"
                                   name="start_date"
                                   id="start_date"
                                   value="{{ old('start_date', $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   required>
                            @error('start_date')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-light text-white/80 mb-2">
                                End Date
                            </label>
                            <input type="date"
                                   name="end_date"
                                   id="end_date"
                                   value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   {{ old('is_current', $experience->is_current) ? 'disabled' : '' }}>
                            @error('end_date')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Current Position -->
                    <div class="flex items-center gap-3">
                        <input type="hidden" name="is_current" value="0">
                        <input type="checkbox"
                               name="is_current"
                               id="is_current"
                               value="1"
                               {{ old('is_current', $experience->is_current) ? 'checked' : '' }}
                               class="w-5 h-5 bg-white/5 border border-white/10 rounded focus:ring-2 focus:ring-white/10"
                               onchange="document.getElementById('end_date').disabled = this.checked; if(this.checked) document.getElementById('end_date').value = '';">
                        <label for="is_current" class="text-sm font-light text-white/80">
                            I currently work here
                        </label>
                        @error('is_current')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Technologies -->
                    <div>
                        <label class="block text-sm font-light text-white/80 mb-2">
                            Technologies Used
                        </label>
                        <div id="technologies-container" class="space-y-2">
                            @php
                                $technologies = old('technologies', $experience->technologies ?? []);
                            @endphp
                            @if(is_array($technologies) && count($technologies) > 0)
                                @foreach($technologies as $tech)
                                <div class="flex gap-2 technology-item">
                                    <input type="text"
                                           name="technologies[]"
                                           value="{{ $tech }}"
                                           class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                           placeholder="e.g., Laravel, React, AWS">
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
                                           placeholder="e.g., Laravel, React, AWS">
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

                    <!-- Company Logo -->
                    <div>
                        <label for="company_logo" class="block text-sm font-light text-white/80 mb-2">
                            Company Logo
                        </label>
                        @if($experience->company_logo)
                        <div class="mb-4">
                            <img src="{{ Storage::url($experience->company_logo) }}" alt="{{ $experience->company }}" class="w-32 h-32 object-cover rounded-lg border border-white/10">
                            <p class="mt-2 text-xs text-white/40 font-light">Current logo (upload new to replace)</p>
                        </div>
                        @endif
                        <input type="file"
                               name="company_logo"
                               id="company_logo"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-white/10 file:text-white/80 file:text-sm file:font-light hover:file:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               onchange="previewImage(this, 'logo-preview')">
                        <p class="mt-2 text-xs text-white/40 font-light">Accepted formats: JPG, PNG, WEBP. Max size: 2MB</p>
                        @error('company_logo')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                        <div id="logo-preview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-white/10">
                        </div>
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
                               value="{{ old('order', $experience->order ?? 0) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="0">
                        <p class="mt-2 text-xs text-white/40 font-light">Lower numbers appear first</p>
                        @error('order')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-save mr-2"></i> Update Experience
                    </button>
                    <a href="{{ route('admin.experiences.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
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
                       placeholder="e.g., Laravel, React, AWS">
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
