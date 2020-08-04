<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo $__env->make('partials.discussion-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card-body">
            <div class="text-center">
                <strong>
                    <?php echo e($discussion->title); ?>

                </strong>
            </div>
            <hr><?php echo $discussion->content; ?>  

            <?php if($discussion->bestReply): ?>
                <div class="card bg-success my-5" style="color: white">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img height="40px" width="40px" style="border-radius: 50%" src="<?php echo e(Gravatar::src($discussion->bestReply->owner->email )); ?>" alt="">
                                <strong>
                                    <span class="font-weight-bold ml-2"><?php echo e($discussion->bestReply->owner->name); ?></span> 
                                </strong>
                            </div>
                            <div style="color: rgb(160, 0, 0)">
                                <strong>
                                    BEST REPLY
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php echo $discussion->bestReply->content; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>         
    <?php $__currentLoopData = $discussion->replies()->paginate(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card my-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img height="40px" width="40px" style="border-radius: 50%" src="<?php echo e(Gravatar::src($reply->owner->email )); ?>" alt="">
                        <span class="font-weight-bold ml-2"><?php echo e($reply->owner->name); ?></span> 
                    </div>
                    <div>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->id==$discussion->user_id): ?>
                            <form action="<?php echo e(route('mark-best-reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-info btn-sm" style="color: #fff">Mark as best reply</button>
                            </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <hr><?php echo $reply->content; ?>


               
            </div>
        </div>   
             
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    <?php echo e($discussion->replies()->paginate(3)->links()); ?>

    <div class="card my-5">
        <div class="card-header">
            Add Reply
        </div>
        <div class="card-body">
            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('reply.store',$discussion->slug)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="reply" id="reply">

                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>

                    <button type="submit" class="btn btn-success my-2 btn-sm">Add Reply</button>
                </form>
                <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>" style="width: 100%; colour=#fff" class="btn btn-success my-2">Sing in to Add Reply</a>
            <?php endif; ?>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/discussions/hello.blade.php ENDPATH**/ ?>