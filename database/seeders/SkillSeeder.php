<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Frontend Technologies
            ['name' => 'HTML5', 'category' => 'Frontend', 'proficiency' => 95, 'icon' => 'fab fa-html5', 'is_featured' => true, 'order' => 0],
            ['name' => 'CSS3', 'category' => 'Frontend', 'proficiency' => 95, 'icon' => 'fab fa-css3-alt', 'is_featured' => true, 'order' => 1],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 92, 'icon' => 'fab fa-js', 'is_featured' => true, 'order' => 2],
            ['name' => 'React', 'category' => 'Frontend', 'proficiency' => 88, 'icon' => 'fab fa-react', 'is_featured' => true, 'order' => 3],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency' => 90, 'icon' => 'fab fa-vuejs', 'is_featured' => true, 'order' => 4],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 93, 'icon' => 'fas fa-wind', 'is_featured' => true, 'order' => 5],
            ['name' => 'Bootstrap', 'category' => 'Frontend', 'proficiency' => 85, 'icon' => 'fab fa-bootstrap', 'is_featured' => false, 'order' => 6],
            ['name' => 'TypeScript', 'category' => 'Frontend', 'proficiency' => 82, 'icon' => 'fas fa-code', 'is_featured' => false, 'order' => 7],

            // Backend Technologies
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 94, 'icon' => 'fab fa-php', 'is_featured' => true, 'order' => 8],
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 95, 'icon' => 'fab fa-laravel', 'is_featured' => true, 'order' => 9],
            ['name' => 'Node.js', 'category' => 'Backend', 'proficiency' => 85, 'icon' => 'fab fa-node-js', 'is_featured' => true, 'order' => 10],
            ['name' => 'Python', 'category' => 'Backend', 'proficiency' => 78, 'icon' => 'fab fa-python', 'is_featured' => false, 'order' => 11],
            ['name' => 'REST API', 'category' => 'Backend', 'proficiency' => 91, 'icon' => 'fas fa-plug', 'is_featured' => false, 'order' => 12],

            // Database
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 90, 'icon' => 'fas fa-database', 'is_featured' => true, 'order' => 13],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'proficiency' => 83, 'icon' => 'fas fa-database', 'is_featured' => false, 'order' => 14],
            ['name' => 'MongoDB', 'category' => 'Database', 'proficiency' => 77, 'icon' => 'fas fa-leaf', 'is_featured' => false, 'order' => 15],
            ['name' => 'Redis', 'category' => 'Database', 'proficiency' => 80, 'icon' => 'fas fa-server', 'is_featured' => false, 'order' => 16],

            // DevOps & Tools
            ['name' => 'Git', 'category' => 'DevOps', 'proficiency' => 92, 'icon' => 'fab fa-git-alt', 'is_featured' => true, 'order' => 17],
            ['name' => 'Docker', 'category' => 'DevOps', 'proficiency' => 81, 'icon' => 'fab fa-docker', 'is_featured' => false, 'order' => 18],
            ['name' => 'AWS', 'category' => 'DevOps', 'proficiency' => 75, 'icon' => 'fab fa-aws', 'is_featured' => false, 'order' => 19],

            // Design Tools
            ['name' => 'Figma', 'category' => 'Design', 'proficiency' => 88, 'icon' => 'fab fa-figma', 'is_featured' => true, 'order' => 20],
            ['name' => 'Adobe XD', 'category' => 'Design', 'proficiency' => 82, 'icon' => 'fas fa-pen-nib', 'is_featured' => false, 'order' => 21],
            ['name' => 'Photoshop', 'category' => 'Design', 'proficiency' => 79, 'icon' => 'fas fa-image', 'is_featured' => false, 'order' => 22],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
