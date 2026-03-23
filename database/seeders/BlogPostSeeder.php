<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'The Future of AI in Software Development',
                'slug'         => 'future-of-ai-in-software-development',
                'excerpt'      => 'Explore how artificial intelligence is transforming the way we write, test, and deploy software.',
                'content'      => '<p>Artificial Intelligence is no longer just a buzzword — it\'s actively reshaping how software teams work. From AI-powered code completion to automated testing and intelligent DevOps, the landscape is evolving rapidly.</p><h2>AI-Powered Development Tools</h2><p>Tools like GitHub Copilot, Tabnine, and Amazon CodeWhisperer are already helping developers write code faster. These tools learn from millions of codebases to suggest context-aware completions.</p><h2>Automated Testing with AI</h2><p>AI-driven testing platforms can now generate test cases automatically, identify edge cases humans might miss, and even predict where bugs are most likely to occur based on historical data.</p><h2>The Road Ahead</h2><p>As AI capabilities improve, we expect to see increasingly autonomous development pipelines where AI handles routine tasks while humans focus on creative problem-solving and architecture decisions.</p>',
                'meta_title'   => 'The Future of AI in Software Development – Accrosian Blog',
                'meta_description' => 'Explore how AI is transforming software development with AI-powered tools, automated testing, and intelligent DevOps.',
                'status'       => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'Why Your Business Needs a Mobile-First Strategy',
                'slug'         => 'business-needs-mobile-first-strategy',
                'excerpt'      => 'With over 60% of web traffic coming from mobile devices, a mobile-first approach is no longer optional.',
                'content'      => '<p>The statistics are clear: mobile devices now account for the majority of internet usage worldwide. If your business doesn\'t have a mobile-first strategy, you\'re losing customers to competitors who do.</p><h2>What Does Mobile-First Mean?</h2><p>Mobile-first design means starting your design and development process with the mobile experience in mind, then scaling up to larger screens. This is the opposite of the old desktop-first approach.</p><h2>Benefits of Mobile-First</h2><ul><li>Better user experience on the most-used devices</li><li>Improved SEO (Google uses mobile-first indexing)</li><li>Faster load times with optimized assets</li><li>Higher conversion rates</li></ul>',
                'meta_title'   => 'Why Your Business Needs a Mobile-First Strategy – Accrosian',
                'meta_description' => 'Learn why mobile-first design is essential for businesses in 2024 and how to implement it effectively.',
                'status'       => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'Cloud Migration: A Step-by-Step Guide for Businesses',
                'slug'         => 'cloud-migration-guide-for-businesses',
                'excerpt'      => 'Thinking about moving to the cloud? Here\'s everything you need to know to make the transition smooth and successful.',
                'content'      => '<p>Cloud migration can seem daunting, but with the right approach, it can transform your business operations. This guide walks you through the entire process from assessment to go-live.</p><h2>Step 1: Assess Your Current Infrastructure</h2><p>Before migrating, you need a clear picture of what you have. Document all applications, databases, and dependencies.</p><h2>Step 2: Choose Your Cloud Strategy</h2><p>The "6 R\'s" of cloud migration: Rehost, Replatform, Repurchase, Refactor, Retire, Retain. Choose the right strategy for each workload.</p><h2>Step 3: Plan and Execute</h2><p>Create a detailed migration plan with timelines, risk assessments, and rollback procedures. Always migrate non-critical workloads first.</p>',
                'meta_title'   => 'Cloud Migration Guide for Businesses – Accrosian',
                'meta_description' => 'A complete step-by-step guide to cloud migration including assessment, strategy selection, and execution.',
                'status'       => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
