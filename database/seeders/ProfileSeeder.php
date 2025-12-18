<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();

        Profile::create([
            'user_id' => $admin->id,
            'full_name' => 'Jude Dela Cruz',
            'title' => 'Full-Stack Developer',
            'tagline' => 'Crafting Digital Experiences That Matter',
            'short_bio' => 'Passionate developer who loves building elegant solutions to complex problems. Gamer at heart, coder by profession.',
            'bio' => "Hello! I'm Jude, a full-stack developer with a passion for creating beautiful, functional web applications. With over 8 years of experience in the industry, I've worked with startups and established companies to bring their digital visions to life.\n\nI specialize in Laravel, React, and modern web technologies. When I'm not coding, you'll find me gaming, exploring new tech, or contributing to open-source projects.\n\nMy approach combines technical expertise with a deep understanding of user experience, ensuring that every project I work on is not just functional, but delightful to use.",
            'profile_image' => 'profiles/avatar.jpg',
            'cv_file' => 'cv/alex-johnson-cv.pdf',
            'email' => 'hello@alexjohnson.dev',
            'phone' => '+63 (956)-130-5511',
            'location' => 'Bulacan , PH',
            'social_links' => [
                'github' => 'https://github.com/dev-judedel',
                'linkedin' => 'https://linkedin.com/in/',
                'twitter' => 'https://twitter.com/',
                'dribbble' => 'https://dribbble.com/',
            ],
            'years_experience' => 8,
            'projects_completed' => 10,
            'happy_clients' => 1,
        ]);
    }
}
