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
                'testimonial' => 'Jude delivered an outstanding e-commerce platform that exceeded our expectations. The attention to detail and clean code quality is exceptional. Our sales have increased by 150% since launch! Highly recommend for any web development project.',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'E-Commerce Platform',
                'is_featured' => true,
                'order' => 0,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'Product Manager',
                'client_company' => 'Digital Solutions',
                'testimonial' => 'Working with Jude was a pleasure from start to finish. They understood our requirements perfectly and delivered a beautiful, functional application on time and within budget. The task management app has transformed how our team collaborates.',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'TaskFlow Project Management',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'Founder & Creative Director',
                'client_company' => 'Creative Agency Co',
                'testimonial' => 'Jude brought our vision to life with a stunning portfolio website. The animations and user experience are top-notch. Our client inquiries have tripled since the new site launched! True professional with incredible design sense.',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'Agency Portfolio Website',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'David Thompson',
                'client_position' => 'Restaurant Owner',
                'client_company' => 'Thompson Bistro',
                'testimonial' => 'The restaurant management system Jude built has completely transformed our operations. Its intuitive, reliable, and has saved us countless hours every week. Best investment we have made for our business!',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'Restaurant POS System',
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'client_name' => 'Lisa Anderson',
                'client_position' => 'Fitness Coach',
                'client_company' => 'FitLife Training',
                'testimonial' => 'Jude developed an amazing fitness tracking app for my clients. Its user-friendly, feature-rich, and my clients absolutely love it. Communication throughout the project was excellent and all deadlines were met.',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'FitTrack Mobile App',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'client_name' => 'James Wilson',
                'client_position' => 'Real Estate Broker',
                'client_company' => 'Prime Properties',
                'testimonial' => 'The real estate platform Jude created is exactly what we needed. Its fast, professional, and our agents find it very easy to use. The virtual tour feature has been a game-changer for our listings.',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'RealEstate Listing Platform',
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'client_name' => 'Amanda Foster',
                'client_position' => 'Education Coordinator',
                'client_company' => 'LearnHub Academy',
                'testimonial' => 'Working with Jude on our learning management system was fantastic. They delivered a scalable platform that our students and instructors love. The video streaming works flawlessly and the analytics are incredibly helpful.',
                'client_image' => null,
                'rating' => 4,
                'project_name' => 'LearnHub LMS Platform',
                'is_featured' => true,
                'order' => 6,
            ],
            [
                'client_name' => 'Robert Martinez',
                'client_position' => 'Blogger',
                'client_company' => 'Tech Insights Blog',
                'testimonial' => 'The custom CMS Jude built for me is perfect. Its lightweight, fast, and has all the SEO tools I need. Managing my blog has never been easier. Great work and excellent support!',
                'client_image' => null,
                'rating' => 5,
                'project_name' => 'BlogCraft CMS',
                'is_featured' => false,
                'order' => 7,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
