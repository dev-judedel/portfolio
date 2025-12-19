<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'TechVision Solutions',
                'position' => 'Senior Full-Stack Developer',
                'location' => 'Manila, Philippines',
                'description' => 'Leading development of enterprise web applications serving 100K+ users. Architected scalable Laravel backends with React and Vue.js frontends. Implemented microservices architecture and RESTful APIs. Mentored a team of 5 junior developers and conducted comprehensive code reviews. Spearheaded the migration from legacy systems to modern cloud-based infrastructure, improving performance by 40%.',
                'start_date' => Carbon::create(2022, 3, 1)->format('Y-m-d'),
                'end_date' => null,
                'is_current' => true,
                'technologies' => ['Laravel', 'React', 'Vue.js', 'MySQL', 'PostgreSQL', 'AWS', 'Docker', 'Redis', 'Git'],
                'company_logo' => null,
                'order' => 0,
            ],
            [
                'company' => 'Digital Innovators Inc.',
                'position' => 'Full-Stack Developer',
                'location' => 'Remote',
                'description' => 'Developed and maintained 15+ client projects using modern web technologies. Collaborated with cross-functional teams including designers, project managers, and QA specialists to deliver high-quality solutions. Implemented CI/CD pipelines using GitHub Actions and automated testing frameworks. Built custom CMS platforms and e-commerce solutions that increased client revenue by an average of 30%.',
                'start_date' => Carbon::create(2020, 6, 1)->format('Y-m-d'),
                'end_date' => Carbon::create(2022, 2, 28)->format('Y-m-d'),
                'is_current' => false,
                'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL', 'Tailwind CSS', 'Git', 'Docker'],
                'company_logo' => null,
                'order' => 1,
            ],
            [
                'company' => 'WebCraft Studios',
                'position' => 'Web Developer',
                'location' => 'Quezon City, Philippines',
                'description' => 'Built responsive web applications and landing pages for diverse clients across multiple industries. Worked closely with UI/UX designers to implement pixel-perfect interfaces and ensure optimal user experience. Contributed to open-source projects and developed internal tools that improved team productivity by 25%. Participated in agile development processes and daily standups.',
                'start_date' => Carbon::create(2019, 2, 1)->format('Y-m-d'),
                'end_date' => Carbon::create(2020, 5, 31)->format('Y-m-d'),
                'is_current' => false,
                'technologies' => ['PHP', 'JavaScript', 'MySQL', 'Bootstrap', 'jQuery', 'WordPress'],
                'company_logo' => null,
                'order' => 2,
            ],
            [
                'company' => 'StartupHub PH',
                'position' => 'Junior Web Developer',
                'location' => 'Makati, Philippines',
                'description' => 'Assisted in developing web applications and maintaining existing codebases. Learned modern development practices including version control, testing, and deployment strategies. Created custom WordPress themes and plugins for various client websites. Participated in team meetings and contributed ideas for improving development workflows and user experiences.',
                'start_date' => Carbon::create(2018, 8, 1)->format('Y-m-d'),
                'end_date' => Carbon::create(2019, 1, 31)->format('Y-m-d'),
                'is_current' => false,
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'WordPress', 'Git'],
                'company_logo' => null,
                'order' => 3,
            ],
            [
                'company' => 'Freelance',
                'position' => 'Web Developer & Designer',
                'location' => 'Bulacan, Philippines',
                'description' => 'Provided web development and design services to local businesses and startups. Created custom websites, e-commerce solutions, and brand identities. Managed complete project lifecycles from client consultation and requirements gathering to deployment and maintenance. Built long-term relationships with clients through excellent communication and delivering projects on time and within budget.',
                'start_date' => Carbon::create(2017, 6, 1)->format('Y-m-d'),
                'end_date' => Carbon::create(2018, 7, 31)->format('Y-m-d'),
                'is_current' => false,
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'WordPress', 'Photoshop', 'Figma'],
                'company_logo' => null,
                'order' => 4,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
