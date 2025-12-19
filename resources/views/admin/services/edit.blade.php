@extends('layouts.app')

@section('title', 'Edit Service - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Edit Service</h1>
                <p class="text-white/40 font-light">Update service information</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf
                @method('PUT')

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-light text-white/80 mb-2">
                            Service Title <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $service->title) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., Web Development"
                               required>
                        @error('title')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-light text-white/80 mb-2">
                            Description <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            placeholder="Describe the service you offer..."
                            required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
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
                               value="{{ old('icon', $service->icon) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., fas fa-laptop-code, fas fa-paint-brush">
                        <p class="mt-2 text-xs text-white/40 font-light">Use Font Awesome icon classes</p>
                        @error('icon')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Features -->
                    <div>
                        <label class="block text-sm font-light text-white/80 mb-2">
                            Features/Highlights
                        </label>
                        <div id="features-container" class="space-y-2">
                            @php
                                $features = old('features', $service->features ?? []);
                            @endphp
                            @if(is_array($features) && count($features) > 0)
                                @foreach($features as $feature)
                                <div class="flex gap-2 feature-item">
                                    <input type="text"
                                           name="features[]"
                                           value="{{ $feature }}"
                                           class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                           placeholder="e.g., Responsive Design, Custom Solutions">
                                    <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                @endforeach
                            @else
                                <div class="flex gap-2 feature-item">
                                    <input type="text"
                                           name="features[]"
                                           class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                           placeholder="e.g., Responsive Design, Custom Solutions">
                                    <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <button type="button" onclick="addFeature()" class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light transition-all">
                            <i class="fas fa-plus"></i>
                            <span>Add Feature</span>
                        </button>
                        @error('features')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price & Period -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="price" class="block text-sm font-light text-white/80 mb-2">
                                Price (Optional)
                            </label>
                            <input type="number"
                                   name="price"
                                   id="price"
                                   step="0.01"
                                   min="0"
                                   value="{{ old('price', $service->price) }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., 999.99">
                            @error('price')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price_period" class="block text-sm font-light text-white/80 mb-2">
                                Price Period
                            </label>
                            <input type="text"
                                   name="price_period"
                                   id="price_period"
                                   value="{{ old('price_period', $service->price_period) }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., month, hour, project">
                            @error('price_period')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
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
                                   value="{{ old('order', $service->order ?? 0) }}"
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
                                       {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
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
                        <i class="fas fa-save mr-2"></i> Update Service
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
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
        function addFeature() {
            const container = document.getElementById('features-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 feature-item';
            div.innerHTML = `
                <input type="text"
                       name="features[]"
                       class="flex-1 px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                       placeholder="e.g., Responsive Design, Custom Solutions">
                <button type="button" onclick="this.parentElement.remove()" class="px-4 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 transition-all">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
        }
    </script>
@endsection
