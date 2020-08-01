<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
              <img height="40px" width="40px" style="border-radius: 50%" src="<?php echo e(Gravatar::src($discussion->author->email )); ?>" alt="">
            <span class="font-weight-bold ml-2"><?php echo e($discussion->author->name); ?></span> 
        </div>
        <div>
            <a href="<?php echo e(route('discussion.show',$discussion->slug)); ?>" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/partials/discussion-header.blade.php ENDPATH**/ ?>