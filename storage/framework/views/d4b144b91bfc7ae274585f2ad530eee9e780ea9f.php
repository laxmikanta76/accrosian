<?php $__env->startSection('admin_title', 'Pages'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Pages</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">CMS Pages</h3>
        <span style="font-size:0.85rem;color:var(--text-light)">Edit SEO and content for each page</span>
    </div>
    <table class="admin-table">
        <thead><tr><th>Page</th><th>Slug</th><th>Meta Title</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="color:var(--text);font-weight:600"><?php echo e($page->title); ?></td>
            <td><code style="background:var(--surface);padding:2px 8px;border-radius:4px;font-size:0.8rem">/<?php echo e($page->slug); ?></code></td>
            <td style="font-size:0.85rem;color:var(--text-light)"><?php echo e(Str::limit($page->meta_title, 45) ?? '—'); ?></td>
            <td><span class="badge badge-<?php echo e($page->status ? 'active':'inactive'); ?>"><?php echo e($page->status ? 'Active':'Inactive'); ?></span></td>
            <td>
                <a href="<?php echo e(route('admin.pages.edit', $page)); ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit SEO</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>