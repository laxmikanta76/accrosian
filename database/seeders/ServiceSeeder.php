<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'             => 'Web Development',
                'slug'              => 'web-development',
                'icon'              => '🌐',
                'image'             => 'assets/images/web-dev-img.png',
                'short_description' => 'Fast, beautiful, and scalable web solutions built with the latest technologies.',
                'full_description'  => '<p>We build high-performance web applications tailored to your business needs. From landing pages to complex enterprise platforms, our team delivers exceptional digital experiences using React, Vue, Laravel, Node.js, and more.</p><h3>What We Deliver</h3><ul><li>Custom web applications & portals</li><li>E-commerce platforms</li><li>Progressive Web Apps (PWA)</li><li>API development & integration</li><li>Performance optimization</li><li>Ongoing maintenance & support</li></ul>',
                'meta_title'        => 'Web Development Services – Accrosian',
                'meta_description'  => 'Professional web development services including custom web apps, e-commerce, and PWA solutions.',
                'status'            => true,
                'sort_order'        => 1,
            ],
            [
                'title'             => 'Mobile App Development',
                'slug'              => 'mobile-app-development',
                'icon'              => '📱',
                'image'             => 'assets/images/mob-dev-img.png',
                'short_description' => 'Native and cross-platform mobile apps that deliver seamless user experiences.',
                'full_description'  => '<p>We design and develop intuitive mobile applications for iOS and Android. Using React Native and Flutter, we create cross-platform apps that feel native on every device.</p><h3>Our Mobile Services</h3><ul><li>iOS & Android native apps</li><li>Cross-platform development (React Native, Flutter)</li><li>App Store & Play Store deployment</li><li>Push notifications & offline support</li><li>App maintenance & updates</li></ul>',
                'meta_title'        => 'Mobile App Development – Accrosian',
                'meta_description'  => 'Professional mobile app development for iOS and Android using React Native and Flutter.',
                'status'            => true,
                'sort_order'        => 2,
            ],
            [
                'title'             => 'Cloud Solutions',
                'slug'              => 'cloud-solutions',
                'icon'              => '☁️',
                'image'             => 'assets/images/cloud-img.png',
                'short_description' => 'Scalable, secure cloud infrastructure and DevOps solutions for modern businesses.',
                'full_description'  => '<p>We help businesses migrate to the cloud, optimize infrastructure, and implement DevOps best practices. Our experts work with AWS, Azure, and GCP to ensure your systems are scalable, secure, and cost-efficient.</p><h3>Cloud Services</h3><ul><li>Cloud migration & architecture</li><li>AWS, Azure, GCP management</li><li>CI/CD pipeline setup</li><li>Kubernetes & Docker orchestration</li><li>Cost optimization</li><li>24/7 monitoring & support</li></ul>',
                'meta_title'        => 'Cloud Solutions – Accrosian',
                'meta_description'  => 'Scalable cloud infrastructure, DevOps, and migration services for modern businesses.',
                'status'            => true,
                'sort_order'        => 3,
            ],
            [
                'title'             => 'UI/UX Design',
                'slug'              => 'ui-ux-design',
                'icon'              => '🎨',
                'image'             => 'assets/images/UI-img.png',
                'short_description' => 'User-centered design that balances aesthetics with functionality.',
                'full_description'  => '<p>Great software starts with great design. Our UI/UX team crafts intuitive interfaces that delight users and drive engagement. We follow a research-driven process to ensure every design decision is backed by data.</p><h3>Design Services</h3><ul><li>User research & personas</li><li>Wireframing & prototyping</li><li>UI design & design systems</li><li>Usability testing</li><li>Figma & Adobe XD design</li><li>Brand identity & style guides</li></ul>',
                'meta_title'        => 'UI/UX Design Services – Accrosian',
                'meta_description'  => 'User-centered UI/UX design services including prototyping, design systems, and usability testing.',
                'status'            => true,
                'sort_order'        => 4,
            ],
            [
                'title'             => 'AI & Machine Learning',
                'slug'              => 'ai-ml',
                'icon'              => '🤖',
                'image'             => 'assets/images/Ai-img.png',
                'short_description' => 'Intelligent solutions powered by cutting-edge AI and machine learning technologies.',
                'full_description'  => '<p>We build custom AI and ML solutions that give your business a competitive edge. From predictive analytics to NLP and computer vision, our AI team delivers intelligent systems that learn and improve over time.</p><h3>AI/ML Services</h3><ul><li>Custom ML model development</li><li>Natural Language Processing (NLP)</li><li>Computer vision systems</li><li>Predictive analytics</li><li>AI chatbots & virtual assistants</li><li>Data engineering & pipelines</li></ul>',
                'meta_title'        => 'AI & Machine Learning Solutions – Accrosian',
                'meta_description'  => 'Custom AI and ML solutions including NLP, computer vision, predictive analytics, and AI chatbots.',
                'status'            => true,
                'sort_order'        => 5,
            ],
            [
                'title'             => 'IT Consulting',
                'slug'              => 'consulting',
                'icon'              => '💼',
                'image'             => 'assets/images/soft-cons-img.png',
                'short_description' => 'Strategic technology consulting to help your business grow and innovate.',
                'full_description'  => '<p>Our experienced consultants help you navigate the complex technology landscape. We provide strategic guidance on digital transformation, technology stack selection, team building, and process optimization.</p><h3>Consulting Services</h3><ul><li>Digital transformation strategy</li><li>Technology stack consulting</li><li>IT audit & assessment</li><li>Agile & DevOps adoption</li><li>Team building & training</li><li>Vendor selection & management</li></ul>',
                'meta_title'        => 'IT Consulting Services – Accrosian',
                'meta_description'  => 'Strategic IT consulting for digital transformation, technology selection, and process optimization.',
                'status'            => true,
                'sort_order'        => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}