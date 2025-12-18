<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'description' => 'Articles about web development, frameworks, and best practices'],
            ['name' => 'UI/UX Design', 'description' => 'Design principles, trends, and user experience insights'],
            ['name' => 'Tutorials', 'description' => 'Step-by-step guides and how-to articles'],
            ['name' => 'Career', 'description' => 'Career advice, tips, and industry insights'],
            ['name' => 'Tools & Resources', 'description' => 'Useful tools, libraries, and resources for developers'],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
