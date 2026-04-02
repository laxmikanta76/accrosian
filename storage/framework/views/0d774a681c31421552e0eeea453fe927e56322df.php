
<?php $__env->startSection('admin_title', 'Student Registrations'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="breadcrumb">
    <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a><span>/</span> Student Registrations
</div>


<div style="display:grid;grid-template-columns:repeat(5,1fr);gap:16px;margin-bottom:24px">
    <?php $__currentLoopData = [
    ['All', $counts['all'], ''],
    ['New', $counts['new'], 'color:var(--orange)'],
    ['Reviewed', $counts['reviewed'], 'color:#56ccf2'],
    ['Shortlisted', $counts['shortlisted'], 'color:#6fcf97'],
    ['Rejected', $counts['rejected'], 'color:#eb5757'],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $count, $style]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="admin-card" style="text-align:center;padding:16px">
        <div style="font-size:1.8rem;font-weight:800;<?php echo e($style); ?>"><?php echo e($count); ?></div>
        <div style="font-size:0.8rem;color:var(--muted);margin-top:4px"><?php echo e($label); ?></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="admin-card" style="margin-bottom:16px;padding:16px">
    <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap">
        <span style="font-size:0.85rem;color:var(--text-light)">Filter:</span>
        <?php $__currentLoopData = ['' => 'All', 'new' => 'New', 'reviewed' => 'Reviewed', 'shortlisted' => 'Shortlisted', 'rejected' =>
        'Rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('admin.students.index', $val ? ['status' => $val] : [])); ?>"
            class="btn-admin btn-admin-sm <?php echo e(request('status') === ($val ?: null) ? 'btn-admin-primary' : 'btn-admin-outline'); ?>">
            <?php echo e($label); ?>

        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">Registrations (<?php echo e($students->total()); ?>)</h3>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>College</th>
                <th>Course</th>
                <th>Year</th>
                <th>Resume</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="font-weight:<?php echo e($s->status === 'new' ? '700' : '400'); ?>;color:var(--text)">
                    <?php echo e($s->name); ?>

                </td>
                <td style="font-size:0.85rem"><?php echo e($s->email); ?></td>
                <td style="font-size:0.85rem"><?php echo e($s->mobile); ?></td>
                <td style="font-size:0.85rem"><?php echo e(Str::limit($s->college_name, 25)); ?></td>
                <td style="font-size:0.82rem"><?php echo e($s->course); ?></td>
                <td style="font-size:0.82rem"><?php echo e($s->year); ?></td>
                <td>
                    <?php if($s->resume): ?>
                    <a href="<?php echo e($s->resume_url); ?>" target="_blank" class="btn-admin btn-admin-outline btn-admin-sm"
                        title="View Resume">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>
                    <?php else: ?>
                    <span style="color:var(--muted);font-size:0.8rem">—</span>
                    <?php endif; ?>
                </td>
                <td>
                    <span class="badge badge-<?php echo e($s->status); ?>"><?php echo e(ucfirst($s->status)); ?></span>
                </td>
                <td style="font-size:0.82rem;white-space:nowrap">
                    <?php echo e($s->created_at->format('M d, Y')); ?>

                </td>
                <td style="display:flex;gap:6px">
                    <a href="<?php echo e(route('admin.students.show', $s)); ?>" class="btn-admin btn-admin-outline btn-admin-sm">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action="<?php echo e(route('admin.students.destroy', $s)); ?>" method="POST"
                        onsubmit="return confirm('Delete this registration?')" style="margin:0">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn-admin btn-admin-danger btn-admin-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="10" style="text-align:center;padding:40px;color:var(--text-light)">
                    No student registrations yet.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if($students->hasPages()): ?>
    <div style="padding:20px"><?php echo e($students->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/admin/students/index.blade.php ENDPATH**/ ?>