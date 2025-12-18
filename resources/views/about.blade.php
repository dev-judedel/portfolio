@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
    <!-- About Hero -->
    <section class="py-20 bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-slate-900 dark:to-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-4">About Me</h1>
                <p class="text-xl text-gray-600 dark:text-gray-400">Learn more about my journey and expertise</p>
            </div>

            @if($profile)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-500 opacity-20"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas fa-user-circle text-9xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $profile->full_name }}</h2>
                    <h3 class="text-xl text-indigo-600 dark:text-indigo-400 mb-6">{{ $profile->title }}</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                        {!! nl2br(e($profile->bio)) !!}
                    </div>

                    @if($profile->cv_file)
                    <div class="mt-8">
                        <a href="{{ route('download.cv') }}" class="btn-primary px-6 py-3 rounded-lg">
                            <i class="fas fa-download mr-2"></i> Download CV
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Skills Section -->
    <section class="py-20 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white text-center mb-12">Skills & Expertise</h2>

            @foreach($skillsByCategory as $category => $categorySkills)
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">{{ $category }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($categorySkills as $skill)
                    <div class="skill-item">
                        <div class="flex justify-between items-center mb-2">
                            <span class="flex items-center text-gray-900 dark:text-white font-medium">
                                <i class="{{ $skill->icon }} mr-2 text-indigo-600"></i>
                                {{ $skill->name }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Experience Timeline -->
    <section class="py-20 bg-gray-50 dark:bg-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white text-center mb-12">Work Experience</h2>

            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-indigo-200 dark:bg-indigo-800 hidden md:block"></div>

                @foreach($experiences as $index => $experience)
                <div class="relative mb-12">
                    <div class="flex flex-col md:flex-row items-center justify-between md:{{ $index % 2 == 0 ? 'flex-row' : 'flex-row-reverse' }}">
                        <div class="w-full md:w-5/12 mb-4 md:mb-0"></div>
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-indigo-600 dark:bg-indigo-400 rounded-full border-4 border-white dark:border-slate-800 hidden md:block"></div>

                        <div class="w-full md:w-5/12">
                            <div class="experience-card md:{{ $index % 2 == 0 ? 'text-right' : 'text-left' }}">
                                <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">
                                    {{ $experience->formatted_date_range }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-2">{{ $experience->position }}</h3>
                                <h4 class="text-lg text-gray-700 dark:text-gray-300 mb-2">{{ $experience->company }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $experience->description }}</p>
                                <div class="flex flex-wrap gap-2 md:{{ $index % 2 == 0 ? 'justify-end' : 'justify-start' }}">
                                    @foreach($experience->technologies as $tech)
                                        <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 text-xs rounded">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .btn-primary {
            @apply inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition-colors duration-300;
        }

        .skill-item {
            @apply p-4 bg-gray-50 dark:bg-slate-800 rounded-lg;
        }

        .experience-card {
            @apply p-6 bg-white dark:bg-slate-900 rounded-lg shadow-md;
        }
    </style>
@endsection
