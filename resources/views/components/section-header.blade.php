{{-- Section Header Component - Global Design System --}}
<div class="text-center mb-20 space-y-6">
    <div class="flex items-center justify-center gap-4 mb-4">
        <div class="w-12 h-px bg-white/20"></div>
        <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">{{ $category ?? 'Section' }}</span>
        <div class="w-12 h-px bg-white/20"></div>
    </div>
    <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">{{ $title }}</h2>
    @if(isset($subtitle))
    <p class="text-white/40 font-light text-sm">{{ $subtitle }}</p>
    @endif
</div>
