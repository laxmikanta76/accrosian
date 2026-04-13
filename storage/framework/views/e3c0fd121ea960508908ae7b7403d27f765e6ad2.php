<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="<?php echo e(route('home')); ?>" class="nav-logo">
            <?php if(isset($setting) && $setting->logo): ?>
            <img src="<?php echo e(asset('storage/' . $setting->logo)); ?>" alt="<?php echo e($setting->site_name ?? 'Accrosian'); ?> Logo" />
            <?php else: ?>
            <img src="<?php echo e(asset('assets/images/logo2.png')); ?>" alt="Accrosian Logo" />
            <?php endif; ?>
            <!-- <span class="nav-logo-text">Accr<span>o</span>sian</span> -->
        </a>
        <?php
        $navServices = \App\Models\Service::active()->orderBy('sort_order')->get();
        ?>
        <ul class="nav-menu">
            <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
            <li class="nav-dropdown mega-parent">
                <a href="<?php echo e(route('services')); ?>">Services</a>

                <div class="mega-menu">

                    
                    <div class="mega-column">
                        <h4 class="mega-title">Tech Solution</h4>

                        <?php $__currentLoopData = $navServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($svc->title, [
                        'Web Development',
                        'Mobile App Development',
                        'Cloud Solutions',
                        'UI/UX Design',
                        'AI & Machine Learning',
                        'IT Consulting'
                        ])): ?>
                        <a href="<?php echo e(route('services.show', $svc->slug)); ?>" class="mega-link">
                            <?php echo e($svc->icon); ?> <?php echo e($svc->title); ?>

                        </a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="mega-column">
                        <h4 class="mega-title">Market Growth</h4>

                        <?php $__currentLoopData = $navServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($svc->title, [
                        'SEO',
                        'SMM',
                        'Google Ads',
                        'Content Marketing'
                        ])): ?>
                        <a href="<?php echo e(route('services.show', $svc->slug)); ?>" class="mega-link">
                            <?php echo e($svc->icon); ?> <?php echo e($svc->title); ?>

                        </a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </li>
            <li><a href="<?php echo e(route('blog')); ?>" class="<?php echo e(request()->routeIs('blog*') ? 'active' : ''); ?>">Blog</a></li>
            
            <li class="nav-dropdown">
                <a href="#"
                    class="<?php echo e(request()->routeIs('about') || request()->routeIs('portfolio') || request()->routeIs('contact') ? 'active' : ''); ?>">
                    Our Company
                </a>

                <div class="dropdown-menu">
                    <a href="<?php echo e(route('about')); ?>">🏢 About Us</a>
                    <a href="<?php echo e(route('portfolio')); ?>">💼 Portfolio</a>
                    <a href="<?php echo e(route('contact')); ?>">📞 Contact</a>
                    <a href="<?php echo e(route('student.register')); ?>">🎓 Student Registration</a>
                    <a href="<?php echo e(route('airs')); ?>">🌉 AIRS Program</a>
                </div>
            </li>

        </ul>
        <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary btn-sm nav-cta">Get a Quote</a>
        <?php if(auth()->guard()->check()): ?>
        <div style="display:flex;align-items:center;gap:8px;margin-left:8px;">
            <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline btn-sm">Admin</a>
            <?php endif; ?>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="margin:0;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm"
                    style="background:transparent;border:1px solid rgba(255,255,255,0.3);color:#fff;cursor:pointer;">Logout</button>
            </form>
        </div>
        <?php endif; ?>
        <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
    </div>
</nav><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/partials/navbar.blade.php ENDPATH**/ ?>