<?php $__env->startSection('admin_title', 'Contact Submissions'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Contact Submissions</div>

<div class="admin-card" style="margin-bottom:20px">
    <form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
        <label style="font-size:0.85rem;color:var(--text-light)">Filter by status:</label>
        <?php $__currentLoopData = [''=>'All', 'new'=>'New', 'read'=>'Read', 'replied'=>'Replied']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('admin.contact.index', $val ? ['status'=>$val] : [])); ?>"
           class="btn-admin btn-admin-sm <?php echo e(request('status',$val===''?'':null) === ($val===''?null:$val) ? 'btn-admin-primary' : 'btn-admin-outline'); ?>">
           <?php echo e($label); ?>

        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Submissions (<?php echo e($submissions->total()); ?>)</h3>
    </div>
    <table class="admin-table">
        <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr style="<?php echo e($c->status === 'new' ? 'background:rgba(59,130,246,0.03)' : ''); ?>">
            <td style="font-weight:<?php echo e($c->status==='new'?'700':'400'); ?>;color:var(--text)"><?php echo e($c->name); ?></td>
            <td><?php echo e($c->email); ?></td>
            <td><?php echo e(Str::limit($c->subject ?? 'General Enquiry', 35)); ?></td>
            <td><span class="badge badge-<?php echo e($c->status); ?>"><?php echo e(ucfirst($c->status)); ?></span></td>
            <td style="font-size:0.82rem;white-space:nowrap"><?php echo e($c->created_at->format('M d, Y')); ?></td>
            <td style="display:flex;gap:6px">
                <a href="<?php echo e(route('admin.contact.show', $c)); ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="fas fa-eye"></i> View</a>
                <form action="<?php echo e(route('admin.contact.destroy', $c)); ?>" method="POST" onsubmit="return confirm('Delete?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn-admin btn-admin-danger btn-admin-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--text-light)">No submissions found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php if($submissions->hasPages()): ?>
    <div style="padding:20px"><?php echo e($submissions->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>