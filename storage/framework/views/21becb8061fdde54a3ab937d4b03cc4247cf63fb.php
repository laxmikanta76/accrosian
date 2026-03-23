<?php $__env->startSection('meta_title', 'Forgot Password – Accrosian'); ?>

<?php $__env->startSection('content'); ?>
<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:80px 20px">
    <div style="width:100%;max-width:440px">
        <div style="text-align:center;margin-bottom:40px">
            <a href="<?php echo e(route('home')); ?>" style="display:inline-block;margin-bottom:24px">
                <img src="<?php echo e(asset('assets/images/logo2.png')); ?>" alt="Accrosian" style="height:48px;border-radius:10px" />
            </a>
            <h1 style="font-family:var(--font-display);font-size:1.8rem;font-weight:800;color:var(--text)">Reset Password</h1>
            <p style="color:var(--text-light);margin-top:8px">Enter your email and we'll send you a reset link</p>
        </div>

        <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:40px">
            <?php if(session('status')): ?>
            <div style="background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);border-radius:8px;padding:14px;margin-bottom:20px;color:#10b981;font-size:0.9rem">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
            <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:14px;margin-bottom:20px;color:#ef4444;font-size:0.9rem">
                <?php echo e($errors->first()); ?>

            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('password.email')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div style="margin-bottom:24px">
                    <label style="display:block;font-size:0.9rem;font-weight:600;color:var(--text);margin-bottom:8px">Email Address</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@example.com" required
                        style="width:100%;background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:12px 16px;color:var(--text);font-size:0.95rem;box-sizing:border-box;outline:none" />
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;font-size:1rem">
                    Send Reset Link
                </button>
            </form>
        </div>

        <p style="text-align:center;margin-top:24px;color:var(--text-light);font-size:0.9rem">
            Remember your password?
            <a href="<?php echo e(route('login')); ?>" style="color:var(--orange);font-weight:600;text-decoration:none">Sign in</a>
        </p>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>