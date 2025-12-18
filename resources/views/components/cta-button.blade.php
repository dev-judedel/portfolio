{{-- CTA Button Component - Global Design System --}}
@props(['href' => '#', 'variant' => 'primary', 'icon' => null])

@php
    $classes = match($variant) {
        'primary' => 'group relative inline-flex items-center px-8 py-3.5 overflow-hidden',
        'secondary' => 'group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500',
        'link' => 'group inline-flex items-center gap-3 text-white/60 hover:text-white transition-colors font-light',
        default => 'group relative inline-flex items-center px-8 py-3.5 overflow-hidden'
    };
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    @if($variant === 'primary')
        <div class="absolute inset-0 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg transition-all duration-500 group-hover:bg-white/10 group-hover:border-white/30"></div>
        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
        </div>
        <span class="relative flex items-center justify-center gap-2 text-white font-light">
            @if($icon)
                <i class="{{ $icon }} text-sm"></i>
            @endif
            <span>{{ $slot }}</span>
        </span>
    @else
        <span class="text-white font-light">{{ $slot }}</span>
        <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
    @endif
</a>
