@extends('layouts.app')

@section('title', 'Services - Portfolio')

@section('content')
    <!-- Services Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-10">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-20 w-72 h-72 bg-[var(--accent-primary)]/10 rounded-full blur-3xl float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-[var(--accent-secondary)]/10 rounded-full blur-3xl float" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="text-center space-y-6">
                <div class="reveal-text reveal-1">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--page-text)]/5 rounded-full text-sm font-medium text-[var(--page-text-muted)]">
                        <i class="fas fa-cog text-[var(--accent-primary)]"></i>
                        What I Do
                    </span>
                </div>
                
                <h1 class="font-display text-5xl md:text-7xl text-[var(--page-text)] reveal-text reveal-2">
                    Services
                </h1>
                
                <p class="text-lg text-[var(--page-text-muted)] max-w-2xl mx-auto font-body leading-relaxed reveal-text reveal-3">
                    Comprehensive solutions tailored to bring your digital vision to life with modern technologies and best practices.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div class="group card-modern p-8 space-y-6 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        
                        <!-- Service Icon -->
                        <div class="w-16 h-16 rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center group-hover:bg-[var(--page-text)] transition-all duration-300">
                            <i class="{{ $service->icon ?? 'fas fa-code' }} text-2xl text-[var(--page-text-muted)] group-hover:text-white transition-all duration-300"></i>
                        </div>

                        <!-- Service Title -->
                        <h3 class="font-heading text-xl font-semibold text-[var(--page-text)] group-hover:text-[var(--accent-primary)] transition-colors">
                            {{ $service->title }}
                        </h3>

                        <!-- Service Description -->
                        <p class="text-[var(--page-text-muted)] font-body leading-relaxed text-sm min-h-[4rem]">
                            {{ $service->description }}
                        </p>

                        <!-- Service Features -->
                        @if($service->features && is_array($service->features) && count($service->features) > 0)
                        <ul class="space-y-3 pt-4 border-t border-[var(--border-color)]">
                            @foreach($service->features as $feature)
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-[var(--accent-primary)]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-check text-[var(--accent-primary)] text-xs"></i>
                                </div>
                                <span class="text-[var(--page-text-muted)] text-sm font-body">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- Pricing (if available) -->
                        @if($service->price)
                        <div class="pt-4 border-t border-[var(--border-color)]">
                            <p class="text-[var(--page-text-muted)] text-sm">
                                <span class="text-[var(--page-text-light)] text-xs">Starting from</span>
                                <span class="font-heading text-2xl font-bold text-[var(--page-text)] ml-2">{{ $service->price }}</span>
                            </p>
                        </div>
                        @endif

                        <!-- CTA Button -->
                        <div class="pt-4">
                            <a href="{{ route('contact.index') }}" class="btn-primary w-full justify-center">
                                <span>Get Started</span>
                                <i class="fas fa-arrow-right text-sm"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 card-modern">
                        <i class="fas fa-briefcase text-[var(--page-text)]/10 text-6xl mb-4"></i>
                        <p class="text-[var(--page-text-muted)] font-body text-lg">No services available yet.</p>
                        <p class="text-[var(--page-text-light)] font-body text-sm mt-2">Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-32 relative bg-[var(--page-bg-secondary)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Workflow</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">How I Work</h2>
                <p class="text-[var(--page-text-muted)] font-body text-lg fade-in-up" style="animation-delay: 0.2s;">A structured approach to deliver quality results</p>
            </div>

            <!-- Process Steps -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Step 1 -->
                <div class="text-center space-y-6 fade-in-up" style="animation-delay: 0.1s;">
                    <div class="relative">
                        <div class="w-20 h-20 mx-auto rounded-2xl bg-[var(--page-text)] flex items-center justify-center shadow-lg">
                            <span class="font-heading text-3xl font-bold text-white">1</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-0.5 bg-[var(--border-color)] transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-[var(--page-text)]">Discovery</h3>
                    <p class="text-[var(--page-text-muted)] text-sm font-body leading-relaxed">
                        Understanding your goals, requirements, and vision for the project.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center space-y-6 fade-in-up" style="animation-delay: 0.2s;">
                    <div class="relative">
                        <div class="w-20 h-20 mx-auto rounded-2xl bg-[var(--page-text)] flex items-center justify-center shadow-lg">
                            <span class="font-heading text-3xl font-bold text-white">2</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-0.5 bg-[var(--border-color)] transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-[var(--page-text)]">Planning</h3>
                    <p class="text-[var(--page-text-muted)] text-sm font-body leading-relaxed">
                        Creating a detailed roadmap with timelines, milestones, and deliverables.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center space-y-6 fade-in-up" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <div class="w-20 h-20 mx-auto rounded-2xl bg-[var(--page-text)] flex items-center justify-center shadow-lg">
                            <span class="font-heading text-3xl font-bold text-white">3</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-0.5 bg-[var(--border-color)] transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-[var(--page-text)]">Development</h3>
                    <p class="text-[var(--page-text-muted)] text-sm font-body leading-relaxed">
                        Building your project with clean code and modern best practices.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center space-y-6 fade-in-up" style="animation-delay: 0.4s;">
                    <div class="relative">
                        <div class="w-20 h-20 mx-auto rounded-2xl bg-[var(--accent-primary)] flex items-center justify-center shadow-lg">
                            <span class="font-heading text-3xl font-bold text-white">4</span>
                        </div>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-[var(--page-text)]">Delivery</h3>
                    <p class="text-[var(--page-text-muted)] text-sm font-body leading-relaxed">
                        Launching your project with ongoing support and maintenance.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Stack</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] mb-4 fade-in-up" style="animation-delay: 0.1s;">Tech I Use</h2>
                <p class="text-[var(--page-text-muted)] font-body text-lg fade-in-up" style="animation-delay: 0.2s;">Modern tools and frameworks</p>
            </div>

            <!-- Tech Grid -->
            <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-8 gap-4">
                @php
                $technologies = [
                    ['name' => 'HTML5', 'icon' => 'fab fa-html5'],
                    ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt'],
                    ['name' => 'JavaScript', 'icon' => 'fab fa-js'],
                    ['name' => 'React', 'icon' => 'fab fa-react'],
                    ['name' => 'Vue', 'icon' => 'fab fa-vuejs'],
                    ['name' => 'Node.js', 'icon' => 'fab fa-node-js'],
                    ['name' => 'Laravel', 'icon' => 'fab fa-laravel'],
                    ['name' => 'Python', 'icon' => 'fab fa-python'],
                ];
                @endphp

                @foreach($technologies as $index => $tech)
                <div class="group card-modern p-4 text-center fade-in-up" style="animation-delay: {{ $index * 0.05 }}s;">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center mb-3 group-hover:bg-[var(--page-text)] transition-colors duration-300">
                        <i class="{{ $tech['icon'] }} text-xl text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <p class="text-xs text-[var(--page-text-muted)] font-medium">{{ $tech['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-32 relative bg-[var(--page-bg-secondary)]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-3 mb-6 fade-in-up">
                    <div class="section-divider"></div>
                    <span class="text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">FAQ</span>
                    <div class="section-divider" style="transform: scaleX(-1);"></div>
                </div>
                <h2 class="font-display text-4xl md:text-6xl text-[var(--page-text)] fade-in-up" style="animation-delay: 0.1s;">Common Questions</h2>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4">
                @php
                $faqs = [
                    [
                        'question' => 'How long does a typical project take?',
                        'answer' => 'Project timelines vary depending on scope and complexity. A simple website might take 2-4 weeks, while a complex web application could take 2-3 months. I provide detailed timelines during the planning phase.'
                    ],
                    [
                        'question' => 'What is your development process?',
                        'answer' => 'I follow an agile approach with regular check-ins and updates. After the discovery phase, I create mockups for approval, then move to development with iterative reviews to ensure the final product meets your expectations.'
                    ],
                    [
                        'question' => 'Do you provide ongoing support?',
                        'answer' => 'Yes! I offer maintenance and support packages to keep your project running smoothly. This includes updates, bug fixes, and minor modifications as needed.'
                    ],
                    [
                        'question' => 'What are your payment terms?',
                        'answer' => 'I typically work with a 50% upfront deposit and 50% upon completion. For larger projects, we can arrange milestone-based payments. All terms are clearly outlined in the project agreement.'
                    ],
                ];
                @endphp

                @foreach($faqs as $index => $faq)
                <div class="card-modern p-6 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between text-left">
                        <h3 class="font-heading text-lg font-semibold text-[var(--page-text)] pr-4">{{ $faq['question'] }}</h3>
                        <div class="w-8 h-8 rounded-lg bg-[var(--page-text)]/5 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chevron-down text-[var(--page-text-muted)] text-sm transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                        </div>
                    </button>
                    <div x-show="open" x-collapse class="pt-4 mt-4 border-t border-[var(--border-color)]">
                        <p class="text-[var(--page-text-muted)] font-body leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-[var(--page-text)]"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-[var(--accent-primary)]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[var(--accent-secondary)]/20 rounded-full blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="space-y-8">
                <h2 class="font-display text-4xl md:text-6xl text-white leading-tight fade-in-up">
                    Ready to Start<br>
                    <span class="text-[var(--accent-primary)]">Your Project?</span>
                </h2>
                <p class="text-xl text-white/70 font-body max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.1s;">
                    Let's discuss your requirements and create something amazing together.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4 fade-in-up" style="animation-delay: 0.2s;">
                    <a href="{{ route('contact.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-[var(--page-text)] rounded-lg font-heading font-semibold hover:bg-[var(--accent-primary)] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <span>Get in Touch</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                    
                    <a href="{{ route('projects.index') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-transparent border border-white/30 text-white rounded-lg font-heading font-medium hover:bg-white/10 transition-all duration-300">
                        <span>View My Work</span>
                        <i class="fas fa-briefcase text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
