<?php $__env->startSection('title', 'Главная'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('filter_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container my-4">
            <h1>Фильмы онлайн бесплатно без регистрации и СМС</h1>
            <div class="row mb-2">
                <?php if(count($films)): ?>
                    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-5">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col-4 d-none d-lg-block">
                                    <img class="img-fluid" src="<?php echo e(Storage::url($film ->image)); ?>" alt="">
                                </div>
                                <div class="col-8 p-4 d-flex flex-column position-static">
                                    <h3 class="mb-0"><a href="/films/<?php echo e($film->id); ?>"><?php echo e($film ->title); ?></a> (<?php echo e($film ->year); ?>год)</h3>
                                    <div class="mb-1 text-body-secondary">Жанры: <?php $__currentLoopData = $film->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($g->name); ?> <?php if(!$loop->last): ?>/ <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
                                    <div class="mb-1 text-body-secondary">Режисер: <?php echo e($film ->producer->name); ?></div>
                                    <div class="mb-1 text-body-secondary">Страна: <?php echo e($film ->country->name); ?></div>
                                    <div class="mb-1 text-body-secondary">Описание: <?php echo e(mb_substr($film ->description, 0, 50)); ?>...</div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h2>Фильмы по вашему запросу не найдены</h2>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>