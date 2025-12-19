@extends('layouts.app')

@section('title', 'Manage Testimonials - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Testimonials</h1>
                    <p class="text-white/40 font-light">Manage client testimonials and reviews</p>
                </div>

                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span>Add Testimonial</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm font-light opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Testimonials List -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($testimonials->count() > 0)
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Position</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Testimonial</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Rating</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Featured</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Order</th>
                                <th class="px-6 py-4 text-right text-xs font-light text-white/60 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($testimonials as $testimonial)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($testimonial->client_image)
                                        <img src="{{ Storage::url($testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" class="w-10 h-10 rounded-full object-cover bg-white/5">
                                        @else
                                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center">
                                            <i class="fas fa-user text-white/30"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-light text-white/80">{{ $testimonial->client_name }}</div>
                                            <div class="text-xs text-white/40 font-light">{{ $testimonial->client_company ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $testimonial->client_position ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-white/60 font-light max-w-xs">
                                        {{ Str::limit($testimonial->testimonial, 80) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            @else
                                            <i class="far fa-star text-white/20 text-xs"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-1 text-xs text-white/40">{{ $testimonial->rating }}/5</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($testimonial->is_featured)
                                    <span class="inline-flex items-center px-2 py-1 bg-white/10 rounded text-xs text-white/80 font-light">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i> Yes
                                    </span>
                                    @else
                                    <span class="text-white/40 text-xs font-light">No</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $testimonial->order ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 hover:bg-white/10 rounded transition-colors" title="Edit">
                                            <i class="fas fa-edit text-white/60 hover:text-white/80"></i>
                                        </a>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 hover:bg-red-500/10 rounded transition-colors" title="Delete">
                                                <i class="fas fa-trash text-red-400/60 hover:text-red-400"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $testimonials->links() }}
            </div>
            @else
            <div class="text-center py-16 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-white/5 flex items-center justify-center">
                    <i class="fas fa-quote-right text-3xl text-white/20"></i>
                </div>
                <h3 class="text-xl font-light text-white/60 mb-2">No testimonials yet</h3>
                <p class="text-white/40 text-sm font-light mb-6">Start by adding your first testimonial</p>
                <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                    <i class="fas fa-plus"></i>
                    <span>Add Testimonial</span>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Back Button -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-white/60 hover:text-white/80 font-light text-sm transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Dashboard</span>
            </a>
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
