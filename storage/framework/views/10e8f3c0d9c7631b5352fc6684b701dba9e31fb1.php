<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $diss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <?php echo $__env->make('partials.discussion-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="card-body">

            <div class="text-center">
                <strong>
                    <?php echo e($discussion->title); ?>

                </strong>
            </div>
        </div>
    </div>           
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($diss->appends(['channle'=>request()->query('channele')])->links()); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/discussions/index.blade.php ENDPATH**/ ?>