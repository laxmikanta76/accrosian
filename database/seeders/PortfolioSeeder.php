<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'E-Commerce Platform', 'slug' => 'ecommerce-platform', 'category' => 'Web Development', 'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js, handling 10,000+ daily transactions.', 'status' => true, 'sort_order' => 1],
            ['title' => 'Healthcare Mobile App', 'slug' => 'healthcare-mobile-app', 'category' => 'Mobile Apps', 'description' => 'A React Native telemedicine app connecting patients with doctors, serving 50,000+ users.', 'status' => true, 'sort_order' => 2],
            ['title' => 'AI Analytics Dashboard', 'slug' => 'ai-analytics-dashboard', 'category' => 'AI & ML', 'description' => 'Real-time business analytics platform powered by machine learning and predictive models.', 'status' => true, 'sort_order' => 3],
            ['title' => 'Cloud Migration Project', 'slug' => 'cloud-migration-project', 'category' => 'Cloud Solutions', 'description' => 'Migrated a legacy monolith to microservices on AWS, reducing infrastructure costs by 40%.', 'status' => true, 'sort_order' => 4],
            ['title' => 'FinTech Banking App', 'slug' => 'fintech-banking-app', 'category' => 'Mobile Apps', 'description' => 'Secure digital banking application with biometric auth, instant transfers, and investment tracking.', 'status' => true, 'sort_order' => 5],
            ['title' => 'SaaS Project Management Tool', 'slug' => 'saas-project-management', 'category' => 'Web Development', 'description' => 'End-to-end project management SaaS platform with real-time collaboration features.', 'status' => true, 'sort_order' => 6],
        ];
        foreach ($items as $item) {
            PortfolioItem::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
