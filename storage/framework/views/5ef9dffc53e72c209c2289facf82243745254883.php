<?php $__env->startSection('admin_title', 'Edit Service'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span><a href="<?php echo e(route('admin.services.index')); ?>">Services</a><span>/</span> Edit</div>

<form action="<?php echo e(route('admin.services.update', $service)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
<?php echo $__env->make('admin.services._form', ['service' => $service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/services/edit.blade.php ENDPATH**/ ?>