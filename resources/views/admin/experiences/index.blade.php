@extends('layouts.app')

@section('title', 'Manage Experiences - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Experiences</h1>
                    <p class="text-white/40 font-light">Manage your work experience and employment history</p>
                </div>

                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <a href="{{ route('admin.experiences.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span>Add Experience</span>
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

    <!-- Experiences List -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($experiences->count() > 0)
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Company</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Position</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Period</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Order</th>
                                <th class="px-6 py-4 text-right text-xs font-light text-white/60 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($experiences as $experience)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($experience->company_logo)
                                        <img src="{{ Storage::url($experience->company_logo) }}" alt="{{ $experience->company }}" class="w-10 h-10 rounded-lg object-cover bg-white/5">
                                        @else
                                        <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center">
                                            <i class="fas fa-building text-white/30"></i>
                                        </div>
                                        @endif
                                        <div class="text-sm font-light text-white/80">{{ $experience->company }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-light text-white/80">{{ $experience->position }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $experience->location ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-white/60 font-light">
                                        {{ $experience->start_date ? \Carbon\Carbon::parse($experience->start_date)->format('M Y') : '-' }}
                                        -
                                        {{ $experience->is_current ? 'Present' : ($experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : '-') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($experience->is_current)
                                    <span class="inline-flex items-center px-2 py-1 bg-green-500/10 border border-green-500/30 rounded text-xs text-green-400 font-light">
                                        <i class="fas fa-circle text-[6px] mr-1.5"></i> Current
                                    </span>
                                    @else
                                    <span class="text-white/40 text-xs font-light">Past</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $experience->order ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="p-2 hover:bg-white/10 rounded transition-colors" title="Edit">
                                            <i class="fas fa-edit text-white/60 hover:text-white/80"></i>
                                        </a>
                                        <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this experience?');">
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
                {{ $experiences->links() }}
            </div>
            @else
            <div class="text-center py-16 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-white/5 flex items-center justify-center">
                    <i class="fas fa-briefcase text-3xl text-white/20"></i>
                </div>
                <h3 class="text-xl font-light text-white/60 mb-2">No experiences yet</h3>
                <p class="text-white/40 text-sm font-light mb-6">Start by adding your first work experience</p>
                <a href="{{ route('admin.experiences.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                    <i class="fas fa-plus"></i>
                    <span>Add Experience</span>
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
