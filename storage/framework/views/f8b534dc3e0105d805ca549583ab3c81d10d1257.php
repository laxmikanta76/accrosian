<?php $__env->startSection('admin_title', 'Portfolio'); ?>
<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Portfolio</div>
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Portfolio Items (<?php echo e($items->count()); ?>)</h3>
        <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> Add Item</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Title</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td style="color:var(--text);font-weight:600"><?php echo e($item->title); ?></td>
            <td><?php echo e($item->category ?? '—'); ?></td>
            <td><span class="badge badge-<?php echo e($item->status ? 'active':'inactive'); ?>"><?php echo e($item->status ? 'Active':'Inactive'); ?></span></td>
            <td style="display:flex;gap:6px">
                <a href="<?php echo e(route('admin.portfolio.edit', $item)); ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="<?php echo e(route('admin.portfolio.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Delete?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-light)">No items. <a href="<?php echo e(route('admin.portfolio.create')); ?>" style="color:var(--orange)">Add one</a></td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/portfolio/index.blade.php ENDPATH**/ ?>