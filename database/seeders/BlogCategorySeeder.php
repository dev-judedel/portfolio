<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'description' => 'Articles about modern web development, frameworks, best practices, and emerging technologies in the web ecosystem.',
            ],
            [
                'name' => 'JavaScript',
                'description' => 'Deep dives into JavaScript, ES6+ features, popular frameworks like React and Vue, and frontend development techniques.',
            ],
            [
                'name' => 'Laravel',
                'description' => 'Laravel tutorials, tips and tricks, package reviews, and PHP backend development insights.',
            ],
            [
                'name' => 'Tutorials',
                'description' => 'Step-by-step guides and how-to articles covering various programming topics and development workflows.',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'User interface design principles, user experience best practices, design trends, and tools for modern designers.',
            ],
            [
                'name' => 'Career & Productivity',
                'description' => 'Career advice for developers, productivity tips, industry insights, and professional growth strategies.',
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
