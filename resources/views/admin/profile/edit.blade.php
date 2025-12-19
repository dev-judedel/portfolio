@extends('layouts.app')

@section('title', 'Edit Portfolio Profile - Admin')

@section('content')
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Edit Portfolio Profile</h1>
                <p class="text-white/40 font-light">Update your professional information</p>
            </div>

            @if(session('success'))
            <div class="mt-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm font-light">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </section>

    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Personal Information -->
                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Personal Information</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-light text-white/80 mb-2">Full Name <span class="text-red-400">*</span></label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $profile->full_name) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" required>
                            @error('full_name')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-light text-white/80 mb-2">Professional Title <span class="text-red-400">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title', $profile->title) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="e.g., Full-Stack Developer" required>
                            @error('title')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="tagline" class="block text-sm font-light text-white/80 mb-2">Tagline</label>
                        <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $profile->tagline) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="Your professional tagline">
                        @error('tagline')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="short_bio" class="block text-sm font-light text-white/80 mb-2">Short Bio</label>
                        <textarea name="short_bio" id="short_bio" rows="3" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="Brief description for homepage">{{ old('short_bio', $profile->short_bio) }}</textarea>
                        @error('short_bio')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-light text-white/80 mb-2">Full Biography <span class="text-red-400">*</span></label>
                        <textarea name="bio" id="bio" rows="8" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" required>{{ old('bio', $profile->bio) }}</textarea>
                        @error('bio')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Contact Information</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-light text-white/80 mb-2">Email <span class="text-red-400">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" required>
                            @error('email')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-light text-white/80 mb-2">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('phone')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-light text-white/80 mb-2">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $profile->location) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="City, Country">
                        @error('location')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Professional Stats</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="years_experience" class="block text-sm font-light text-white/80 mb-2">Years of Experience</label>
                            <input type="number" name="years_experience" id="years_experience" value="{{ old('years_experience', $profile->years_experience) }}" min="0" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('years_experience')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="projects_completed" class="block text-sm font-light text-white/80 mb-2">Projects Completed</label>
                            <input type="number" name="projects_completed" id="projects_completed" value="{{ old('projects_completed', $profile->projects_completed) }}" min="0" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('projects_completed')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="happy_clients" class="block text-sm font-light text-white/80 mb-2">Happy Clients</label>
                            <input type="number" name="happy_clients" id="happy_clients" value="{{ old('happy_clients', $profile->happy_clients) }}" min="0" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                            @error('happy_clients')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Social Media Links</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-light text-white/80 mb-2"><i class="fab fa-github mr-2"></i>GitHub</label>
                            <input type="url" name="social_links[github]" value="{{ old('social_links.github', $profile->social_links['github'] ?? '') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="https://github.com/username">
                        </div>

                        <div>
                            <label class="block text-sm font-light text-white/80 mb-2"><i class="fab fa-linkedin mr-2"></i>LinkedIn</label>
                            <input type="url" name="social_links[linkedin]" value="{{ old('social_links.linkedin', $profile->social_links['linkedin'] ?? '') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="https://linkedin.com/in/username">
                        </div>

                        <div>
                            <label class="block text-sm font-light text-white/80 mb-2"><i class="fab fa-twitter mr-2"></i>Twitter</label>
                            <input type="url" name="social_links[twitter]" value="{{ old('social_links.twitter', $profile->social_links['twitter'] ?? '') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="https://twitter.com/username">
                        </div>

                        <div>
                            <label class="block text-sm font-light text-white/80 mb-2"><i class="fab fa-dribbble mr-2"></i>Dribbble</label>
                            <input type="url" name="social_links[dribbble]" value="{{ old('social_links.dribbble', $profile->social_links['dribbble'] ?? '') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="https://dribbble.com/username">
                        </div>
                    </div>
                </div>

                <!-- Files -->
                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Files</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="profile_image" class="block text-sm font-light text-white/80 mb-2">Profile Image</label>
                            @if($profile->profile_image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Current profile" class="w-32 h-32 rounded-full object-cover border border-white/10">
                            </div>
                            @endif
                            <input type="file" name="profile_image" id="profile_image" accept="image/jpeg,image/png,image/jpg" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-light file:bg-white/10 file:text-white/80 hover:file:bg-white/20 transition-all">
                            <p class="mt-2 text-xs text-white/40 font-light">JPG, PNG (max 2MB)</p>
                            @error('profile_image')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="cv_file" class="block text-sm font-light text-white/80 mb-2">CV / Resume (PDF)</label>
                            @if($profile->cv_file)
                            <div class="mb-3">
                                <a href="{{ asset('storage/' . $profile->cv_file) }}" target="_blank" class="text-sm text-white/60 hover:text-white/80 transition-colors"><i class="fas fa-file-pdf mr-2"></i>Current CV</a>
                            </div>
                            @endif
                            <input type="file" name="cv_file" id="cv_file" accept="application/pdf" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-light file:bg-white/10 file:text-white/80 hover:file:bg-white/20 transition-all">
                            <p class="mt-2 text-xs text-white/40 font-light">PDF only (max 10MB)</p>
                            @error('cv_file')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4 opacity-0 animate-fade-in" style="animation-delay: 0.7s;">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300"><i class="fas fa-save mr-2"></i> Save Profile</button>
                    <a href="{{ route('admin.dashboard') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </section>

    <style>
        @keyframes fadeIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}.animate-fade-in{animation:fadeIn 1s ease-out forwards}@keyframes fadeInUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}.animate-fade-in-up{animation:fadeInUp 0.8s ease-out forwards}
    </style>
@endsection
