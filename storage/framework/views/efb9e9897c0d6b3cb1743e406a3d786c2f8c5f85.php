<?php $__env->startSection('meta_title', $page->meta_title ?? 'About Accrosian – Our Story & Team'); ?>
<?php $__env->startSection('meta_description', $page->meta_description ?? 'Learn about Accrosian, our mission, values, and the talented
team behind our innovative software solutions.'); ?>

<?php $__env->startSection('content'); ?>


<section class="page-hero">
    <?php if($page && $page->banner_image): ?>
    <img src="<?php echo e(asset('storage/'.$page->banner_image)); ?>" alt="About Accrosian Banner" class="page-hero-image" />
    <?php else: ?>
    <img src="<?php echo e(asset('assets/images/hero-bg-img-2.png')); ?>" alt="About Accrosian Banner" class="page-hero-image" />
    <?php endif; ?>
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <h1 class="page-hero-title">About <span class="text-gradient">Accrosian</span></h1>
        <p class="page-hero-sub">We are a team of passionate technologists turning ambitious ideas into world-class
            digital products since 2016.</p>
    </div>
</section>


<section class="about-intro">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrap reveal">
                <div class="about-image-main">
                    <img src="<?php echo e(asset('assets/images/about-us-img.png')); ?>" alt="About Accrosian"
                        class="page-hero-image" />
                    <div class="about-image-icon">🏢</div>
                    <h3 style="font-family:var(--font-display);font-size:1.5rem;font-weight:800;">Accrosian Technologies
                    </h3>
                    <p style="color:var(--text-light);margin-top:12px">Building the digital future, one project at a
                        time.</p>
                </div>
                <div class="about-badge-floating">
                    <div class="about-badge-num">8+</div>
                    <div class="about-badge-text">Years of Excellence</div>
                </div>
            </div>
            <div class="reveal reveal-delay-2">
                <span class="section-tag">Our Story</span>
                <h2 class="section-title">Who We <span class="text-gradient">Are</span></h2>
                <p style="color:var(--text-light);line-height:1.8;margin-bottom:24px">
                    Founded in Bhubaneswar, Odisha, Accrosian emerged from a simple belief: every great idea deserves
                    extraordinary execution. Since 2016, we've been partnering with startups and enterprises alike to
                    deliver software solutions that don't just meet expectations — they redefine them.
                </p>
                <p style="color:var(--text-light);line-height:1.8;margin-bottom:36px">
                    Our multidisciplinary team of developers, designers, data scientists, and strategists brings
                    together decades of combined expertise across web, mobile, cloud, and AI technologies. We don't just
                    write code — we craft experiences that drive measurable business outcomes.
                </p>
                <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary">Work With Us</a>
            </div>
        </div>

        <div class="values-grid" style="margin-top:80px">
            <div class="value-item reveal">
                <div class="value-icon">💡</div>
                <h4 class="value-title">Innovation First</h4>
                <p class="value-text">We embrace emerging technologies and creative thinking to deliver solutions ahead
                    of their time.</p>
            </div>
            <div class="value-item reveal reveal-delay-1">
                <div class="value-icon">🎯</div>
                <h4 class="value-title">Results Driven</h4>
                <p class="value-text">Every decision is aligned with tangible business outcomes and measurable success
                    metrics.</p>
            </div>
            <div class="value-item reveal reveal-delay-2">
                <div class="value-icon">🤝</div>
                <h4 class="value-title">True Partnership</h4>
                <p class="value-text">We're not just vendors — we're long-term partners invested in your growth and
                    success.</p>
            </div>
            <div class="value-item reveal reveal-delay-3">
                <div class="value-icon">✨</div>
                <h4 class="value-title">Quality Obsessed</h4>
                <p class="value-text">Uncompromising standards at every stage, from architecture to final pixel-perfect
                    delivery.</p>
            </div>
        </div>
    </div>
</section>


<section class="mission-vision">
    <div class="container">
        <div style="text-align:center;margin-bottom:60px" class="reveal">
            <span class="section-tag">Purpose</span>
            <h2 class="section-title">Mission & <span class="text-gradient">Vision</span></h2>
        </div>
        <div class="mv-grid">
            <div class="mv-card reveal">
                <div class="mv-icon">🎯</div>
                <h3 class="mv-title">Our Mission</h3>
                <p class="mv-text">To empower businesses of all sizes with transformative technology solutions that are
                    powerful, scalable, and built to last. We are committed to delivering software that solves real
                    problems, creates real value, and enables our clients to compete boldly in the digital economy.</p>
                <ul style="margin-top:24px;list-style:none;display:flex;flex-direction:column;gap:10px">
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Deliver world-class software solutions</li>
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Foster long-term client partnerships</li>
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Drive measurable business impact</li>
                </ul>
            </div>
            <div class="mv-card reveal reveal-delay-2">
                <div class="mv-icon">🔭</div>
                <h3 class="mv-title">Our Vision</h3>
                <p class="mv-text">To become South Asia's most trusted technology partner — recognized globally for our
                    innovation, integrity, and the extraordinary outcomes we create for our clients. We envision a
                    future where technology bridges every gap between great ideas and their fullest potential.</p>
                <ul style="margin-top:24px;list-style:none;display:flex;flex-direction:column;gap:10px">
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Lead in AI and emerging tech innovation</li>
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Expand globally while staying rooted locally</li>
                    <li style="display:flex;align-items:center;gap:10px;color:var(--text-light);font-size:0.9rem"><span
                            style="color:var(--orange)">✓</span> Champion digital inclusion across industries</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section style="padding:80px 0;background:var(--surface)">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:40px;text-align:center">
            <?php $__currentLoopData = [['250+','Projects Delivered'],['98%','Client Satisfaction'],['8+','Years Experience'],['50+','Team
            Members']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="reveal">
                <div style="font-family:var(--font-display);font-size:2.5rem;font-weight:800;color:var(--orange)">
                    <?php echo e($stat[0]); ?></div>
                <div style="color:var(--text-light);margin-top:8px"><?php echo e($stat[1]); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Join Our Journey</span>
        <h2 class="cta-title">Ready to Build <span class="text-gradient">Something Amazing?</span></h2>
        <p class="cta-subtitle">Let's discuss your project and turn your vision into a world-class digital product.</p>
        <div class="cta-actions">
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary btn-arrow">Get In Touch</a>
            <a href="<?php echo e(route('services')); ?>" class="btn btn-outline">Our Services</a>
        </div>
    </div>
</section>


<section class="faq-section">
    <div class="container">
        <div class="faq-header reveal">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">
                Frequently Asked <span class="text-gradient">Questions</span>
            </h2>
            <p class="faq-subtitle">
                Everything you need to know about our services and process.
            </p>
        </div>

        <div class="faq-container">

            <?php
            $faqs = [
            [
            'q' => 'What makes Accrosian a trusted IT company in Hyderabad?',
            'a' => 'We focus on delivering high-quality software solutions, affordable pricing, and long-term
            support, making us a reliable IT company in Hyderabad.'
            ],
            [
            'q' => ' How many years of experience do you have?',
            'a' => 'We have several years of experience in delivering software, web, and digital marketing
            solutions for businesses and startups.'
            ],
            [
            'q' => 'Do you work with startups or only big companies?',
            'a' => 'We work with both startups and established businesses, providing scalable and cost-effective
            IT solutions.'
            ],
            [
            'q' => 'What type of internships do you provide?',
            'a' => 'We offer software internships in Bhubaneswar, web development, and digital marketing
            internships with real-time project experience.'
            ],
            [
            'q' => ' Do you provide certificates after an internship?',
            'a' => 'Yes, we provide internship certificates along with practical project experience.'
            ],
            [
            'q' => ' What is your mission as a company?',
            'a' => 'Our mission is to deliver high-quality IT solutions while helping students and businesses grow
            with real-world technology.'
            ],
            ];
            ?>

            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="faq-item">
                <button class="faq-question">
                    <span><?php echo e($faq['q']); ?></span>
                    <span class="faq-icon">+</span>
                </button>

                <div class="faq-answer">
                    <p><?php echo e($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/about.blade.php ENDPATH**/ ?>