<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end md-2">
    <a href="<?php echo e(route('discussion.create')); ?>" class="btn btn-success">Add Discussion</a>
</div>
<div class="card">
    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php echo e(__('You are logged in!')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/home.blade.php ENDPATH**/ ?>