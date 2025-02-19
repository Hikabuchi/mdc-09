<?php $__env->startSection('title', 'Поиск'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('filter_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container my-4">
        <h1>Поиск "<?php echo e($text); ?>"</h1>
        <div class="row mb-2">
            <?php $__currentLoopData = $film; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-5">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-4 d-none d-lg-block">
                            <img class="img-fluid" src="<?php echo e($f ->image); ?>" alt="">
                        </div>
                        <div class="col-8 p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><a href="/films/<?php echo e($f->id); ?>"><?php echo e($f ->title); ?></a> (<?php echo e($f ->year); ?>год)</h3>
                            <div class="mb-1 text-body-secondary">Жанры: <?php $__currentLoopData = $f->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($g->name); ?> <?php if(!$loop->last): ?>/ <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
                            <div class="mb-1 text-body-secondary">Режисер: <?php echo e($f ->producer->name); ?></div>
                            <div class="mb-1 text-body-secondary">Страна: <?php echo e($f ->country->name); ?></div>
                            <div class="mb-1 text-body-secondary">Описание: <?php echo e(mb_substr($f ->description, 0, 50)); ?>...</div>
                        </div>

                    </div>
                </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/search.blade.php ENDPATH**/ ?>