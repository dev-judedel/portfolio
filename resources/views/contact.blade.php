@extends('layouts.app')

@section('title', 'Contact - Portfolio')

@section('content')
    <!-- Contact Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <div class="space-y-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Get in Touch</p>
                    <div class="w-12 h-px bg-white/20 mx-auto"></div>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extralight text-white tracking-tight opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
                    Let's Talk
                </h1>
                
                <p class="text-base text-white/45 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in" style="animation-delay: 0.6s;">
                    Have a project in mind? Want to collaborate? Feel free to reach out. I'm always open to discussing new opportunities.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Contact Form -->
                <div class="opacity-0 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-px bg-white/20"></div>
                            <h2 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Send Message</h2>
                        </div>

                        <!-- Success Message -->
                        <div id="success-message" class="hidden p-6 bg-green-500/10 border border-green-500/20 rounded-lg">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-400 mt-1"></i>
                                <div>
                                    <h3 class="text-green-300 font-light mb-1">Message Sent!</h3>
                                    <p class="text-green-200/70 text-sm font-light">Thank you for reaching out. I'll get back to you soon.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Error Message -->
                        <div id="error-message" class="hidden p-6 bg-red-500/10 border border-red-500/20 rounded-lg">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-exclamation-circle text-red-400 mt-1"></i>
                                <div>
                                    <h3 class="text-red-300 font-light mb-1">Oops!</h3>
                                    <p class="text-red-200/70 text-sm font-light" id="error-text">Something went wrong. Please try again.</p>
                                </div>
                            </div>
                        </div>

                        <form id="contact-form" class="space-y-6">
                            @csrf
                            
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm text-white/50 font-light mb-2">Your Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    required
                                    class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:border-white/30 focus:outline-none transition-colors font-light"
                                    placeholder="John Doe">
                                <span class="error-message text-red-400/80 text-xs font-light mt-1 hidden"></span>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm text-white/50 font-light mb-2">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    required
                                    class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:border-white/30 focus:outline-none transition-colors font-light"
                                    placeholder="john@example.com">
                                <span class="error-message text-red-400/80 text-xs font-light mt-1 hidden"></span>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm text-white/50 font-light mb-2">Subject</label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    name="subject" 
                                    required
                                    class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:border-white/30 focus:outline-none transition-colors font-light"
                                    placeholder="Project Inquiry">
                                <span class="error-message text-red-400/80 text-xs font-light mt-1 hidden"></span>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm text-white/50 font-light mb-2">Message</label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    rows="6" 
                                    required
                                    class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:border-white/30 focus:outline-none transition-colors font-light resize-none"
                                    placeholder="Tell me about your project..."></textarea>
                                <span class="error-message text-red-400/80 text-xs font-light mt-1 hidden"></span>
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                id="submit-btn"
                                class="group relative w-full px-8 py-4 overflow-hidden">
                                <div class="absolute inset-0 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg transition-all duration-500 group-hover:bg-white/10 group-hover:border-white/30"></div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                                </div>
                                <span class="relative flex items-center justify-center gap-2 text-white font-light">
                                    <i class="fas fa-paper-plane text-sm"></i>
                                    <span id="submit-text">Send Message</span>
                                    <i class="fas fa-spinner fa-spin text-sm hidden" id="submit-spinner"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8 opacity-0 animate-fade-in-up" style="animation-delay: 0.4s;">
                    
                    <!-- Info Header -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-px bg-white/20"></div>
                        <h2 class="text-sm uppercase tracking-[0.3em] text-white/40 font-light">Contact Info</h2>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-6">
                        
                        <!-- Email -->
                        @if($profile && $profile->email)
                        <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                                    <i class="fas fa-envelope text-white/40 group-hover:text-white/60 transition-colors"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white/60 text-sm font-light uppercase tracking-wider mb-2">Email</h3>
                                    <a href="mailto:{{ $profile->email }}" class="text-white/80 hover:text-white font-light transition-colors">
                                        {{ $profile->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Phone -->
                        @if($profile && $profile->phone)
                        <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                                    <i class="fas fa-phone text-white/40 group-hover:text-white/60 transition-colors"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white/60 text-sm font-light uppercase tracking-wider mb-2">Phone</h3>
                                    <a href="tel:{{ $profile->phone }}" class="text-white/80 hover:text-white font-light transition-colors">
                                        {{ $profile->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Location -->
                        @if($profile && $profile->location)
                        <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 hover:border-white/20 transition-all duration-500 group">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-colors">
                                    <i class="fas fa-map-marker-alt text-white/40 group-hover:text-white/60 transition-colors"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white/60 text-sm font-light uppercase tracking-wider mb-2">Location</h3>
                                    <p class="text-white/80 font-light">{{ $profile->location }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Social Links -->
                        @if($profile && ($profile->github_url || $profile->linkedin_url || $profile->twitter_url))
                        <div class="p-8 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 space-y-6">
                            <h3 class="text-white/60 text-sm font-light uppercase tracking-wider">Follow Me</h3>
                            
                            <div class="flex gap-3">
                                @if($profile->github_url)
                                <a href="{{ $profile->github_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                    <i class="fab fa-github text-white/50 hover:text-white/80 text-xl"></i>
                                </a>
                                @endif
                                
                                @if($profile->linkedin_url)
                                <a href="{{ $profile->linkedin_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                    <i class="fab fa-linkedin-in text-white/50 hover:text-white/80 text-xl"></i>
                                </a>
                                @endif
                                
                                @if($profile->twitter_url)
                                <a href="{{ $profile->twitter_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-lg transition-all duration-300">
                                    <i class="fab fa-twitter text-white/50 hover:text-white/80 text-xl"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AJAX Form Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitSpinner = document.getElementById('submit-spinner');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Clear previous messages
                successMessage.classList.add('hidden');
                errorMessage.classList.add('hidden');
                
                // Clear field errors
                document.querySelectorAll('.error-message').forEach(el => {
                    el.classList.add('hidden');
                    el.textContent = '';
                });

                // Show loading state
                submitBtn.disabled = true;
                submitText.textContent = 'Sending...';
                submitSpinner.classList.remove('hidden');

                try {
                    const formData = new FormData(form);
                    
                    const response = await fetch('{{ route("contact.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Success
                        successMessage.classList.remove('hidden');
                        form.reset();
                        
                        // Scroll to success message
                        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        // Validation errors
                        if (data.errors) {
                            Object.keys(data.errors).forEach(field => {
                                const input = document.getElementById(field);
                                if (input) {
                                    const errorSpan = input.nextElementSibling;
                                    if (errorSpan && errorSpan.classList.contains('error-message')) {
                                        errorSpan.textContent = data.errors[field][0];
                                        errorSpan.classList.remove('hidden');
                                    }
                                }
                            });
                        } else {
                            // Generic error
                            errorText.textContent = data.message || 'Something went wrong. Please try again.';
                            errorMessage.classList.remove('hidden');
                            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    errorText.textContent = 'Network error. Please check your connection and try again.';
                    errorMessage.classList.remove('hidden');
                    errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } finally {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitText.textContent = 'Send Message';
                    submitSpinner.classList.add('hidden');
                }
            });
        });
    </script>

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
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-shimmer {
            animation: shimmer 2s ease-in-out;
        }
    </style>
@endsection
