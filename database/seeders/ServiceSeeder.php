<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Custom web applications built with modern technologies. From simple landing pages to complex enterprise solutions that drive business growth and digital transformation.',
                'icon' => 'fas fa-code',
                'features' => [
                    'Responsive Design',
                    'Clean & Maintainable Code',
                    'SEO Optimized',
                    'Performance Focused',
                    'Cross-browser Compatible',
                    'Progressive Web Apps',
                ],
                'price' => 'Starting at $5,000',
                'is_active' => true,
                'order' => 0,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Cross-platform mobile applications for iOS and Android using React Native. Native performance with a single codebase for faster time-to-market.',
                'icon' => 'fas fa-mobile-alt',
                'features' => [
                    'iOS & Android Apps',
                    'React Native Development',
                    'Native Performance',
                    'Push Notifications',
                    'Offline Capability',
                    'App Store Deployment',
                ],
                'price' => '$8,000 - $15,000',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Beautiful, user-friendly interfaces that provide exceptional user experiences and drive engagement. Research-driven design that puts users first.',
                'icon' => 'fas fa-palette',
                'features' => [
                    'User Research & Analysis',
                    'Wireframing & Prototyping',
                    'Visual Design',
                    'Usability Testing',
                    'Design Systems',
                    'Figma & Adobe XD',
                ],
                'price' => '$3,000 - $8,000',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'API Development',
                'description' => 'Robust and scalable RESTful APIs for web and mobile applications with comprehensive documentation and security best practices.',
                'icon' => 'fas fa-plug',
                'features' => [
                    'RESTful Architecture',
                    'Authentication & Security',
                    'Comprehensive Documentation',
                    'Rate Limiting & Throttling',
                    'API Versioning',
                    'Third-party Integrations',
                ],
                'price' => 'Starting at $4,000',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'E-Commerce Solutions',
                'description' => 'Complete e-commerce platforms with payment integration, inventory management, and powerful admin panels. Turn browsers into buyers.',
                'icon' => 'fas fa-shopping-cart',
                'features' => [
                    'Shopping Cart & Checkout',
                    'Payment Gateway Integration',
                    'Order Management System',
                    'Product Catalog',
                    'Analytics Dashboard',
                    'Customer Management',
                ],
                'price' => '$10,000 - $25,000',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Maintenance & Support',
                'description' => 'Ongoing technical support, bug fixes, performance optimization, and feature enhancements for your existing applications.',
                'icon' => 'fas fa-tools',
                'features' => [
                    '24/7 Technical Support',
                    'Bug Fixes & Updates',
                    'Performance Optimization',
                    'Security Patches',
                    'Feature Enhancements',
                    'Monthly Reports',
                ],
                'price' => 'Starting at $1,500/month',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
