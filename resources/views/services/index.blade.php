@extends('layouts.app')

@section('title', 'Services - JUDE')

@section('content')
    <!-- Services Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-10">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center relative z-10">
            <span class="section-label hero-animate hero-animate-1">What I Offer</span>
            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl text-[var(--color-navy)] mt-4 mb-6 hero-animate hero-animate-2">
                MY SERVICES
            </h1>
            <p class="text-xl text-[var(--body-color-muted)] font-body max-w-2xl mx-auto hero-animate hero-animate-3">
                Professional solutions tailored to bring your digital vision to life.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-24 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div class="card-modern p-8 group scroll-animate" style="transition-delay: {{ $index * 0.1 }}s;">
                        <!-- Icon -->
                        <div class="w-16 h-16 rounded-2xl bg-[var(--color-navy)]/10 flex items-center justify-center mb-6 group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                            <i class="{{ $service->icon ?? 'fas fa-code' }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        
                        <!-- Content -->
                        <h3 class="font-heading text-xl text-[var(--color-navy)] mb-4">{{ strtoupper($service->title) }}</h3>
                        <p class="text-[var(--body-color-muted)] font-body mb-6 leading-relaxed">
                            {{ $service->description }}
                        </p>
                        
                        <!-- Features -->
                        @if($service->features)
                        <ul class="space-y-2 mb-6">
                            @foreach(array_slice($service->features, 0, 4) as $feature)
                            <li class="flex items-center gap-3 text-sm text-[var(--body-color-muted)]">
                                <i class="fas fa-check text-[var(--color-navy)] text-xs"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        
                        <!-- Price -->
                        @if($service->price)
                        <div class="pt-4 border-t border-[var(--border-color)]">
                            <span class="text-sm text-[var(--body-color-muted)]">Starting from</span>
                            <p class="font-heading text-2xl text-[var(--color-navy)]">{{ $service->price }}</p>
                        </div>
                        @endif
                    </div>
                @empty
                    <!-- Default Services -->
                    @php
                        $defaultServices = [
                            ['icon' => 'fas fa-laptop-code', 'title' => 'Web Development', 'desc' => 'Custom web applications built with modern technologies and best practices.', 'features' => ['Responsive Design', 'SEO Optimized', 'Fast Performance', 'Secure Code']],
                            ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Development', 'desc' => 'Cross-platform mobile applications that work seamlessly on iOS and Android.', 'features' => ['Native Performance', 'Offline Support', 'Push Notifications', 'App Store Ready']],
                            ['icon' => 'fas fa-server', 'title' => 'API Development', 'desc' => 'Robust and scalable APIs to power your applications.', 'features' => ['RESTful Design', 'Authentication', 'Documentation', 'Rate Limiting']],
                            ['icon' => 'fas fa-paint-brush', 'title' => 'UI/UX Design', 'desc' => 'User-centered design that creates engaging digital experiences.', 'features' => ['User Research', 'Wireframing', 'Prototyping', 'Visual Design']],
                            ['icon' => 'fas fa-database', 'title' => 'Database Design', 'desc' => 'Efficient database architectures for optimal performance.', 'features' => ['Schema Design', 'Optimization', 'Migration', 'Backup Solutions']],
                            ['icon' => 'fas fa-cogs', 'title' => 'Maintenance', 'desc' => 'Ongoing support and maintenance to keep your applications running smoothly.', 'features' => ['Bug Fixes', 'Updates', 'Monitoring', '24/7 Support']],
                        ];
                    @endphp
                    @foreach($defaultServices as $index => $service)
                    <div class="card-modern p-8 group scroll-animate" style="transition-delay: {{ $index * 0.1 }}s;">
                        <div class="w-16 h-16 rounded-2xl bg-[var(--color-navy)]/10 flex items-center justify-center mb-6 group-hover:bg-[var(--color-navy)] transition-colors duration-300">
                            <i class="{{ $service['icon'] }} text-2xl text-[var(--color-navy)] group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-heading text-xl text-[var(--color-navy)] mb-4">{{ strtoupper($service['title']) }}</h3>
                        <p class="text-[var(--body-color-muted)] font-body mb-6 leading-relaxed">{{ $service['desc'] }}</p>
                        <ul class="space-y-2">
                            @foreach($service['features'] as $feature)
                            <li class="flex items-center gap-3 text-sm text-[var(--body-color-muted)]">
                                <i class="fas fa-check text-[var(--color-navy)] text-xs"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="section-label scroll-animate">How I Work</span>
                <h2 class="font-heading text-4xl md:text-5xl text-[var(--color-navy)] mt-4 scroll-animate stagger-1">MY PROCESS</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @php
                    $process = [
                        ['num' => '01', 'title' => 'Discovery', 'desc' => 'Understanding your goals, requirements, and vision for the project.'],
                        ['num' => '02', 'title' => 'Planning', 'desc' => 'Creating a detailed roadmap and technical specifications.'],
                        ['num' => '03', 'title' => 'Development', 'desc' => 'Building your solution with clean, efficient code.'],
                        ['num' => '04', 'title' => 'Delivery', 'desc' => 'Testing, deployment, and ongoing support.'],
                    ];
                @endphp
                @foreach($process as $index => $step)
                <div class="text-center scroll-animate" style="transition-delay: {{ $index * 0.15 }}s;">
                    <div class="w-20 h-20 mx-auto rounded-full bg-[var(--color-navy)] text-white flex items-center justify-center font-heading text-2xl mb-6">
                        {{ $step['num'] }}
                    </div>
                    <h3 class="font-heading text-xl text-[var(--color-navy)] mb-3">{{ strtoupper($step['title']) }}</h3>
                    <p class="text-[var(--body-color-muted)] font-body">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="section-label scroll-animate">FAQ</span>
                <h2 class="font-heading text-4xl md:text-5xl text-[var(--color-navy)] mt-4 scroll-animate stagger-1">COMMON QUESTIONS</h2>
            </div>

            <div class="space-y-4">
                @php
                    $faqs = [
                        ['q' => 'What is your typical project timeline?', 'a' => 'Project timelines vary based on complexity. A simple website might take 2-4 weeks, while a complex web application could take 2-3 months. I\'ll provide a detailed timeline during our initial consultation.'],
                        ['q' => 'Do you offer ongoing maintenance?', 'a' => 'Yes! I offer monthly maintenance packages that include updates, security patches, backups, and technical support to keep your application running smoothly.'],
                        ['q' => 'What technologies do you work with?', 'a' => 'I specialize in modern web technologies including Laravel, React, Vue.js, Python, and more. I\'m always learning new tools to deliver the best solutions.'],
                        ['q' => 'How do we communicate during the project?', 'a' => 'I believe in transparent communication. We\'ll have regular check-ins via your preferred method (email, Slack, video calls) and you\'ll have access to project updates throughout the development process.'],
                    ];
                @endphp
                @foreach($faqs as $index => $faq)
                <div x-data="{ open: false }" class="card-modern overflow-hidden scroll-animate" style="transition-delay: {{ $index * 0.1 }}s;">
                    <button @click="open = !open" class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-body font-semibold text-[var(--body-color)]">{{ $faq['q'] }}</span>
                        <i class="fas fa-chevron-down text-[var(--color-navy)] transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" x-collapse>
                        <div class="px-6 pb-5 text-[var(--body-color-muted)] font-body">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden" style="background-color: #1B365D;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-heading text-4xl md:text-5xl text-white scroll-animate">
                    READY TO START YOUR PROJECT?
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto scroll-animate stagger-1">
                    Let's discuss your requirements and create something amazing together.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4 scroll-animate stagger-2">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-[#1B365D] rounded-lg font-body font-semibold hover:bg-[#F5F0E8] transition-all">
                        <span>Get in Touch</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-transparent text-white border-2 border-white/30 rounded-lg font-body font-semibold hover:bg-white/10 transition-all">
                        <span>View My Work</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Styles -->
    <style>
        .hero-animate {
            opacity: 0;
            transform: translateY(30px);
        }
        .hero-animate.loaded {
            animation: heroFadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .hero-animate-1.loaded { animation-delay: 0.1s; }
        .hero-animate-2.loaded { animation-delay: 0.2s; }
        .hero-animate-3.loaded { animation-delay: 0.3s; }

        @keyframes heroFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0;
        }
        .hero-orb.loaded { animation: orbFadeIn 1.5s ease-out forwards; }
        .hero-orb-1 {
            top: 20%;
            right: 10%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
        }
        @keyframes orbFadeIn { to { opacity: 0.05; } }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('loaded'));
                document.querySelectorAll('.hero-orb').forEach(el => el.classList.add('loaded'));
            }, 100);
        });
    </script>
@endsection
