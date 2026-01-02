@extends('layouts.app')

@section('title', 'Contact - JUDE')

@section('content')
    <!-- Contact Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-10">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center relative z-10">
            <span class="section-label hero-animate hero-animate-1">Get in Touch</span>
            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl text-[var(--color-navy)] mt-4 mb-6 hero-animate hero-animate-2">
                LET'S WORK TOGETHER
            </h1>
            <p class="text-xl text-[var(--body-color-muted)] font-body max-w-2xl mx-auto hero-animate hero-animate-3">
                Have a project in mind? I'd love to hear about it. Send me a message and let's create something amazing.
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-24 relative bg-[var(--color-beige-dark)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Contact Form -->
                <div class="scroll-animate">
                    <div class="card-modern p-8 md:p-10">
                        <h2 class="font-heading text-2xl text-[var(--color-navy)] mb-8">SEND A MESSAGE</h2>
                        
                        <div id="success-message" class="hidden mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                <p class="text-green-700">Thank you! Your message has been sent successfully.</p>
                            </div>
                        </div>

                        <div id="error-message" class="hidden mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                                <p class="text-red-700">Something went wrong. Please try again.</p>
                            </div>
                        </div>

                        <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-[var(--body-color)] mb-2">Name</label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 bg-[var(--color-beige)] border border-[var(--border-color)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-navy)] focus:border-transparent transition-all font-body"
                                           placeholder="Your name">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-[var(--body-color)] mb-2">Email</label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 bg-[var(--color-beige)] border border-[var(--border-color)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-navy)] focus:border-transparent transition-all font-body"
                                           placeholder="your@email.com">
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-[var(--body-color)] mb-2">Subject</label>
                                <input type="text" id="subject" name="subject" required
                                       class="w-full px-4 py-3 bg-[var(--color-beige)] border border-[var(--border-color)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-navy)] focus:border-transparent transition-all font-body"
                                       placeholder="Project inquiry">
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-[var(--body-color)] mb-2">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                          class="w-full px-4 py-3 bg-[var(--color-beige)] border border-[var(--border-color)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-navy)] focus:border-transparent transition-all font-body resize-none"
                                          placeholder="Tell me about your project..."></textarea>
                            </div>

                            <button type="submit" class="btn-primary w-full justify-center">
                                <span>Send Message</span>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8 scroll-animate stagger-1">
                    <div>
                        <h2 class="font-heading text-2xl text-[var(--color-navy)] mb-8">CONTACT INFO</h2>
                        <p class="text-[var(--body-color-muted)] font-body leading-relaxed mb-8">
                            Feel free to reach out through any of the following channels. I typically respond within 24-48 hours.
                        </p>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-4">
                        @if($profile && $profile->email)
                        <div class="card-modern p-6 flex items-center gap-4 group hover:bg-[var(--color-navy)] transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center group-hover:bg-white/10 transition-colors">
                                <i class="fas fa-envelope text-[var(--color-navy)] group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-sm text-[var(--body-color-muted)] group-hover:text-white/70 transition-colors">Email</p>
                                <p class="font-medium text-[var(--body-color)] group-hover:text-white transition-colors">{{ $profile->email }}</p>
                            </div>
                        </div>
                        @endif

                        @if($profile && $profile->phone)
                        <div class="card-modern p-6 flex items-center gap-4 group hover:bg-[var(--color-navy)] transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center group-hover:bg-white/10 transition-colors">
                                <i class="fas fa-phone text-[var(--color-navy)] group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-sm text-[var(--body-color-muted)] group-hover:text-white/70 transition-colors">Phone</p>
                                <p class="font-medium text-[var(--body-color)] group-hover:text-white transition-colors">{{ $profile->phone }}</p>
                            </div>
                        </div>
                        @endif

                        @if($profile && $profile->location)
                        <div class="card-modern p-6 flex items-center gap-4 group hover:bg-[var(--color-navy)] transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center group-hover:bg-white/10 transition-colors">
                                <i class="fas fa-map-marker-alt text-[var(--color-navy)] group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-sm text-[var(--body-color-muted)] group-hover:text-white/70 transition-colors">Location</p>
                                <p class="font-medium text-[var(--body-color)] group-hover:text-white transition-colors">{{ $profile->location }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Social Links -->
                    @if($profile && $profile->social_links)
                    <div class="pt-8">
                        <h3 class="font-heading text-lg text-[var(--color-navy)] mb-4">FOLLOW ME</h3>
                        <div class="flex gap-3">
                            @if(!empty($profile->social_links['github']))
                            <a href="{{ $profile->social_links['github'] }}" target="_blank" 
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            @endif
                            @if(!empty($profile->social_links['linkedin']))
                            <a href="{{ $profile->social_links['linkedin'] }}" target="_blank"
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            @endif
                            @if(!empty($profile->social_links['twitter']))
                            <a href="{{ $profile->social_links['twitter'] }}" target="_blank"
                               class="w-12 h-12 rounded-xl bg-[var(--color-navy)]/10 flex items-center justify-center text-[var(--color-navy)] hover:bg-[var(--color-navy)] hover:text-white transition-all">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Availability -->
                    <div class="card-modern p-6 bg-[var(--color-navy)] text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="font-heading text-lg">AVAILABLE FOR WORK</span>
                        </div>
                        <p class="text-white/70 font-body">Currently accepting new projects. Let's discuss your ideas!</p>
                    </div>
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
        .hero-orb.loaded {
            animation: orbFadeIn 1.5s ease-out forwards;
        }
        .hero-orb-1 {
            top: 20%;
            right: 10%;
            width: 400px;
            height: 400px;
            background: var(--color-navy);
        }
        @keyframes orbFadeIn {
            to { opacity: 0.05; transform: scale(1); }
        }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.hero-animate').forEach(el => el.classList.add('loaded'));
                document.querySelectorAll('.hero-orb').forEach(el => el.classList.add('loaded'));
            }, 100);

            // Form handling
            const form = document.getElementById('contact-form');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });

                    if (response.ok) {
                        document.getElementById('success-message').classList.remove('hidden');
                        document.getElementById('error-message').classList.add('hidden');
                        form.reset();
                    } else {
                        throw new Error('Failed');
                    }
                } catch (error) {
                    document.getElementById('error-message').classList.remove('hidden');
                    document.getElementById('success-message').classList.add('hidden');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<span>Send Message</span><i class="fas fa-paper-plane"></i>';
                }
            });
        });
    </script>
@endsection
