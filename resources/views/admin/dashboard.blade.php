@extends('layouts.app')

@section('title', 'Dashboard - Admin')

@section('content')
    <!-- Dashboard Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Dashboard</h1>
                    <p class="text-white/40 font-light">Welcome back, {{ auth()->user()->name }}</p>
                </div>
                
                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 text-sm font-light uppercase tracking-wider transition-all duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Overview -->
    <section class="py-8 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Projects Count -->
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group opacity-0 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <p class="text-sm text-white/40 font-light uppercase tracking-wider mb-2">Projects</p>
                            <p class="text-4xl font-extralight text-white/90">{{ $stats['projects'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                            <i class="fas fa-briefcase text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                    </div>
                </div>

                <!-- Skills Count -->
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <p class="text-sm text-white/40 font-light uppercase tracking-wider mb-2">Skills</p>
                            <p class="text-4xl font-extralight text-white/90">{{ $stats['skills'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                            <i class="fas fa-code text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts Count -->
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <p class="text-sm text-white/40 font-light uppercase tracking-wider mb-2">Blog Posts</p>
                            <p class="text-4xl font-extralight text-white/90">{{ $stats['blog_posts'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                            <i class="fas fa-newspaper text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                    </div>
                </div>

                <!-- Messages Count -->
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <p class="text-sm text-white/40 font-light uppercase tracking-wider mb-2">Messages</p>
                            <p class="text-4xl font-extralight text-white/90">{{ $stats['contacts'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                            <i class="fas fa-envelope text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 opacity-0 animate-fade-in" style="animation-delay: 0.5s;">
                <h2 class="text-2xl md:text-3xl font-extralight text-white tracking-tight">Quick Actions</h2>
                <p class="text-white/40 font-light text-sm mt-2">Manage your portfolio content</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Manage Profile -->
                <a href="{{ route('profile.edit') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-user text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">Edit Profile</h3>
                            <p class="text-white/40 text-sm font-light">Update your personal information and bio</p>
                        </div>
                    </div>
                </a>

                <!-- Manage Projects -->
                <a href="{{ route('admin.projects.index') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-briefcase text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">Manage Projects</h3>
                            <p class="text-white/40 text-sm font-light">Add, edit, or delete portfolio projects</p>
                        </div>
                    </div>
                </a>

                <!-- Manage Skills -->
                <a href="{{ route('admin.skills.index') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-code text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">Manage Skills</h3>
                            <p class="text-white/40 text-sm font-light">Update your technical skills and proficiency</p>
                        </div>
                    </div>
                </a>

                <!-- Manage Blog -->
                <a href="{{ route('admin.blog.posts.index') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-newspaper text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">Manage Blog</h3>
                            <p class="text-white/40 text-sm font-light">Create and manage your blog posts</p>
                        </div>
                    </div>
                </a>

                <!-- View Messages -->
                <a href="{{ route('admin.contacts.index') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-envelope text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">View Messages</h3>
                            <p class="text-white/40 text-sm font-light">Check contact form submissions</p>
                            @if(isset($stats['unread_contacts']) && $stats['unread_contacts'] > 0)
                            <span class="inline-block mt-2 px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded border border-red-500/30">
                                {{ $stats['unread_contacts'] }} new
                            </span>
                            @endif
                        </div>
                    </div>
                </a>

                <!-- Settings -->
                <a href="{{ route('admin.settings.index') }}" class="group p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors flex-shrink-0">
                            <i class="fas fa-cog text-white/40 group-hover:text-white/60 transition-colors"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-light text-white/90 group-hover:text-white mb-2 transition-colors">Settings</h3>
                            <p class="text-white/40 text-sm font-light">Configure site settings and preferences</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Recent Activity -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- Recent Projects -->
                @if(isset($recentProjects) && $recentProjects->count() > 0)
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="mb-6">
                        <h3 class="text-xl font-light text-white/90">Recent Projects</h3>
                        <p class="text-white/40 text-sm font-light mt-1">Latest portfolio additions</p>
                    </div>
                    
                    <div class="space-y-4">
                        @foreach($recentProjects as $project)
                        <div class="p-6 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-300">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <h4 class="text-white/80 font-light mb-1">{{ $project->title }}</h4>
                                    <p class="text-white/40 text-xs font-light">{{ $project->category }}</p>
                                </div>
                                <span class="text-[10px] text-white/30 uppercase tracking-wider">
                                    {{ $project->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Recent Messages -->
                @if(isset($recentContacts) && $recentContacts->count() > 0)
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="mb-6">
                        <h3 class="text-xl font-light text-white/90">Recent Messages</h3>
                        <p class="text-white/40 text-sm font-light mt-1">Latest contact submissions</p>
                    </div>
                    
                    <div class="space-y-4">
                        @foreach($recentContacts as $contact)
                        <div class="p-6 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-300">
                            <div class="flex items-start justify-between gap-4 mb-2">
                                <h4 class="text-white/80 font-light">{{ $contact->name }}</h4>
                                <span class="text-[10px] text-white/30 uppercase tracking-wider">
                                    {{ $contact->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-white/50 text-sm font-light line-clamp-2">{{ $contact->message }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- View Portfolio Button -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('home') }}" 
               target="_blank"
               class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                <span class="text-white font-light">View Live Portfolio</span>
                <i class="fas fa-external-link-alt text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </section>

    <!-- Custom Animations -->
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
