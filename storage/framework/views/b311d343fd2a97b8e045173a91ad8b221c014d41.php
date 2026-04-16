

<?php $__env->startSection('meta_title', $page->meta_title ?? 'Portfolio – Our Featured Projects'); ?>
<?php $__env->startSection('meta_description', $page->meta_description ?? 'Browse our portfolio of successful projects across web, mobile,
cloud, and AI domains.'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <?php if($page && $page->banner_image): ?>
    <img src="<?php echo e(asset('storage/'.$page->banner_image)); ?>" alt="Portfolio" class="page-hero-image" />
    <?php else: ?>
    <img src="<?php echo e(asset('assets/images/hero-bg-img-2.png')); ?>" alt="Portfolio" class="page-hero-image" />
    <?php endif; ?>
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <h1 class="page-hero-title">Our <span class="text-gradient">Portfolio</span></h1>
        <p class="page-hero-sub">Real projects, real results — explore our work across industries and technologies.</p>
    </div>
</section>


<section class="port-filter-section">
    <div class="port-filter-inner reveal">
        <button class="port-filter-btn active" data-filter="all">All Projects</button>
        <button class="port-filter-btn" data-filter="web">Web Development</button>
        <button class="port-filter-btn" data-filter="mobile">Mobile Apps</button>
        <button class="port-filter-btn" data-filter="ai">AI &amp; ML</button>
        <button class="port-filter-btn" data-filter="cloud">Cloud Solutions</button>
        <button class="port-filter-btn" data-filter="design">UI/UX Design</button>
    </div>
</section>


<div style="background:var(--navy)">
    <div class="showcase-label-bar reveal">
        <div class="showcase-label-left">
            <span class="showcase-label-tag">Featured Work</span>
            <span style="color:var(--glass-border);font-size:1.2rem">·</span>
            <span class="showcase-label-title">Swipe to Explore</span>
        </div>
        <div class="showcase-hint">
            <div class="showcase-hint-icon">←</div>
            <span>Drag or use arrows to navigate</span>
            <div class="showcase-hint-icon">→</div>
        </div>
    </div>
</div>


<section style="padding:20px 0 0; background:var(--navy)">
    <div class="showcase-track-wrap">
        <div class="showcase-track" id="showcaseTrack">
            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="showcase-card" data-index="<?php echo e($i); ?>">
                <div class="showcase-card-inner">
                    <?php if($item->image && !str_starts_with($item->image,'assets/')): ?>
                    <img src="<?php echo e(asset('storage/'.$item->image)); ?>" alt="<?php echo e($item->title); ?>" class="showcase-img" />
                    <?php else: ?>
                    <img src="<?php echo e(asset('assets/images/about-us.jpg')); ?>" alt="<?php echo e($item->title); ?>"
                        class="showcase-img" />
                    <?php endif; ?>
                    <div class="showcase-overlay"></div>
                    <div class="showcase-content">
                        <?php if($item->category): ?>
                        <span class="showcase-tag"><?php echo e($item->category); ?></span>
                        <?php endif; ?>
                        <h3 class="showcase-title"><?php echo e($item->title); ?></h3>
                        <?php if($item->description): ?>
                        <p class="showcase-desc"><?php echo e(Str::limit($item->description, 90)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="text-align:center;padding:80px;color:var(--text-light);min-width:100vw">
                <div style="font-size:3rem;margin-bottom:16px">🚧</div>
                <h3>Portfolio Coming Soon</h3>
            </div>
            <?php endif; ?>
        </div>

        <div class="showcase-dots" id="showcaseDots">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="showcase-dot <?php echo e($i === 0 ? 'active' : ''); ?>" data-index="<?php echo e($i); ?>"></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button class="showcase-arrow showcase-arrow-left" id="showcasePrev">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M15 18l-6-6 6-6" />
            </svg>
        </button>
        <button class="showcase-arrow showcase-arrow-right" id="showcaseNext">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </button>
    </div>
</section>


<section class="port-industries">
    <div class="port-industries-inner">
        <div style="text-align:center" class="reveal">
            <span class="section-tag">Industries</span>
            <h2 class="section-title">Sectors We've <span class="text-gradient">Transformed</span></h2>
            <p class="section-subtitle" style="margin:0 auto">From fintech to healthcare — our solutions drive real
                results across every vertical.</p>
        </div>

        <div class="port-industries-grid">
            <div class="industry-card reveal reveal-delay-1">
                <span class="industry-icon">🏥</span>
                <div class="industry-name">Healthcare</div>
            </div>
            <div class="industry-card reveal reveal-delay-1">
                <span class="industry-icon">💰</span>
                <div class="industry-name">FinTech</div>
            </div>
            <div class="industry-card reveal reveal-delay-2">
                <span class="industry-icon">🛒</span>
                <div class="industry-name">E-Commerce</div>
            </div>
            <div class="industry-card reveal reveal-delay-2">
                <span class="industry-icon">🎓</span>
                <div class="industry-name">EdTech</div>
            </div>
            <div class="industry-card reveal reveal-delay-3">
                <span class="industry-icon">🏭</span>
                <div class="industry-name">Manufacturing</div>
            </div>
            <div class="industry-card reveal reveal-delay-3">
                <span class="industry-icon">🚚</span>
                <div class="industry-name">Logistics</div>
            </div>
            <div class="industry-card reveal reveal-delay-1">
                <span class="industry-icon">🏨</span>
                <div class="industry-name">Hospitality</div>
            </div>
            <div class="industry-card reveal reveal-delay-2">
                <span class="industry-icon">🔐</span>
                <div class="industry-name">Cybersecurity</div>
            </div>
            <div class="industry-card reveal reveal-delay-2">
                <span class="industry-icon">📱</span>
                <div class="industry-name">SaaS</div>
            </div>
            <div class="industry-card reveal reveal-delay-3">
                <span class="industry-icon">🌐</span>
                <div class="industry-name">Media &amp; Tech</div>
            </div>
            <div class="industry-card reveal reveal-delay-3">
                <span class="industry-icon">🏠</span>
                <div class="industry-name">Real Estate</div>
            </div>
            <div class="industry-card reveal reveal-delay-4">
                <span class="industry-icon">🎮</span>
                <div class="industry-name">Gaming</div>
            </div>
        </div>
    </div>
</section>


<section class="port-process">
    <div class="port-process-inner">
        <div style="text-align:center" class="reveal">
            <span class="section-tag">Our Process</span>
            <h2 class="section-title">How We Build <span class="text-gradient">Extraordinary</span> Products</h2>
            <p class="section-subtitle" style="margin:0 auto">Every project follows a proven process that ensures
                quality, transparency, and on-time delivery.</p>
        </div>

        <div class="port-process-steps">
            <div class="port-proc-step reveal reveal-delay-1">
                <div class="port-proc-num">
                    🎯
                    <div class="port-proc-num-badge">01</div>
                </div>
                <div class="port-proc-title">Discovery</div>
                <div class="port-proc-desc">We understand your goals, challenges, and vision to define the perfect
                    strategy.</div>
            </div>
            <div class="port-proc-step reveal reveal-delay-2">
                <div class="port-proc-num">
                    🎨
                    <div class="port-proc-num-badge">02</div>
                </div>
                <div class="port-proc-title">Design</div>
                <div class="port-proc-desc">Our designers craft intuitive, modern UI/UX experiences that users love.
                </div>
            </div>
            <div class="port-proc-step reveal reveal-delay-3">
                <div class="port-proc-num">
                    💻
                    <div class="port-proc-num-badge">03</div>
                </div>
                <div class="port-proc-title">Development</div>
                <div class="port-proc-desc">We build secure, scalable solutions using modern battle-tested technologies.
                </div>
            </div>
            <div class="port-proc-step reveal reveal-delay-4">
                <div class="port-proc-num">
                    🚀
                    <div class="port-proc-num-badge">04</div>
                </div>
                <div class="port-proc-title">Launch &amp; Scale</div>
                <div class="port-proc-desc">We deploy, monitor, and continuously optimise for long-term growth.</div>
            </div>
        </div>
    </div>
</section>


<section class="port-testimonials">
    <div class="port-testi-inner">
        <div style="text-align:center" class="reveal">
            <span class="section-tag">Client Love</span>
            <h2 class="section-title">What Our Clients <span class="text-gradient">Say</span></h2>
        </div>

        <div class="port-testi-grid">
            <div class="port-testi-card reveal reveal-delay-1">
                <div class="port-testi-stars">★★★★★</div>
                <p class="port-testi-text">"Accrosian transformed our entire platform. Their team's technical expertise
                    and commitment to our vision was extraordinary. The system handles 10x our previous traffic
                    flawlessly."</p>
                <div class="port-testi-author">
                    <div class="port-testi-avatar">RK</div>
                    <div>
                        <div class="port-testi-name">Rajesh Kumar</div>
                        <div class="port-testi-role">CTO, TechVenture India</div>
                    </div>
                </div>
            </div>

            <div class="port-testi-card reveal reveal-delay-2">
                <div class="port-testi-stars">★★★★★</div>
                <p class="port-testi-text">"The mobile app they developed for us exceeded all expectations. Our user
                    engagement increased by 340% in the first quarter post-launch. World-class team."</p>
                <div class="port-testi-author">
                    <div class="port-testi-avatar">PD</div>
                    <div>
                        <div class="port-testi-name">Priya Desai</div>
                        <div class="port-testi-role">Product Manager, NexaScale</div>
                    </div>
                </div>
            </div>

            <div class="port-testi-card reveal reveal-delay-3">
                <div class="port-testi-stars">★★★★★</div>
                <p class="port-testi-text">"Their AI solution automated 70% of our data workflows, saving hundreds of
                    hours monthly. ROI was evident within the first month of deployment. Highly recommend."</p>
                <div class="port-testi-author">
                    <div class="port-testi-avatar">AM</div>
                    <div>
                        <div class="port-testi-name">Arjun Mehta</div>
                        <div class="port-testi-role">CEO, DataStream Analytics</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Your Project Next?</span>
        <h2 class="cta-title">Let's Create Something <span class="text-gradient">Remarkable</span></h2>
        <p class="cta-subtitle">Join 250+ satisfied clients who've trusted Accrosian to deliver exceptional digital
            products.</p>
        <div class="cta-actions">
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary btn-arrow">Start Your Project</a>
            <a href="<?php echo e(route('services')); ?>" class="btn btn-outline">Our Services</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.querySelectorAll('.portfolio-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.portfolio-filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.portfolio-card').forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
<style>
.portfolio-filter-btn {
    background: var(--card-bg);
    border: 1px solid var(--border);
    color: var(--text-light);
    padding: 8px 20px;
    border-radius: 50px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s;
}

.portfolio-filter-btn:hover,
.portfolio-filter-btn.active {
    background: var(--orange);
    border-color: var(--orange);
    color: #fff;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/portfolio.blade.php ENDPATH**/ ?>