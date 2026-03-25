

<?php $__env->startSection('meta_title', $page->meta_title ?? 'Our Services – Web, Mobile, Cloud & AI'); ?>
<?php $__env->startSection('meta_description', $page->meta_description ?? 'Explore our full range of software development services.'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <?php if($page && $page->banner_image): ?>
    <img src="<?php echo e(asset('storage/'.$page->banner_image)); ?>" alt="Services" class="page-hero-image" />
    <?php else: ?>
    <img src="<?php echo e(asset('assets/images/hero-bg-img-2.png')); ?>" alt="Services" class="page-hero-image" />
    <?php endif; ?>
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <h1 class="page-hero-title">Our <span class="text-gradient">Services</span></h1>
        <p class="page-hero-sub">Comprehensive technology solutions designed to accelerate your business growth.</p>
    </div>
</section>

<section style="padding:100px 0">
    <div class="container">
        <div style="text-align:center;margin-bottom:60px" class="reveal">
            <span class="section-tag">What We Offer</span>
            <h2 class="section-title">Services That Drive <span class="text-gradient">Real Results</span></h2>
            <p class="section-subtitle" style="margin:0 auto">From concept to deployment, we cover the entire technology
                spectrum for your business.</p>
        </div>

        <div class="services-grid">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service-card reveal reveal-delay-<?php echo e(($i%3)+1); ?>">
                <?php if($service->image && !str_starts_with($service->image,'assets/')): ?>
                <img src="<?php echo e(asset('storage/'.$service->image)); ?>" alt="<?php echo e($service->title); ?>"
                    class="service-card-img" />
                <?php elseif($service->image): ?>
                <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>" class="service-card-img" />
                <?php else: ?>
                <img src="<?php echo e(asset('assets/images/web-dev-img.png')); ?>" alt="<?php echo e($service->title); ?>"
                    class="service-card-img" />
                <?php endif; ?>
                <div class="service-card-overlay"></div>
                <div class="service-card-content">
                    <h3 class="service-title"><?php echo e($service->icon); ?> <?php echo e($service->title); ?></h3>
                    <p style="color:rgba(255,255,255,0.8);font-size:0.9rem;margin-bottom:16px;line-height:1.6">
                        <?php echo e(Str::limit($service->short_description, 100)); ?></p>
                    <a href="<?php echo e(route('services.show', $service->slug)); ?>" class="service-link">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="features-section">
    <div class="container">
        <div style="text-align:center;margin-bottom:60px" class="reveal">
            <span class="section-tag">Why Accrosian</span>
            <h2 class="section-title">Built for <span class="text-gradient">Performance & Scale</span></h2>
        </div>
        <div class="features-grid">
            <?php $__currentLoopData = [['⚡','Fast Delivery','Agile processes ensure rapid delivery without sacrificing
            quality.'],['🔒','Enterprise Security','Bank-grade security practices baked into every
            layer.'],['📈','Scalable Architecture','Systems designed to grow from startup to
            enterprise.'],['🤝','Dedicated Support','24/7 support teams ensuring your systems run flawlessly.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="feature-card reveal">
                <div class="feature-icon"><?php echo e($f[0]); ?></div>
                <h3 class="feature-title"><?php echo e($f[1]); ?></h3>
                <p class="feature-text"><?php echo e($f[2]); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Get Started</span>
        <h2 class="cta-title">Not Sure Which Service <span class="text-gradient">You Need?</span></h2>
        <p class="cta-subtitle">Book a free consultation and our experts will guide you to the perfect solution.</p>
        <div class="cta-actions">
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary btn-arrow">Free Consultation</a>
            <a href="<?php echo e(route('portfolio')); ?>" class="btn btn-outline">See Our Work</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/services.blade.php ENDPATH**/ ?>