@extends('layouts.app')

@section('title', 'View Message - Admin')

@section('content')
    <!-- Header -->
    <section class="relative py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.1s;">
                <h1 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Message Details</h1>
                <p class="text-white/40 font-light">Contact form submission</p>
            </div>

            @if(session('success'))
            <div class="mt-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm font-light">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Message Details -->
    <section class="pb-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-8 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">

                <!-- Status Badge -->
                <div class="flex items-center justify-between">
                    <div>
                        @if($contact->status === 'new')
                        <span class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded text-sm font-light border border-blue-500/30">New Message</span>
                        @elseif($contact->status === 'read')
                        <span class="px-3 py-1.5 bg-white/10 text-white/60 rounded text-sm font-light">Read</span>
                        @elseif($contact->status === 'replied')
                        <span class="px-3 py-1.5 bg-green-500/20 text-green-400 rounded text-sm font-light border border-green-500/30">Replied</span>
                        @elseif($contact->status === 'archived')
                        <span class="px-3 py-1.5 bg-yellow-500/20 text-yellow-400 rounded text-sm font-light border border-yellow-500/30">Archived</span>
                        @endif
                    </div>
                    <div class="text-xs text-white/50 font-light">
                        {{ $contact->created_at->format('M d, Y \a\t h:i A') }}
                    </div>
                </div>

                <div class="h-px bg-white/10"></div>

                <!-- Sender Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-2">Name</label>
                        <div class="text-white/80 font-light">{{ $contact->name }}</div>
                    </div>
                    <div>
                        <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-2">Email</label>
                        <a href="mailto:{{ $contact->email }}" class="text-white/80 hover:text-white font-light transition-colors">
                            {{ $contact->email }}
                        </a>
                    </div>
                </div>

                @if($contact->phone)
                <div>
                    <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-2">Phone</label>
                    <a href="tel:{{ $contact->phone }}" class="text-white/80 hover:text-white font-light transition-colors">
                        {{ $contact->phone }}
                    </a>
                </div>
                @endif

                <div>
                    <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-2">Subject</label>
                    <div class="text-white/80 font-light">{{ $contact->subject }}</div>
                </div>

                <div class="h-px bg-white/10"></div>

                <!-- Message -->
                <div>
                    <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-3">Message</label>
                    <div class="p-6 bg-white/5 rounded-lg border border-white/10">
                        <p class="text-white/70 font-light leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
                    </div>
                </div>

                <!-- Additional Info -->
                @if($contact->ip_address)
                <div>
                    <label class="text-sm text-white/40 font-light uppercase tracking-wider block mb-2">IP Address</label>
                    <div class="text-white/50 font-light text-sm">{{ $contact->ip_address }}</div>
                </div>
                @endif

            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center gap-4 opacity-0 animate-fade-in" style="animation-delay: 0.3s;">
                @if($contact->status === 'new')
                <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-check mr-2"></i> Mark as Read
                    </button>
                </form>
                @else
                <form action="{{ route('admin.contacts.mark-unread', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 rounded-lg text-white/80 hover:text-white font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-envelope mr-2"></i> Mark as Unread
                    </button>
                </form>
                @endif

                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-500/10 hover:bg-red-500/20 border border-red-500/30 hover:border-red-500/40 rounded-lg text-red-400 hover:text-red-300 font-light uppercase tracking-wider transition-all duration-300">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>

                <a href="{{ route('admin.contacts.index') }}" class="px-6 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg text-white/60 hover:text-white/80 font-light uppercase tracking-wider transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Messages
                </a>
            </div>
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
