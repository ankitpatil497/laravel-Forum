<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
       Notifiations
    </div>

    <div class="card-body">
        <ul class="list-group">
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <?php if($notification->type=='App\Notifications\AddReplyAdded'): ?>
                        A new reply added to the Discussion..
                        <strong>
                            <?php echo e($notification->first()->data['discussion']['title']); ?>

                        </strong>
                        <a href="<?php echo e(route('discussion.show',$notification->first()->data['discussion']['slug'])); ?>" class="btn btn-info float-right btn-sm">View Discussion</a>
                    <?php endif; ?>
                    <?php if($notification->type=='App\Notifications\MarkAsBestReply'): ?>
                        Your Reply to the discussion <strong><?php echo e($notification->first()->data['discussion']['title']); ?></strong> was mark as Best reply.
                        <a href="<?php echo e(route('discussion.show',$notification->first()->data['discussion']['slug'])); ?>" class="btn btn-info float-right btn-sm">View Discussion</a>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/users/notifications.blade.php ENDPATH**/ ?>