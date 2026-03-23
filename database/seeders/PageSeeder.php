<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['title' => 'Home', 'slug' => 'home', 'meta_title' => 'Accrosian – Turning Ideas Into Reality', 'meta_description' => 'Accrosian is a premium software company delivering innovative web, mobile, cloud, and AI solutions.', 'status' => true],
            ['title' => 'About Us', 'slug' => 'about', 'meta_title' => 'About Accrosian – Our Story & Team', 'meta_description' => 'Learn about Accrosian, our mission, values, and the team behind our innovative software solutions.', 'status' => true],
            ['title' => 'Services', 'slug' => 'services', 'meta_title' => 'Our Services – Web, Mobile, Cloud & AI', 'meta_description' => 'Explore our full range of software development services including web, mobile, cloud, AI, and consulting.', 'status' => true],
            ['title' => 'Portfolio', 'slug' => 'portfolio', 'meta_title' => 'Our Portfolio – Featured Projects', 'meta_description' => 'Browse our portfolio of successful projects across web, mobile, cloud, and AI domains.', 'status' => true],
            ['title' => 'Blog', 'slug' => 'blog', 'meta_title' => 'Blog – Tech Insights & News', 'meta_description' => 'Stay updated with the latest technology insights, tutorials, and news from the Accrosian team.', 'status' => true],
            ['title' => 'Contact', 'slug' => 'contact', 'meta_title' => 'Contact Accrosian – Get a Quote', 'meta_description' => 'Get in touch with Accrosian for software development projects, consultations, and quotes.', 'status' => true],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
