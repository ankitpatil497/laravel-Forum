<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user.notification')); ?>" class="nav-link">
                                <span class="badge badge-pill badge-info" style="color: white">
                                    <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                                    unread Notifications
                                </span>
                            </a>
                        </li>
                    
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('discussion.index')); ?>" class="nav-link">Discussion</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if(!in_array(request()->path(),['login','register','password/reset','password/email'])): ?>
            <main class="container py-4">
                <div class="row">
                    <div class="col-4">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('discussion.create')); ?>" style="width: 100%; color: #fff" class="btn btn-info my-2">Add Discussion</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" style="width: 100%; colour=#fff" class="btn btn-success my-2">Sing in to Add Discussion</a>
                            
                        <?php endif; ?>                    
                        <div class="card">
                            <div class="card-header">
                                Channel
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <a href="<?php echo e(route('discussion.index')); ?>?channel=<?php echo e($channel->slug); ?>">
                                                <?php echo e($channel->name); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </main>
        <?php else: ?>
            <main class="py-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        <?php endif; ?>
       
    </div>

    <?php echo $__env->yieldContent('js'); ?>


</body>
</html>
<?php /**PATH /home/ankit/Desktop/Laravel_project/forum/resources/views/layouts/app.blade.php ENDPATH**/ ?>