@extends('layouts.app')

@section('title', 'Site Settings - Admin')

@section('content')
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Site Settings</h1>
                <p class="text-white/40 font-light">Configure site-wide settings</p>
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
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">General Settings</h2>

                    <div>
                        <label for="site_name" class="block text-sm font-light text-white/80 mb-2">Site Name <span class="text-red-400">*</span></label>
                        <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" required>
                        @error('site_name')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="site_description" class="block text-sm font-light text-white/80 mb-2">Site Description</label>
                        <textarea name="site_description" id="site_description" rows="3" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">{{ old('site_description', $settings['site_description']) }}</textarea>
                        @error('site_description')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="site_keywords" class="block text-sm font-light text-white/80 mb-2">SEO Keywords</label>
                        <input type="text" name="site_keywords" id="site_keywords" value="{{ old('site_keywords', $settings['site_keywords']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light" placeholder="keyword1, keyword2">
                        @error('site_keywords')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Contact Information</h2>

                    <div>
                        <label for="contact_email" class="block text-sm font-light text-white/80 mb-2">Contact Email</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                        @error('contact_email')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-light text-white/80 mb-2">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light">
                        @error('contact_phone')<p class="mt-2 text-sm text-red-400 font-light">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <h2 class="text-xl font-light text-white/90 border-b border-white/10 pb-3">Social Media</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div><label class="block text-sm font-light text-white/80 mb-2">GitHub URL</label><input type="url" name="social_github" value="{{ old('social_github', $settings['social_github']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"></div>
                        <div><label class="block text-sm font-light text-white/80 mb-2">LinkedIn URL</label><input type="url" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"></div>
                        <div><label class="block text-sm font-light text-white/80 mb-2">Twitter URL</label><input type="url" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"></div>
                        <div><label class="block text-sm font-light text-white/80 mb-2">Instagram URL</label><input type="url" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram']) }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 focus:border-white/30 rounded-lg text-white/90 placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all font-light"></div>
                    </div>
                </div>

                <div class="flex items-center gap-4 opacity-0 animate-fade-in" style="animation-delay: 0.5s;">
                    <button type="submit" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300"><i class="fas fa-save mr-2"></i> Save Settings</button>
                    <a href="{{ route('admin.dashboard') }}" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </section>

    <style>
        @keyframes fadeIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}.animate-fade-in{animation:fadeIn 1s ease-out forwards}@keyframes fadeInUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}.animate-fade-in-up{animation:fadeInUp 0.8s ease-out forwards}
    </style>
@endsection
