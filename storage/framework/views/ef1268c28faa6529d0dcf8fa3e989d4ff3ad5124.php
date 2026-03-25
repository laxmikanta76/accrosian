<?php $__env->startSection('admin_title', 'Services'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Services</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Services (<?php echo e($services->count()); ?>)</h3>
        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i>
            Add Service</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <!-- <th>Icon</th> -->
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <!-- <td style="font-size:1.5rem"><?php echo e($service->icon); ?></td> -->
                <td style="color:var(--text);font-weight:600"><?php echo e($service->title); ?></td>
                <td><code
                        style="background:var(--surface);padding:2px 6px;border-radius:4px;font-size:0.8rem"><?php echo e($service->slug); ?></code>
                </td>
                <td><span
                        class="badge badge-<?php echo e($service->status ? 'active' : 'inactive'); ?>"><?php echo e($service->status ? 'Active' : 'Inactive'); ?></span>
                </td>
                <td><?php echo e($service->sort_order); ?></td>
                <td style="display:flex;gap:6px">
                    <a href="<?php echo e(route('services.show', $service->slug)); ?>"
                        class="btn-admin btn-admin-outline btn-admin-sm" target="_blank"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo e(route('admin.services.edit', $service)); ?>"
                        class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                    <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="POST"
                        onsubmit="return confirm('Delete this service?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" style="text-align:center;padding:40px;color:var(--text-light)">No services found. <a
                        href="<?php echo e(route('admin.services.create')); ?>" style="color:var(--orange)">Add one</a></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/services/index.blade.php ENDPATH**/ ?>