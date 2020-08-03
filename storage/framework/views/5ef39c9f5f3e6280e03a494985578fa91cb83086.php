<?php $__env->startSection('content'); ?>


<div class="card">
    <div class="card-header">Add Discussions</div>

    <div class="card-body">
        <form action="<?php echo e(route('discussion.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="content">Content</label>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
            </div>

            <div class="form-group">
                <label for="channle">Channels</label>
                <select name="channel" id="channel" class="form-control">
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($channel->id); ?>"><?php echo e($channel->name); ?></option>        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Discussion</button>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/discussions/create.blade.php ENDPATH**/ ?>