<?php $__env->startSection('title', 'Личный кабинет'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Привет, <?php echo e(Auth::user()->name); ?></h1>
        <div class="d-flex">
        <?php $__currentLoopData = Auth::user()->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card  rounded-3 shadow-sm">
                        <div class="card-header py-3"><a href="/films/<?php echo e($rev->film_id); ?>"><?php echo e($rev->film->title); ?></a>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <?php echo e($rev->rate); ?>

                            </p>
                            <p><?php echo e(\Carbon\Carbon::parse($rev->created_at)->format('d/m/y H:i')); ?></p>
                        </div>
                        <?php echo e($rev->text); ?>


                    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/profile.blade.php ENDPATH**/ ?>