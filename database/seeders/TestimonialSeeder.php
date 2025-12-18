<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah Mitchell',
                'client_position' => 'CEO',
                'client_company' => 'TechStart Inc',
                'testimonial' => 'Jude delivered an outstanding e-commerce platform that exceeded our expectations. The attention to detail and clean code quality is exceptional. Our sales have increased by 150% since launch!',
                'client_image' => 'testimonials/sarah-mitchell.jpg',
                'rating' => 5,
                'project_name' => 'E-Commerce Platform',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'Product Manager',
                'client_company' => 'Digital Solutions',
                'testimonial' => 'Working with Jude was a pleasure. They understood our requirements perfectly and delivered a beautiful, functional application on time. Highly recommend for any web development project.',
                'client_image' => 'testimonials/michael-chen.jpg',
                'rating' => 5,
                'project_name' => 'Task Management App',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'Founder',
                'client_company' => 'Creative Agency Co',
                'testimonial' => 'Jude brought our vision to life with a stunning portfolio website. The animations and user experience are top-notch. Our client inquiries have tripled since the new site launched!',
                'client_image' => 'testimonials/emily-rodriguez.jpg',
                'rating' => 5,
                'project_name' => 'Portfolio Website',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'client_name' => 'David Thompson',
                'client_position' => 'Restaurant Owner',
                'client_company' => 'Thompson\'s Bistro',
                'testimonial' => 'The restaurant management system Jude built has transformed our operations. It\'s intuitive, reliable, and has saved us countless hours. Best investment we\'ve made!',
                'client_image' => 'testimonials/david-thompson.jpg',
                'rating' => 5,
                'project_name' => 'Restaurant Management System',
                'is_featured' => false,
                'order' => 4,
            ],
            [
                'client_name' => 'Lisa Anderson',
                'client_position' => 'Fitness Coach',
                'client_company' => 'FitLife Training',
                'testimonial' => 'Jude developed an amazing fitness tracking app for my clients. It\'s user-friendly, feature-rich, and my clients love it. Communication throughout the project was excellent.',
                'client_image' => 'testimonials/lisa-anderson.jpg',
                'rating' => 5,
                'project_name' => 'Fitness Tracking App',
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'client_name' => 'James Wilson',
                'client_position' => 'Real Estate Broker',
                'client_company' => 'Prime Properties',
                'testimonial' => 'The real estate platform Jude created is exactly what we needed. It\'s fast, professional, and our agents find it very easy to use. Excellent work!',
                'client_image' => 'testimonials/james-wilson.jpg',
                'rating' => 5,
                'project_name' => 'Real Estate Platform',
                'is_featured' => false,
                'order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
