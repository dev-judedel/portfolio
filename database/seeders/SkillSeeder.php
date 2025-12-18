<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Frontend
            ['name' => 'HTML5', 'category' => 'Frontend', 'proficiency' => 95, 'icon' => 'fab fa-html5', 'is_featured' => true, 'order' => 1],
            ['name' => 'CSS3', 'category' => 'Frontend', 'proficiency' => 95, 'icon' => 'fab fa-css3-alt', 'is_featured' => true, 'order' => 2],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 90, 'icon' => 'fab fa-js', 'is_featured' => true, 'order' => 3],
            ['name' => 'React', 'category' => 'Frontend', 'proficiency' => 85, 'icon' => 'fab fa-react', 'is_featured' => true, 'order' => 4],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency' => 80, 'icon' => 'fab fa-vuejs', 'is_featured' => false, 'order' => 5],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 90, 'icon' => 'fas fa-wind', 'is_featured' => true, 'order' => 6],

            // Backend
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 92, 'icon' => 'fab fa-php', 'is_featured' => true, 'order' => 7],
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 95, 'icon' => 'fab fa-laravel', 'is_featured' => true, 'order' => 8],
            ['name' => 'Node.js', 'category' => 'Backend', 'proficiency' => 82, 'icon' => 'fab fa-node-js', 'is_featured' => true, 'order' => 9],
            ['name' => 'Python', 'category' => 'Backend', 'proficiency' => 75, 'icon' => 'fab fa-python', 'is_featured' => false, 'order' => 10],

            // Database
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 88, 'icon' => 'fas fa-database', 'is_featured' => true, 'order' => 11],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'proficiency' => 80, 'icon' => 'fas fa-database', 'is_featured' => false, 'order' => 12],
            ['name' => 'MongoDB', 'category' => 'Database', 'proficiency' => 75, 'icon' => 'fas fa-leaf', 'is_featured' => false, 'order' => 13],

            // Tools & Others
            ['name' => 'Git', 'category' => 'Tools', 'proficiency' => 90, 'icon' => 'fab fa-git-alt', 'is_featured' => true, 'order' => 14],
            ['name' => 'Docker', 'category' => 'Tools', 'proficiency' => 78, 'icon' => 'fab fa-docker', 'is_featured' => false, 'order' => 15],
            ['name' => 'Figma', 'category' => 'Design', 'proficiency' => 85, 'icon' => 'fab fa-figma', 'is_featured' => true, 'order' => 16],
            ['name' => 'Adobe XD', 'category' => 'Design', 'proficiency' => 80, 'icon' => 'fas fa-pen-nib', 'is_featured' => false, 'order' => 17],
            ['name' => 'REST API', 'category' => 'Backend', 'proficiency' => 90, 'icon' => 'fas fa-plug', 'is_featured' => false, 'order' => 18],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
