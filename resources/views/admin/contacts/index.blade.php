@extends('layouts.app')

@section('title', 'Contact Messages - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Contact Messages</h1>
                    <p class="text-white/40 font-light">View and manage contact form submissions</p>
                </div>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm font-light opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Messages List -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($contacts->count() > 0)
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-light text-white/60 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-right text-xs font-light text-white/60 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($contacts as $contact)
                            <tr class="hover:bg-white/5 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-light text-white/80">{{ $contact->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-light text-white/60">{{ $contact->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-light text-white/70 max-w-xs truncate">{{ $contact->subject }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($contact->status === 'new')
                                        <span class="px-2 py-1 bg-blue-500/20 border border-blue-500/30 rounded text-xs text-blue-400 font-light">New</span>
                                    @elseif($contact->status === 'read')
                                        <span class="px-2 py-1 bg-white/10 border border-white/20 rounded text-xs text-white/60 font-light">Read</span>
                                    @elseif($contact->status === 'replied')
                                        <span class="px-2 py-1 bg-green-500/20 border border-green-500/30 rounded text-xs text-green-400 font-light">Replied</span>
                                    @elseif($contact->status === 'archived')
                                        <span class="px-2 py-1 bg-yellow-500/20 border border-yellow-500/30 rounded text-xs text-yellow-400 font-light">Archived</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-xs text-white/50 font-light">{{ $contact->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-white/30 font-light">{{ $contact->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="px-3 py-1.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded text-white/70 hover:text-white text-xs font-light transition-all" title="View">
                                            <i class="fas fa-eye mr-1"></i> View
                                        </a>

                                        @if($contact->status === 'new')
                                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-2 hover:bg-white/10 rounded transition-colors" title="Mark as Read">
                                                <i class="fas fa-check text-white/60 hover:text-white/80"></i>
                                            </button>
                                        </form>
                                        @elseif($contact->status === 'read')
                                        <form action="{{ route('admin.contacts.mark-unread', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-2 hover:bg-white/10 rounded transition-colors" title="Mark as Unread">
                                                <i class="fas fa-envelope text-white/60 hover:text-white/80"></i>
                                            </button>
                                        </form>
                                        @endif

                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
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
                {{ $contacts->links() }}
            </div>
            @else
            <div class="text-center py-16 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-white/5 flex items-center justify-center">
                    <i class="fas fa-envelope text-3xl text-white/20"></i>
                </div>
                <h3 class="text-xl font-light text-white/60 mb-2">No messages yet</h3>
                <p class="text-white/40 text-sm font-light">Contact form submissions will appear here</p>
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
