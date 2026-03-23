<?php $__env->startSection('admin_title', 'Blog Posts'); ?>
<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Blog Posts</div>
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Posts (<?php echo e($posts->count()); ?>)</h3>
        <a href="<?php echo e(route('admin.blog.create')); ?>" class="btn-admin btn-admin-primary"><i class="fas fa-plus"></i> New Post</a>
    </div>
    <table class="admin-table">
        <thead><tr><th>Title</th><th>Status</th><th>Published</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td style="color:var(--text);font-weight:600;max-width:340px"><?php echo e(Str::limit($post->title,60)); ?></td>
            <td><span class="badge badge-<?php echo e($post->status ? 'active':'inactive'); ?>"><?php echo e($post->status ? 'Published':'Draft'); ?></span></td>
            <td style="font-size:0.85rem"><?php echo e($post->published_at?->format('M d, Y') ?? '—'); ?></td>
            <td style="display:flex;gap:6px">
                <?php if($post->status): ?><a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="btn-admin btn-admin-outline btn-admin-sm" target="_blank"><i class="fas fa-eye"></i></a><?php endif; ?>
                <a href="<?php echo e(route('admin.blog.edit', $post)); ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="<?php echo e(route('admin.blog.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Delete?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-light)">No posts. <a href="<?php echo e(route('admin.blog.create')); ?>" style="color:var(--orange)">Create one</a></td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>