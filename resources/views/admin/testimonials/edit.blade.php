@extends('layouts.app')

@section('title', 'Edit Testimonial - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Edit Testimonial</h1>
                <p class="text-white/40 font-light">Update client testimonial information</p>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                @csrf
                @method('PUT')

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6">

                    <!-- Client Name -->
                    <div>
                        <label for="client_name" class="block text-sm font-light text-white/80 mb-2">
                            Client Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               name="client_name"
                               id="client_name"
                               value="{{ old('client_name', $testimonial->client_name) }}"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               placeholder="e.g., John Doe"
                               required>
                        @error('client_name')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position & Company -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="client_position" class="block text-sm font-light text-white/80 mb-2">
                                Client Position
                            </label>
                            <input type="text"
                                   name="client_position"
                                   id="client_position"
                                   value="{{ old('client_position', $testimonial->client_position) }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., CEO">
                            @error('client_position')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client_company" class="block text-sm font-light text-white/80 mb-2">
                                Client Company
                            </label>
                            <input type="text"
                                   name="client_company"
                                   id="client_company"
                                   value="{{ old('client_company', $testimonial->client_company) }}"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                                   placeholder="e.g., Acme Inc">
                            @error('client_company')
                            <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Testimonial -->
                    <div>
                        <label for="testimonial" class="block text-sm font-light text-white/80 mb-2">
                            Testimonial <span class="text-red-400">*</span>
                        </label>
                        <textarea
                            name="testimonial"
                            id="testimonial"
                            rows="5"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                            placeholder="What the client said about your work..."
                            required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                        @error('testimonial')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rating -->
                    <div>
                        <label class="block text-sm font-light text-white/80 mb-2">
                            Rating <span class="text-red-400">*</span>
                        </label>
                        <div class="flex items-center gap-4">
                            @for($i = 1; $i <= 5; $i++)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio"
                                       name="rating"
                                       value="{{ $i }}"
                                       {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}
                                       class="w-5 h-5 bg-white/5 border border-white/10 text-yellow-400 focus:ring-2 focus:ring-yellow-400/50"
                                       required>
                                <span class="flex items-center gap-1">
                                    @for($j = 1; $j <= $i; $j++)
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @endfor
                                    <span class="text-white/60 text-sm font-light ml-1">{{ $i }}</span>
                                </span>
                            </label>
                            @endfor
                        </div>
                        @error('rating')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Client Image -->
                    <div>
                        <label for="client_image" class="block text-sm font-light text-white/80 mb-2">
                            Client Photo
                        </label>
                        @if($testimonial->client_image)
                        <div class="mb-4">
                            <img src="{{ Storage::url($testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" class="w-32 h-32 object-cover rounded-full border border-white/10">
                            <p class="mt-2 text-xs text-white/40 font-light">Current photo (upload new to replace)</p>
                        </div>
                        @endif
                        <input type="file"
                               name="client_image"
                               id="client_image"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-white/10 file:text-white/80 file:text-sm file:font-light hover:file:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"
                               onchange="previewImage(this, 'image-preview')">
                        <p class="mt-2 text-xs text-white/40 font-light">Accepted formats: JPG, PNG, WEBP. Max size: 2MB. Recommended: Square image</p>
                        @error('client_image')
                        <p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>
                        @enderror
                        <div id="image-preview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="w-32 h-32 object-cover rounded-full border border-white/10">
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
                                   value="{{ old('order', $testimonial->order ?? 0) }}"
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
                                       {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}
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
                        <i class="fas fa-save mr-2"></i> Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
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
