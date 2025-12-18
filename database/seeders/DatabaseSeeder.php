<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ProfileSeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            TestimonialSeeder::class,
            SettingSeeder::class,
        ]);
    }
}

