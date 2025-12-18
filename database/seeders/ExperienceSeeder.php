<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'TechCorp Solutions',
                'position' => 'Senior Full-Stack Developer',
                'location' => 'San Francisco, CA',
                'description' => 'Led development of enterprise web applications serving 100K+ users. Architected scalable Laravel backends and React frontends. Mentored junior developers and conducted code reviews.',
                'start_date' => '2022-01-01',
                'end_date' => null,
                'is_current' => true,
                'technologies' => ['Laravel', 'React', 'MySQL', 'AWS', 'Docker'],
                'order' => 1,
            ],
            [
                'company' => 'Digital Innovators',
                'position' => 'Full-Stack Developer',
                'location' => 'Remote',
                'description' => 'Developed and maintained multiple client projects using modern web technologies. Collaborated with cross-functional teams to deliver high-quality solutions. Implemented CI/CD pipelines and automated testing.',
                'start_date' => '2020-03-01',
                'end_date' => '2021-12-31',
                'is_current' => false,
                'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL', 'Git'],
                'order' => 2,
            ],
            [
                'company' => 'StartupHub Inc',
                'position' => 'Junior Web Developer',
                'location' => 'Austin, TX',
                'description' => 'Built responsive web applications and landing pages. Worked closely with designers to implement pixel-perfect UIs. Contributed to open-source projects and internal tools.',
                'start_date' => '2019-01-01',
                'end_date' => '2020-02-28',
                'is_current' => false,
                'technologies' => ['PHP', 'JavaScript', 'MySQL', 'Bootstrap'],
                'order' => 3,
            ],
            [
                'company' => 'Freelance',
                'position' => 'Web Developer & Designer',
                'location' => 'Remote',
                'description' => 'Provided web development and design services to local businesses and startups. Created custom WordPress themes and e-commerce solutions. Managed client relationships and project timelines.',
                'start_date' => '2018-06-01',
                'end_date' => '2018-12-31',
                'is_current' => false,
                'technologies' => ['WordPress', 'PHP', 'JavaScript', 'CSS'],
                'order' => 4,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
