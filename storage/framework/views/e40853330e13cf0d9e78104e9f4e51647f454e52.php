<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
    if (sessionStorage.getItem('loaderShown')) {
        document.documentElement.classList.add('no-loader');
    }
    </script>

    
    <title><?php echo $__env->yieldContent('meta_title', $setting->site_title ?? config('app.name')); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', $setting->meta_description ?? ''); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', $setting->meta_keywords ?? ''); ?>">

    
    <meta property="og:title" content="<?php echo $__env->yieldContent('meta_title', $setting->site_title ?? config('app.name')); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', $setting->meta_description ?? ''); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <?php if(isset($setting) && $setting->og_image): ?>
    <meta property="og:image" content="<?php echo e(asset('storage/' . $setting->og_image)); ?>">
    <?php endif; ?>

    
    <?php if(isset($setting) && $setting->favicon): ?>
    <link rel="icon" href="<?php echo e(asset('storage/' . $setting->favicon)); ?>" type="image/png">
    <?php else: ?>
    <link rel="icon" href="<?php echo e(asset('assets/images/logo2.png')); ?>" type="image/png">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <?php echo $__env->yieldPushContent('head'); ?>

    
    <?php if(isset($setting) && $setting->google_analytics): ?>
    <?php echo $setting->google_analytics; ?>

    <?php endif; ?>
</head>

<body>

    
    <div class="loader" id="loader">
        <?php if(isset($setting) && $setting->logo): ?>
        <img src="<?php echo e(asset('storage/' . $setting->logo)); ?>" alt="<?php echo e($setting->site_name ?? 'Logo'); ?>"
            style="height:64px;border-radius:12px">
        <?php else: ?>
        <img src="<?php echo e(asset('assets/images/logo2.png')); ?>" alt="Accrosian" style="height:84px;border-radius:12px">
        <?php endif; ?>
        <div class="loader-logo">Loading</div>

        <div class="loader-dots">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.mobile-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <?php if(session('success')): ?>
        <div class="toast-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="toast-error">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
    setTimeout(() => {
        document.querySelectorAll('.toast-success, .toast-error').forEach(el => {
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 3000);
    </script>
</body>

</html><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/layouts/app.blade.php ENDPATH**/ ?>