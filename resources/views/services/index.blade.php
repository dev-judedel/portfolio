@extends('layouts.app')

@section('title', 'Services - Portfolio')

@section('content')
    <!-- Services Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">What I Do</p>
                    <div class="w-12 h-px bg-white/20 mx-auto"></div>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extralight text-white tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    Services
                </h1>
                
                <p class="text-base text-white/45 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
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
                    <div class="group p-10 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/8 transition-all duration-500 space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        
                        <!-- Service Icon -->
                        <div class="w-16 h-16 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center group-hover:border-white/20 group-hover:bg-white/10 transition-all duration-500">
                            <i class="{{ $service->icon ?? 'fas fa-code' }} text-3xl text-white/30 group-hover:text-white/60 group-hover:scale-110 transition-all duration-500"></i>
                        </div>

                        <!-- Service Title -->
                        <h3 class="text-2xl font-light text-white/90 group-hover:text-white transition-colors">
                            {{ $service->title }}
                        </h3>

                        <!-- Service Description -->
                        <p class="text-white/40 font-light leading-relaxed text-sm min-h-[4rem]">
                            {{ $service->description }}
                        </p>

                        <!-- Service Features -->
                        @if($service->features && is_array($service->features) && count($service->features) > 0)
                        <ul class="space-y-2 pt-4 border-t border-white/10">
                            @foreach($service->features as $feature)
                            <li class="flex items-start gap-2 text-white/40 text-sm font-light">
                                <i class="fas fa-check text-white/30 mt-1 text-xs"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- Pricing (if available) -->
                        @if($service->price)
                        <div class="pt-4 border-t border-white/10">
                            <p class="text-white/50 text-sm font-light">
                                <span class="text-white/30 text-xs">Starting from</span>
                                <span class="text-2xl font-extralight text-white/80 ml-2">{{ $service->price }}</span>
                            </p>
                        </div>
                        @endif

                        <!-- CTA Button -->
                        <div class="pt-4">
                            <a href="{{ route('contact.index') }}" 
                               class="group/btn inline-flex items-center gap-2 text-white/60 hover:text-white text-sm font-light transition-colors">
                                <span>Get Started</span>
                                <i class="fas fa-arrow-right text-xs group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <i class="fas fa-briefcase text-white/10 text-6xl mb-4"></i>
                        <p class="text-white/30 font-light text-lg">No services available yet.</p>
                        <p class="text-white/20 font-light text-sm mt-2">Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Workflow</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">How I Work</h2>
                <p class="text-white/40 font-light text-sm">A structured approach to deliver quality results</p>
            </div>

            <!-- Process Steps -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Step 1 -->
                <div class="text-center space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="relative">
                        <div class="w-16 h-16 mx-auto rounded-full bg-white/5 border border-white/20 flex items-center justify-center">
                            <span class="text-2xl font-extralight text-white/60">1</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-px bg-white/10 transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="text-lg font-light text-white/80">Discovery</h3>
                    <p class="text-white/40 text-sm font-light leading-relaxed">
                        Understanding your goals, requirements, and vision for the project.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="relative">
                        <div class="w-16 h-16 mx-auto rounded-full bg-white/5 border border-white/20 flex items-center justify-center">
                            <span class="text-2xl font-extralight text-white/60">2</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-px bg-white/10 transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="text-lg font-light text-white/80">Planning</h3>
                    <p class="text-white/40 text-sm font-light leading-relaxed">
                        Creating a detailed roadmap with timelines, milestones, and deliverables.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <div class="w-16 h-16 mx-auto rounded-full bg-white/5 border border-white/20 flex items-center justify-center">
                            <span class="text-2xl font-extralight text-white/60">3</span>
                        </div>
                        <div class="hidden lg:block absolute top-1/2 left-full w-full h-px bg-white/10 transform -translate-y-1/2"></div>
                    </div>
                    <h3 class="text-lg font-light text-white/80">Development</h3>
                    <p class="text-white/40 text-sm font-light leading-relaxed">
                        Building your project with clean code and modern best practices.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center space-y-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="relative">
                        <div class="w-16 h-16 mx-auto rounded-full bg-white/5 border border-white/20 flex items-center justify-center">
                            <span class="text-2xl font-extralight text-white/60">4</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-light text-white/80">Delivery</h3>
                    <p class="text-white/40 text-sm font-light leading-relaxed">
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
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">Stack</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Tech I Use</h2>
                <p class="text-white/40 font-light text-sm">Modern tools and frameworks</p>
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
                    ['name' => 'PHP', 'icon' => 'fab fa-php'],
                    ['name' => 'WordPress', 'icon' => 'fab fa-wordpress'],
                    ['name' => 'Git', 'icon' => 'fab fa-git-alt'],
                    ['name' => 'Docker', 'icon' => 'fab fa-docker'],
                ];
                @endphp

                @foreach($technologies as $index => $tech)
                <div class="text-center p-6 bg-white/5 backdrop-blur-sm rounded-lg border border-white/5 hover:border-white/20 hover:bg-white/8 transition-all duration-500 group opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.05 }}s;">
                    <i class="{{ $tech['icon'] }} text-3xl text-white/30 group-hover:text-white/70 transition-all duration-500 group-hover:scale-110"></i>
                    <p class="text-[10px] text-white/40 mt-3 uppercase tracking-wider font-light">{{ $tech['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section (Optional) -->
    <section class="py-32 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20 space-y-6">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-white/20"></div>
                    <span class="text-[10px] uppercase tracking-[0.3em] text-white/40 font-light">FAQ</span>
                    <div class="w-12 h-px bg-white/20"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight">Common Questions</h2>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-6">
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
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 opacity-0 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                    <h3 class="text-lg font-light text-white/90 mb-3">{{ $faq['question'] }}</h3>
                    <p class="text-white/50 font-light text-sm leading-relaxed">{{ $faq['answer'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-10">
            <div class="space-y-6">
                <div class="w-16 h-px bg-white/20 mx-auto"></div>
                <h2 class="text-4xl md:text-5xl font-extralight text-white tracking-tight leading-tight">
                    Ready to Start<br>Your Project?
                </h2>
                <p class="text-lg text-white/40 font-light max-w-xl mx-auto">
                    Let's discuss your requirements and create something amazing together.
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" 
                   class="group inline-flex items-center gap-3 px-10 py-4 bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/20 hover:border-white/30 rounded-lg transition-all duration-500">
                    <span class="text-white font-light">Get in Touch</span>
                    <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                </a>
                
                <a href="{{ route('projects.index') }}" 
                   class="group inline-flex items-center gap-3 px-10 py-4 border border-white/10 hover:border-white/20 hover:bg-white/5 rounded-lg transition-all duration-500">
                    <span class="text-white/70 group-hover:text-white font-light transition-colors">View My Work</span>
                    <i class="fas fa-briefcase text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Custom Animations -->
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
