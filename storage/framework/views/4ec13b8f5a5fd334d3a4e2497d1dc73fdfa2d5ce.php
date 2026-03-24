<?php $__env->startSection('admin_title', 'Dashboard'); ?>

<?php $__env->startSection('admin_content'); ?>

<div class="stat-grid">
    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px">
            <div style="width:44px;height:44px;background:rgba(255,107,53,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">📩</div>
            <?php if($stats['new_contacts'] > 0): ?>
                <span class="badge badge-new"><?php echo e($stats['new_contacts']); ?> new</span>
            <?php endif; ?>
        </div>
        <div class="stat-card-num"><?php echo e($stats['contacts']); ?></div>
        <div class="stat-card-label">Contact Submissions</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(59,130,246,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">⚙️</div>
        <div class="stat-card-num"><?php echo e($stats['services']); ?></div>
        <div class="stat-card-label">Services</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(16,185,129,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">💼</div>
        <div class="stat-card-num"><?php echo e($stats['portfolio']); ?></div>
        <div class="stat-card-label">Portfolio Items</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(245,158,11,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">✍️</div>
        <div class="stat-card-num"><?php echo e($stats['blogs']); ?></div>
        <div class="stat-card-label">Blog Posts</div>
    </div>
    <div class="stat-card">
        <div style="margin-bottom:12px;width:44px;height:44px;background:rgba(139,92,246,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem">👥</div>
        <div class="stat-card-num"><?php echo e($stats['users']); ?></div>
        <div class="stat-card-label">Users</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 320px;gap:24px">
    
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Contact Submissions</h3>
            <a href="<?php echo e(route('admin.contact.index')); ?>" class="btn-admin btn-admin-outline btn-admin-sm">View All</a>
        </div>
        <?php if($recent_contacts->isEmpty()): ?>
            <p style="color:var(--text-light);font-size:0.9rem;padding:20px 0;text-align:center">No submissions yet.</p>
        <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $recent_contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="color:var(--text);font-weight:600"><?php echo e($c->name); ?></td>
                    <td><?php echo e($c->email); ?></td>
                    <td><?php echo e(Str::limit($c->subject, 30)); ?></td>
                    <td><span class="badge badge-<?php echo e($c->status); ?>"><?php echo e(ucfirst($c->status)); ?></span></td>
                    <td><?php echo e($c->created_at->diffForHumans()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    
    <div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:16px">Quick Actions</h3>
            <?php $__currentLoopData = [
                ['admin.services.create','Add Service','fas fa-plus','#ff6b35'],
                ['admin.portfolio.create','Add Portfolio Item','fas fa-plus','#3b82f6'],
                ['admin.blog.create','New Blog Post','fas fa-pen','#10b981'],
                ['admin.settings.index','Site Settings','fas fa-cog','#f59e0b'],
                ['admin.contact.index','View Enquiries','fas fa-envelope','#8b5cf6'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($link[0])); ?>" class="btn-admin btn-admin-outline" style="width:100%;justify-content:flex-start;margin-bottom:8px;gap:10px">
                <i class="<?php echo e($link[2]); ?>" style="color:<?php echo e($link[3]); ?>"></i> <?php echo e($link[1]); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="admin-card">
            <h3 class="admin-card-title" style="margin-bottom:12px">System Info</h3>
            <div style="font-size:0.85rem;color:var(--text-light);display:flex;flex-direction:column;gap:8px">
                <div style="display:flex;justify-content:space-between"><span>PHP Version</span><span style="color:var(--text)"><?php echo e(PHP_VERSION); ?></span></div>
                <div style="display:flex;justify-content:space-between"><span>Laravel</span><span style="color:var(--text)"><?php echo e(app()->version()); ?></span></div>
                <div style="display:flex;justify-content:space-between"><span>Environment</span><span style="color:var(--orange)"><?php echo e(app()->environment()); ?></span></div>
                <div style="display:flex;justify-content:space-between"><span>Timezone</span><span style="color:var(--text)"><?php echo e(config('app.timezone')); ?></span></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>