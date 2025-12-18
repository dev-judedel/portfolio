<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();
        $categories = BlogCategory::all();

        $posts = [
            [
                'title' => 'Getting Started with Laravel 10: A Complete Guide',
                'excerpt' => 'Learn how to build modern web applications with Laravel 10, covering installation, routing, and best practices.',
                'content' => $this->getFullContent('laravel'),
                'category_id' => $categories->where('name', 'Web Development')->first()->id,
                'tags' => ['Laravel', 'PHP', 'Tutorial', 'Backend'],
                'reading_time' => 8,
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Modern CSS Techniques for Responsive Design',
                'excerpt' => 'Explore modern CSS features like Grid, Flexbox, and Container Queries for building responsive layouts.',
                'content' => $this->getFullContent('css'),
                'category_id' => $categories->where('name', 'Web Development')->first()->id,
                'tags' => ['CSS', 'Responsive Design', 'Frontend'],
                'reading_time' => 6,
                'status' => 'published',
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'The Importance of User Research in UI Design',
                'excerpt' => 'Discover why user research is crucial for creating successful products and how to conduct effective research.',
                'content' => $this->getFullContent('ux'),
                'category_id' => $categories->where('name', 'UI/UX Design')->first()->id,
                'tags' => ['UX', 'Design', 'User Research'],
                'reading_time' => 7,
                'status' => 'published',
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Building a REST API with Laravel: Best Practices',
                'excerpt' => 'Learn how to design and implement robust RESTful APIs using Laravel with proper authentication and documentation.',
                'content' => $this->getFullContent('api'),
                'category_id' => $categories->where('name', 'Tutorials')->first()->id,
                'tags' => ['API', 'Laravel', 'REST', 'Tutorial'],
                'reading_time' => 10,
                'status' => 'published',
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => '10 Essential VS Code Extensions for Web Developers',
                'excerpt' => 'Boost your productivity with these must-have Visual Studio Code extensions for web development.',
                'content' => $this->getFullContent('tools'),
                'category_id' => $categories->where('name', 'Tools & Resources')->first()->id,
                'tags' => ['VS Code', 'Tools', 'Productivity'],
                'reading_time' => 5,
                'status' => 'published',
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'From Junior to Senior Developer: My Journey',
                'excerpt' => 'A personal story of growth, challenges, and lessons learned in the journey from junior to senior developer.',
                'content' => $this->getFullContent('career'),
                'category_id' => $categories->where('name', 'Career')->first()->id,
                'tags' => ['Career', 'Personal', 'Development'],
                'reading_time' => 9,
                'status' => 'published',
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'Dark Mode Implementation with Tailwind CSS',
                'excerpt' => 'A comprehensive guide to implementing dark mode in your web applications using Tailwind CSS.',
                'content' => $this->getFullContent('darkmode'),
                'category_id' => $categories->where('name', 'Tutorials')->first()->id,
                'tags' => ['Tailwind CSS', 'Dark Mode', 'CSS'],
                'reading_time' => 6,
                'status' => 'published',
                'published_at' => now()->subDays(50),
            ],
            [
                'title' => 'Understanding JavaScript Async/Await',
                'excerpt' => 'Master asynchronous JavaScript with a deep dive into Promises, async/await, and error handling.',
                'content' => $this->getFullContent('javascript'),
                'category_id' => $categories->where('name', 'Web Development')->first()->id,
                'tags' => ['JavaScript', 'Async', 'Tutorial'],
                'reading_time' => 8,
                'status' => 'draft',
                'published_at' => null,
            ],
        ];

        foreach ($posts as $postData) {
            BlogPost::create([
                'user_id' => $admin->id,
                'blog_category_id' => $postData['category_id'],
                'title' => $postData['title'],
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'featured_image' => 'blog/featured-' . str($postData['title'])->slug() . '.jpg',
                'tags' => $postData['tags'],
                'status' => $postData['status'],
                'reading_time' => $postData['reading_time'],
                'views' => rand(100, 5000),
                'published_at' => $postData['published_at'],
            ]);
        }
    }

    private function getFullContent($type): string
    {
        // Simplified content generation
        return match($type) {
            'laravel' => "# Introduction\n\nLaravel is one of the most popular PHP frameworks, known for its elegant syntax and powerful features...\n\n## Installation\n\nTo get started with Laravel 10, you'll need PHP 8.1 or higher and Composer installed...\n\n## Creating Your First Route\n\nRoutes in Laravel are defined in the routes directory...\n\n## Conclusion\n\nLaravel 10 brings many improvements and new features that make web development more enjoyable...",
            'css' => "# The Evolution of CSS\n\nCSS has come a long way from simple styling to powerful layout systems...\n\n## CSS Grid\n\nCSS Grid is a two-dimensional layout system...\n\n## Flexbox\n\nFlexbox is perfect for one-dimensional layouts...\n\n## Container Queries\n\nContainer queries are a game-changer for component-based design...",
            'ux' => "# Why User Research Matters\n\nUser research is the foundation of good design...\n\n## Types of Research\n\n1. User Interviews\n2. Surveys\n3. Usability Testing\n4. A/B Testing\n\n## Best Practices\n\nAlways involve users early in the design process...",
            'api' => "# REST API Fundamentals\n\nREST APIs are the backbone of modern web applications...\n\n## Laravel API Resources\n\nLaravel provides powerful tools for building APIs...\n\n## Authentication with Sanctum\n\nSecure your API endpoints with Laravel Sanctum...\n\n## API Documentation\n\nGood documentation is crucial for API adoption...",
            'tools' => "# Essential VS Code Extensions\n\n1. **ESLint** - JavaScript linting\n2. **Prettier** - Code formatting\n3. **GitLens** - Git integration\n4. **Live Server** - Local development server\n5. **Auto Rename Tag** - HTML/XML tag renaming\n\n## Conclusion\n\nThese extensions will significantly improve your development workflow...",
            'career' => "# My Journey\n\nFive years ago, I started as a junior developer with more enthusiasm than experience...\n\n## The Learning Phase\n\nThe first year was all about learning fundamentals...\n\n## Finding My Specialty\n\nI discovered my passion for full-stack development...\n\n## Lessons Learned\n\n1. Never stop learning\n2. Communication is key\n3. Build things\n\n## Advice for Juniors\n\nFocus on fundamentals, build projects, and network...",
            'darkmode' => "# Implementing Dark Mode\n\nDark mode has become essential in modern web design...\n\n## Tailwind Dark Mode\n\nTailwind makes dark mode implementation simple...\n\n## Best Practices\n\n1. Respect user preferences\n2. Provide toggle option\n3. Test contrast ratios\n\n## Code Example\n\n```html\n<div class=\"bg-white dark:bg-gray-900\">\n  <h1 class=\"text-gray-900 dark:text-white\">Hello</h1>\n</div>\n```",
            'javascript' => "# Understanding Async JavaScript\n\nAsynchronous JavaScript is crucial for modern web development...\n\n## Promises\n\nPromises represent the eventual completion of an async operation...\n\n## Async/Await\n\nAsync/await is syntactic sugar over promises...\n\n## Error Handling\n\nProper error handling is essential in async code...\n\n## Common Patterns\n\nLearn these patterns to write better async code...",
            default => "Lorem ipsum dolor sit amet, consectetur adipiscing elit...",
        };
    }
}
