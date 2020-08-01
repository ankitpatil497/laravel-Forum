<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $diss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="card-header">
            <img height="40px" width="40px" style="border-radius: 50%" src="<?php echo e(Gravatar::src($discussion->author->email )); ?>" alt="">
            <strong class="ml-2"><?php echo e($discussion->author->name); ?></strong>
        </div>

        <div class="card-body">

            <?php echo $discussion->content; ?>

        </div>
    </div>           
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($diss->links()); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/discussions/index.blade.php ENDPATH**/ ?>