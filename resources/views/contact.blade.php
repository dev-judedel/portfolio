@extends('layouts.app')

@section('title', 'Contact - Portfolio')

@section('content')
    <!-- Contact Hero Section -->
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
                        <i class="fas fa-envelope text-[var(--accent-primary)]"></i>
                        Get in Touch
                    </span>
                </div>
                
                <h1 class="font-display text-5xl md:text-7xl text-[var(--page-text)] reveal-text reveal-2">
                    Let's Talk
                </h1>
                
                <p class="text-lg text-[var(--page-text-muted)] max-w-2xl mx-auto font-body leading-relaxed reveal-text reveal-3">
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
                <div class="fade-in-up">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="section-divider"></div>
                            <h2 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Send Message</h2>
                        </div>

                        <!-- Success Message -->
                        <div id="success-message" class="hidden p-6 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-heading font-semibold text-green-800 mb-1">Message Sent!</h3>
                                    <p class="text-green-700 text-sm font-body">Thank you for reaching out. I'll get back to you soon.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Error Message -->
                        <div id="error-message" class="hidden p-6 bg-red-50 border border-red-200 rounded-xl">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-exclamation text-red-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-heading font-semibold text-red-800 mb-1">Oops!</h3>
                                    <p class="text-red-700 text-sm font-body" id="error-text">Something went wrong. Please try again.</p>
                                </div>
                            </div>
                        </div>

                        <form id="contact-form" class="space-y-6">
                            @csrf
                            
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-[var(--page-text)] mb-2">Your Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    required
                                    class="w-full px-6 py-4 bg-white border border-[var(--border-color)] rounded-xl text-[var(--page-text)] placeholder-[var(--page-text-light)] focus:border-[var(--page-text)] focus:outline-none focus:ring-2 focus:ring-[var(--page-text)]/10 transition-all font-body"
                                    placeholder="John Doe">
                                <span class="error-message text-red-500 text-xs font-body mt-1 hidden"></span>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-[var(--page-text)] mb-2">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    required
                                    class="w-full px-6 py-4 bg-white border border-[var(--border-color)] rounded-xl text-[var(--page-text)] placeholder-[var(--page-text-light)] focus:border-[var(--page-text)] focus:outline-none focus:ring-2 focus:ring-[var(--page-text)]/10 transition-all font-body"
                                    placeholder="john@example.com">
                                <span class="error-message text-red-500 text-xs font-body mt-1 hidden"></span>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-[var(--page-text)] mb-2">Subject</label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    name="subject" 
                                    required
                                    class="w-full px-6 py-4 bg-white border border-[var(--border-color)] rounded-xl text-[var(--page-text)] placeholder-[var(--page-text-light)] focus:border-[var(--page-text)] focus:outline-none focus:ring-2 focus:ring-[var(--page-text)]/10 transition-all font-body"
                                    placeholder="Project Inquiry">
                                <span class="error-message text-red-500 text-xs font-body mt-1 hidden"></span>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-[var(--page-text)] mb-2">Message</label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    rows="6" 
                                    required
                                    class="w-full px-6 py-4 bg-white border border-[var(--border-color)] rounded-xl text-[var(--page-text)] placeholder-[var(--page-text-light)] focus:border-[var(--page-text)] focus:outline-none focus:ring-2 focus:ring-[var(--page-text)]/10 transition-all font-body resize-none"
                                    placeholder="Tell me about your project..."></textarea>
                                <span class="error-message text-red-500 text-xs font-body mt-1 hidden"></span>
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                id="submit-btn"
                                class="btn-primary w-full justify-center py-4">
                                <i class="fas fa-paper-plane text-sm"></i>
                                <span id="submit-text">Send Message</span>
                                <i class="fas fa-spinner fa-spin text-sm hidden" id="submit-spinner"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8 fade-in-up" style="animation-delay: 0.2s;">
                    
                    <!-- Info Header -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="section-divider"></div>
                        <h2 class="font-heading text-sm uppercase tracking-widest text-[var(--page-text-muted)] font-medium">Contact Info</h2>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-4">
                        
                        <!-- Email -->
                        @if($profile && $profile->email)
                        <div class="card-modern p-6 group">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                    <i class="fas fa-envelope text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-heading font-semibold text-[var(--page-text)] mb-1">Email</h3>
                                    <a href="mailto:{{ $profile->email }}" class="text-[var(--page-text-muted)] hover:text-[var(--accent-primary)] font-body transition-colors">
                                        {{ $profile->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Phone -->
                        @if($profile && $profile->phone)
                        <div class="card-modern p-6 group">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                    <i class="fas fa-phone text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-heading font-semibold text-[var(--page-text)] mb-1">Phone</h3>
                                    <a href="tel:{{ $profile->phone }}" class="text-[var(--page-text-muted)] hover:text-[var(--accent-primary)] font-body transition-colors">
                                        {{ $profile->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Location -->
                        @if($profile && $profile->location)
                        <div class="card-modern p-6 group">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 rounded-xl bg-[var(--page-text)]/5 flex items-center justify-center group-hover:bg-[var(--page-text)] transition-colors duration-300">
                                    <i class="fas fa-map-marker-alt text-[var(--page-text-muted)] group-hover:text-white transition-colors duration-300"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-heading font-semibold text-[var(--page-text)] mb-1">Location</h3>
                                    <p class="text-[var(--page-text-muted)] font-body">{{ $profile->location }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Social Links -->
                        @if($profile && ($profile->github_url || $profile->linkedin_url || $profile->twitter_url))
                        <div class="card-modern p-6 space-y-4">
                            <h3 class="font-heading font-semibold text-[var(--page-text)]">Follow Me</h3>
                            
                            <div class="flex gap-3">
                                @if($profile->github_url)
                                <a href="{{ $profile->github_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-xl transition-all duration-300 group">
                                    <i class="fab fa-github text-xl text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                                </a>
                                @endif
                                
                                @if($profile->linkedin_url)
                                <a href="{{ $profile->linkedin_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-xl transition-all duration-300 group">
                                    <i class="fab fa-linkedin-in text-xl text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                                </a>
                                @endif
                                
                                @if($profile->twitter_url)
                                <a href="{{ $profile->twitter_url }}" 
                                   target="_blank"
                                   class="flex-1 flex items-center justify-center p-4 bg-[var(--page-text)]/5 hover:bg-[var(--page-text)] rounded-xl transition-all duration-300 group">
                                    <i class="fab fa-twitter text-xl text-[var(--page-text-muted)] group-hover:text-white transition-colors"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Availability Card -->
                    <div class="card-modern p-6 bg-gradient-to-br from-[var(--accent-primary)]/10 to-[var(--accent-secondary)]/10 border-[var(--accent-primary)]/20">
                        <div class="flex items-start gap-4">
                            <div class="w-3 h-3 bg-green-500 rounded-full mt-1.5 animate-pulse"></div>
                            <div>
                                <h3 class="font-heading font-semibold text-[var(--page-text)] mb-1">Currently Available</h3>
                                <p class="text-[var(--page-text-muted)] font-body text-sm">I'm open to freelance projects and full-time opportunities.</p>
                            </div>
                        </div>
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
@endsection
