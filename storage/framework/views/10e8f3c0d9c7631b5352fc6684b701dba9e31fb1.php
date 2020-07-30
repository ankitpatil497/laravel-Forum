<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end md-2">
    <a href="<?php echo e(route('discussion.create')); ?>" class="btn btn-success">Add Discussion</a>
</div>

<?php $__currentLoopData = $diss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e($discussion->title); ?>

        </div>

        <div class="card-body">

            <?php echo $discussion->content; ?>

        </div>
    </div>           
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/discussions/index.blade.php ENDPATH**/ ?>