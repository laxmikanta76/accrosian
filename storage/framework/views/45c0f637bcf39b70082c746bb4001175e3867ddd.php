<?php $__env->startSection('admin_title', 'Edit Portfolio Item'); ?>
<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span><a href="<?php echo e(route('admin.portfolio.index')); ?>">Portfolio</a><span>/</span> Edit</div>
<form action="<?php echo e(route('admin.portfolio.update', $portfolio)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
<?php echo $__env->make('admin.portfolio._form', ['portfolio' => $portfolio], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/portfolio/edit.blade.php ENDPATH**/ ?>