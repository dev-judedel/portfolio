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
                'description' => 'Custom web applications built with modern technologies. From simple landing pages to complex enterprise solutions.',
                'icon' => 'fas fa-code',
                'features' => [
                    'Responsive Design',
                    'Clean Code',
                    'SEO Optimized',
                    'Performance Focused',
                    'Cross-browser Compatible',
                ],
                'price' => 'Starting at $2,500',
                'order' => 1,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Beautiful, user-friendly interfaces that provide exceptional user experiences and drive engagement.',
                'icon' => 'fas fa-palette',
                'features' => [
                    'User Research',
                    'Wireframing',
                    'Prototyping',
                    'Visual Design',
                    'Usability Testing',
                ],
                'price' => 'Starting at $1,500',
                'order' => 2,
            ],
            [
                'title' => 'API Development',
                'description' => 'Robust and scalable RESTful APIs for web and mobile applications with comprehensive documentation.',
                'icon' => 'fas fa-plug',
                'features' => [
                    'RESTful Architecture',
                    'Authentication & Security',
                    'API Documentation',
                    'Rate Limiting',
                    'Versioning',
                ],
                'price' => 'Starting at $2,000',
                'order' => 3,
            ],
            [
                'title' => 'E-Commerce Solutions',
                'description' => 'Complete e-commerce platforms with payment integration, inventory management, and admin panels.',
                'icon' => 'fas fa-shopping-cart',
                'features' => [
                    'Shopping Cart',
                    'Payment Gateway',
                    'Order Management',
                    'Product Catalog',
                    'Analytics Dashboard',
                ],
                'price' => 'Starting at $3,500',
                'order' => 4,
            ],
            [
                'title' => 'CMS Development',
                'description' => 'Custom content management systems tailored to your specific needs and workflow.',
                'icon' => 'fas fa-edit',
                'features' => [
                    'Custom Admin Panel',
                    'Content Editor',
                    'Media Management',
                    'User Roles',
                    'SEO Tools',
                ],
                'price' => 'Starting at $2,800',
                'order' => 5,
            ],
            [
                'title' => 'Consultation & Support',
                'description' => 'Technical consultation, code review, and ongoing maintenance for your existing projects.',
                'icon' => 'fas fa-headset',
                'features' => [
                    'Technical Consultation',
                    'Code Review',
                    'Performance Audit',
                    'Security Assessment',
                    'Bug Fixes',
                ],
                'price' => 'Custom Pricing',
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

