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
            'title' => 'Full-Stack Developer & UI/UX Designer',
            'tagline' => 'Crafting elegant solutions through code and design',
            'bio' => "I'm a passionate full-stack developer with over 5 years of experience building modern web applications that make a difference. My journey in technology started with a curiosity for how websites work, and it has evolved into a fulfilling career dedicated to creating seamless digital experiences that solve real-world problems.\n\nI specialize in Laravel, React, Vue.js, and modern web technologies, with a strong focus on clean code architecture and user-centered design. I believe that great software is not just about functionality—it's about creating intuitive experiences that users genuinely enjoy. Whether I'm developing robust backend systems, crafting pixel-perfect interfaces, or optimizing database performance, I bring the same level of dedication and attention to detail to every project.\n\nWhen I'm not coding, you'll find me exploring emerging technologies, contributing to open-source projects, mentoring aspiring developers, or sharing knowledge through technical blog posts. I'm always excited to collaborate on innovative projects that push the boundaries of what's possible on the web and make a positive impact on people's lives.",
            'short_bio' => 'Full-stack developer passionate about building scalable web applications with Laravel, React, and modern technologies. Turning creative ideas into elegant digital solutions.',
            'email' => 'judedelacruz2025@gmail.com',
            'phone' => '63 (956) 130-5511',
            'location' => 'Bulacan, Philippines',
            'social_links' => [
                'github' => 'https://github.com/judedelacruz',
                'linkedin' => 'https://linkedin.com/in/judedelacruz',
                'twitter' => 'https://twitter.com/judedelacruz',
                'dribbble' => 'https://dribbble.com/judedelacruz',
                'dev' => 'https://dev.to/judedelacruz',
                'instagram' => 'https://instagram.com/judedelacruz',
            ],
            'years_experience' => 5,
            'projects_completed' => 50,
            'happy_clients' => 30,
            'profile_image' => null,
            'cv_file' => null,
        ]);
    }
}
