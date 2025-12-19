@extends('layouts.app')

@section('title', 'Manage Services - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Services</h1>
                    <p class="text-white/40 font-light">Manage your professional services and offerings</p>
                </div>

                <div class="opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span>Add Service</span>
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

    <!-- Services List -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($services->count() > 0)
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Icon</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Features</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Featured</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Order</th>
                                <th class="px-6 py-4 text-right text-xs font-light text-white/60 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($services as $service)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="text-sm font-light text-white/80">{{ $service->title }}</div>
                                        <div class="text-xs text-white/40 font-light">{{ Str::limit($service->description, 50) }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($service->icon)
                                    <i class="{{ $service->icon }} text-xl text-white/40"></i>
                                    @else
                                    <span class="text-white/30 text-xs font-light">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($service->features && is_array($service->features))
                                    <span class="px-2 py-1 bg-white/10 rounded text-xs text-white/60 font-light">
                                        {{ count($service->features) }} features
                                    </span>
                                    @else
                                    <span class="text-white/40 text-xs font-light">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($service->price)
                                    <div class="text-sm text-white/60 font-light">
                                        ${{ $service->price }}{{ $service->price_period ? '/' . $service->price_period : '' }}
                                    </div>
                                    @else
                                    <span class="text-white/40 text-xs font-light">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($service->is_featured)
                                    <span class="inline-flex items-center px-2 py-1 bg-white/10 rounded text-xs text-white/80 font-light">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i> Yes
                                    </span>
                                    @else
                                    <span class="text-white/40 text-xs font-light">No</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-white/60 font-light">{{ $service->order ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="p-2 hover:bg-white/10 rounded transition-colors" title="Edit">
                                            <i class="fas fa-edit text-white/60 hover:text-white/80"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                {{ $services->links() }}
            </div>
            @else
            <div class="text-center py-16 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-white/5 flex items-center justify-center">
                    <i class="fas fa-concierge-bell text-3xl text-white/20"></i>
                </div>
                <h3 class="text-xl font-light text-white/60 mb-2">No services yet</h3>
                <p class="text-white/40 text-sm font-light mb-6">Start by adding your first service</p>
                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white text-sm font-light uppercase tracking-wider transition-all duration-300">
                    <i class="fas fa-plus"></i>
                    <span>Add Service</span>
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
