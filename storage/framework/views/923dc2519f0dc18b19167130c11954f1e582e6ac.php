<div class="mobile-nav" id="mobileNav">

    <!-- Overlay -->
    <div class="mobile-overlay"></div>

    <!-- Sidebar -->
    <div class="mobile-sidebar">

        <button class="mobile-close">✕</button>

        <a href="<?php echo e(route('home')); ?>">Home</a>
        <a href="<?php echo e(route('about')); ?>">About</a>
        <a href="<?php echo e(route('services')); ?>">Services</a>
        <a href="<?php echo e(route('portfolio')); ?>">Portfolio</a>
        <a href="<?php echo e(route('blog')); ?>">Blog</a>
        <a href="<?php echo e(route('contact')); ?>">Contact</a>
        <a href="<?php echo e(route('student.register')); ?>">Student Registration</a>
        <a href="<?php echo e(route('airs')); ?>">AIRS Program</a>

        <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->role === 'admin'): ?>
        <a href="<?php echo e(route('admin.dashboard')); ?>">Admin Panel</a>
        <?php endif; ?>

        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="mobile-link-btn" type="submit">Logout</button>
        </form>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">Login</a>
        <?php endif; ?>

    </div>
</div><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/partials/mobile-nav.blade.php ENDPATH**/ ?>