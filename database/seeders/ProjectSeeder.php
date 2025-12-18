<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'A full-featured online shopping platform with admin dashboard, payment integration, and inventory management.',
                'long_description' => 'Built a comprehensive e-commerce solution from the ground up, featuring a modern user interface, seamless checkout process, and powerful admin tools. The platform handles thousands of transactions daily with 99.9% uptime.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe', 'AWS'],
                'featured_image' => 'projects/ecommerce-main.jpg',
                'demo_url' => 'https://demo.ecommerce.com',
                'github_url' => 'https://github.com/alexjohnson/ecommerce',
                'is_featured' => true,
                'status' => 'completed',
                'completed_at' => '2023-11-15',
                'order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'Real-time collaborative task management application with team features and analytics.',
                'long_description' => 'Created a productivity tool that helps teams organize work and collaborate effectively. Features include real-time updates, drag-and-drop interfaces, time tracking, and detailed reporting.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'React', 'PostgreSQL', 'Redis', 'Socket.io'],
                'featured_image' => 'projects/task-app-main.jpg',
                'demo_url' => 'https://demo.taskapp.com',
                'github_url' => null,
                'is_featured' => true,
                'status' => 'completed',
                'completed_at' => '2023-09-20',
                'order' => 2,
            ],
            [
                'title' => 'Portfolio Website',
                'description' => 'Sleek and modern portfolio website for a creative agency with stunning animations.',
                'long_description' => 'Designed and developed a visually striking portfolio website that showcases the agency\'s work through engaging animations and smooth interactions. Mobile-first approach ensures perfect experience on all devices.',
                'category' => 'Design',
                'tech_stack' => ['Laravel', 'Tailwind CSS', 'Alpine.js', 'GSAP'],
                'featured_image' => 'projects/portfolio-main.jpg',
                'demo_url' => 'https://demo.agency.com',
                'github_url' => 'https://github.com/alexjohnson/agency-portfolio',
                'is_featured' => true,
                'status' => 'completed',
                'completed_at' => '2023-07-10',
                'order' => 3,
            ],
            [
                'title' => 'Restaurant Management System',
                'description' => 'Complete restaurant management solution with POS, inventory, and online ordering.',
                'long_description' => 'Developed an all-in-one system for restaurant operations including point-of-sale, kitchen display, inventory management, and online ordering integration. Serves 50+ restaurants across the region.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Docker'],
                'featured_image' => 'projects/restaurant-main.jpg',
                'demo_url' => null,
                'github_url' => null,
                'is_featured' => false,
                'status' => 'completed',
                'completed_at' => '2023-05-22',
                'order' => 4,
            ],
            [
                'title' => 'Fitness Tracking Mobile App',
                'description' => 'Cross-platform mobile app for tracking workouts, nutrition, and progress.',
                'long_description' => 'Built a comprehensive fitness companion app with workout plans, nutrition tracking, progress photos, and social features. Uses device sensors for automatic activity tracking.',
                'category' => 'Mobile',
                'tech_stack' => ['React Native', 'Laravel API', 'MongoDB', 'Firebase'],
                'featured_image' => 'projects/fitness-main.jpg',
                'demo_url' => null,
                'github_url' => 'https://github.com/alexjohnson/fitness-app',
                'is_featured' => true,
                'status' => 'completed',
                'completed_at' => '2023-03-15',
                'order' => 5,
            ],
            [
                'title' => 'Real Estate Listing Platform',
                'description' => 'Property listing and search platform with advanced filters and virtual tours.',
                'long_description' => 'Created a feature-rich real estate platform allowing agents to list properties and buyers to search with powerful filters. Integrated virtual tour capabilities and mortgage calculators.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'React', 'PostgreSQL', 'Google Maps API'],
                'featured_image' => 'projects/realestate-main.jpg',
                'demo_url' => 'https://demo.realestate.com',
                'github_url' => null,
                'is_featured' => false,
                'status' => 'completed',
                'completed_at' => '2023-01-30',
                'order' => 6,
            ],
            [
                'title' => 'Blog CMS',
                'description' => 'Custom content management system for bloggers with SEO tools and analytics.',
                'long_description' => 'Developed a lightweight CMS specifically designed for bloggers and content creators. Features include markdown editor, SEO optimization tools, analytics integration, and automatic social media posting.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'Tailwind CSS', 'MySQL'],
                'featured_image' => 'projects/blog-cms-main.jpg',
                'demo_url' => 'https://demo.blogcms.com',
                'github_url' => 'https://github.com/alexjohnson/blog-cms',
                'is_featured' => false,
                'status' => 'completed',
                'completed_at' => '2022-11-05',
                'order' => 7,
            ],
            [
                'title' => 'Online Learning Platform',
                'description' => 'E-learning platform with video courses, quizzes, and student progress tracking.',
                'long_description' => 'Built a scalable learning management system supporting video content, interactive quizzes, certificates, and comprehensive student analytics. Used by 10,000+ students across multiple courses.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'AWS S3', 'FFmpeg'],
                'featured_image' => 'projects/learning-main.jpg',
                'demo_url' => null,
                'github_url' => null,
                'is_featured' => true,
                'status' => 'completed',
                'completed_at' => '2022-08-18',
                'order' => 8,
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create($projectData);

            // Add sample images for each project
            for ($i = 1; $i <= 3; $i++) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "projects/{$project->slug}-{$i}.jpg",
                    'caption' => "Screenshot {$i}",
                    'order' => $i,
                ]);
            }
        }
    }
}
