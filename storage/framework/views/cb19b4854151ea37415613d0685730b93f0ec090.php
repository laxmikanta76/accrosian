<?php $__env->startSection('meta_title', 'Login – Accrosian'); ?>

<?php $__env->startSection('content'); ?>
<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:80px 20px">
    <div style="width:100%;max-width:440px">
        <div style="text-align:center;margin-bottom:40px">
            <a href="<?php echo e(route('home')); ?>" style="display:inline-block;margin-bottom:24px">
                <img src="<?php echo e(asset('assets/images/logo2.png')); ?>" alt="Accrosian" style="height:48px;border-radius:10px" />
            </a>
            <h1 style="font-family:var(--font-display);font-size:1.8rem;font-weight:800;color:var(--text)">Welcome Back</h1>
            <p style="color:var(--text-light);margin-top:8px">Sign in to your Accrosian account</p>
        </div>

        <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:40px">
            <?php if($errors->any()): ?>
            <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:14px;margin-bottom:20px;color:#ef4444;font-size:0.9rem">
                <?php echo e($errors->first()); ?>

            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" style="margin-bottom:20px">
                    <label for="email" style="display:block;font-size:0.9rem;font-weight:600;color:var(--text);margin-bottom:8px">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@example.com" required
                        style="width:100%;background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:12px 16px;color:var(--text);font-size:0.95rem;box-sizing:border-box;outline:none;transition:border-color 0.3s" />
                </div>
                <div class="form-group" style="margin-bottom:20px">
                    <label for="password" style="display:block;font-size:0.9rem;font-weight:600;color:var(--text);margin-bottom:8px">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        style="width:100%;background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:12px 16px;color:var(--text);font-size:0.95rem;box-sizing:border-box;outline:none;transition:border-color 0.3s" />
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;color:var(--text-light);font-size:0.9rem">
                        <input type="checkbox" name="remember" style="accent-color:var(--orange)"> Remember me
                    </label>
                    <a href="<?php echo e(route('password.request')); ?>" style="color:var(--orange);font-size:0.9rem;text-decoration:none">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;font-size:1rem">
                    Sign In
                </button>
            </form>
        </div>

        <p style="text-align:center;margin-top:24px;color:var(--text-light);font-size:0.9rem">
            Don't have an account?
            <a href="<?php echo e(route('register')); ?>" style="color:var(--orange);font-weight:600;text-decoration:none">Create one</a>
        </p>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/auth/login.blade.php ENDPATH**/ ?>