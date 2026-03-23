<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name'        => 'Accrosian',
                'site_title'       => 'Accrosian – Turning Ideas Into Reality',
                'meta_title'       => 'Accrosian – Innovative Software Solutions',
                'meta_description' => 'Accrosian is a premium software company delivering innovative web, mobile, cloud, and AI solutions for modern businesses.',
                'meta_keywords'    => 'software company, web development, mobile apps, cloud solutions, AI, machine learning',
                'footer_text'      => '© ' . date('Y') . ' Accrosian. All Rights Reserved.',
                'contact_email'    => 'hello@accrosian.com',
                'contact_phone'    => '+91 98XXXXXXXX',
                'address'          => 'Bangalore, India',
                'facebook'         => 'https://facebook.com/accrosian',
                'instagram'        => 'https://instagram.com/accrosian',
                'linkedin'         => 'https://linkedin.com/company/accrosian',
                'twitter'          => 'https://twitter.com/accrosian',
            ]
        );
    }
}
