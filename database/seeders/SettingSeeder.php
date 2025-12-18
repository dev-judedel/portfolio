<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'Jude Dela Cruz - Portfolio', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Full-Stack Developer & UI/UX Designer', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Professional portfolio showcasing web development projects and design work', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => 'images/logo.png', 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => 'images/favicon.ico', 'type' => 'image', 'group' => 'general'],
            ['key' => 'default_theme', 'value' => 'dark', 'type' => 'text', 'group' => 'general'],

            // Contact Settings
            ['key' => 'contact_email', 'value' => 'judedelacruz2025@gmail.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+63 (956) 130-5511', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Bulacan, PH', 'type' => 'text', 'group' => 'contact'],

            // Social Media
            ['key' => 'github_url', 'value' => 'https://github.com/dev-judedel', 'type' => 'text', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/in/', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/', 'type' => 'text', 'group' => 'social'],
            ['key' => 'dribbble_url', 'value' => 'https://dribbble.com/', 'type' => 'text', 'group' => 'social'],

            // SEO Settings
            ['key' => 'seo_keywords', 'value' => 'web developer, full-stack developer, UI UX designer, Laravel developer', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'google_analytics_id', 'value' => '', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'og_image', 'value' => 'images/og-image.jpg', 'type' => 'image', 'group' => 'seo'],

            // Feature Toggles
            ['key' => 'enable_blog', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
            ['key' => 'enable_testimonials', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
            ['key' => 'enable_dark_mode', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
            ['key' => 'maintenance_mode', 'value' => '0', 'type' => 'boolean', 'group' => 'features'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
