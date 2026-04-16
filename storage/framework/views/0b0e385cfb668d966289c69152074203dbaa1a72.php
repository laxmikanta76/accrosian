

<?php $__env->startSection('meta_title', $service->meta_title ?? $service->title.' – Accrosian'); ?>
<?php $__env->startSection('meta_description', $service->meta_description ?? $service->short_description); ?>
<?php $__env->startSection('meta_keywords', $service->meta_keywords ?? ''); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <?php if($service->hero_image): ?>
    <img src="<?php echo e(asset('storage/'.$service->hero_image)); ?>" alt="<?php echo e($service->title); ?>" class="page-hero-image" />
    <?php elseif($service->image && !str_starts_with($service->image,'assets/')): ?>
    <img src="<?php echo e(asset('storage/'.$service->image)); ?>" alt="<?php echo e($service->title); ?>" class="page-hero-image" />
    <?php elseif($service->image): ?>
    <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>" class="page-hero-image" />
    <?php else: ?>
    <img src="<?php echo e(asset('assets/images/hero-bg-img-2.png')); ?>" alt="<?php echo e($service->title); ?>" class="page-hero-image" />
    <?php endif; ?>
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.1"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <!-- <div style="font-size:4rem;margin-bottom:16px"><?php echo e($service->icon); ?></div> -->
        <h1 class="page-hero-title"><span class="text-gradient"><?php echo e($service->title); ?></span></h1>
        <p class="page-hero-sub">Right from conceptualization to planning and development to deployment, we prioritize
            collaboration and transparency at every stage of mobile app development.</p>
        <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary">Get a Quote</a>
    </div>

</section>

<section style="padding:100px 0">
    <div style="max-width:100%;padding:0 40px">

        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:25px;align-items:start;" class="reveal">
            <div>
                <!-- <span class="section-tag">Overview</span> -->
                <h2 class="section-title">What We <span class="text-gradient">Offer</span></h2>
                <p style="color:var(--text-light);line-height:1.8;margin-top:16px;font-size:1.05rem;">
                    <?php echo e($service->short_description); ?>

                </p>
            </div>
            <div class="reveal reveal-delay-2">
                <?php if($service->image && !str_starts_with($service->image,'assets/')): ?>
                <img src="<?php echo e(asset('storage/'.$service->image)); ?>" alt="<?php echo e($service->title); ?>"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                <?php elseif($service->image): ?>
                <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->title); ?>"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                <?php else: ?>
                <img src="<?php echo e(asset('assets/images/web-dev-img.png')); ?>" alt="<?php echo e($service->title); ?>"
                    style="width:100%;max-height:450px;border-radius:16px;object-fit:cover;object-position:center;" />
                <?php endif; ?>
            </div>
        </div>

        
        <div style="margin-top:10px;color:var(--text-light);line-height:1.8;" class="service-full-desc reveal">
            <?php echo $service->full_description; ?>

        </div>

        
        <div style="margin-top:36px;display:flex;gap:16px;flex-wrap:wrap;" class="reveal">
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary">Get a Quote</a>
            <a href="<?php echo e(route('services')); ?>" class="btn btn-outline">All Services</a>
        </div>

    </div>
</section>

<?php if($others->isNotEmpty()): ?>
<section style="padding:10px 0;background:var(--surface)">
    <div class="container">
        <div style="text-align:center;margin-bottom:48px">
            <span class="section-tag">Explore More</span>
            <h2 class="section-title">Other <span class="text-gradient">Services</span></h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:24px">
            <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('services.show', $other->slug)); ?>"
                style="background:var(--card-bg);border:1px solid var(--border);border-radius:12px;padding:24px;text-decoration:none;transition:all 0.3s;display:block"
                class="reveal">
                <div style="font-size:2rem;margin-bottom:12px"><?php echo e($other->icon); ?></div>
                <h4 style="color:var(--text);font-weight:700;margin-bottom:8px"><?php echo e($other->title); ?></h4>
                <p style="color:var(--text-light);font-size:0.9rem;line-height:1.6">
                    <?php echo e(Str::limit($other->short_description, 80)); ?></p>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:24px">Ready to Start?</span>
        <h2 class="cta-title">Let's Discuss Your <span class="text-gradient"><?php echo e($service->title); ?></span> Project</h2>
        <p class="cta-subtitle">Get a free consultation and detailed project proposal within 24 hours.</p>
        <div class="cta-actions">
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary btn-arrow">Start Project</a>
            <a href="<?php echo e(route('portfolio')); ?>" class="btn btn-outline">View Our Work</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/service-detail.blade.php ENDPATH**/ ?>