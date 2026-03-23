<div class="mobile-nav" id="mobileNav">
    <button class="mobile-close" id="mobileClose">✕</button>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('about')); ?>">About</a>
    <a href="<?php echo e(route('services')); ?>">Services</a>
    <a href="<?php echo e(route('portfolio')); ?>">Portfolio</a>
    <a href="<?php echo e(route('blog')); ?>">Blog</a>
    <a href="<?php echo e(route('contact')); ?>">Contact</a>
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>">Admin Panel</a>
        <?php endif; ?>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background:none;border:none;color:inherit;font-size:inherit;cursor:pointer;padding:12px 0;display:block;width:100%;text-align:left;">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">Login</a>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/partials/mobile-nav.blade.php ENDPATH**/ ?>