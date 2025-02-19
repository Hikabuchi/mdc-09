<?php $__env->startSection('title', 'Сезон'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row d-flex">
            <div class="col-7 flex-md-equal">
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5"><?php echo e($season->film->title); ?> Сезон <?php echo e($season ->number); ?></h2>
                    </div>
                    <img class="img-fluid min-vh-100" src="<?php echo e($season ->image); ?>" alt="">
                </div>
            </div>
            <div class="col-5 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
                <div class="my-3 p-3">
                    <h3 class="fs-2 text-body-emphasis">Описание:</h3>
                    <p><?php echo e($season ->description); ?></p>
                    <div class="d-flex justify-content-between">
                        <h4>Год:</h4>
                        <p><?php echo e($season->film ->year); ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Страна:</h4>
                        <p><?php echo e($season->film ->country->name); ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Режиссёр:</h4>
                        <p><?php echo e($season->film ->producer->name); ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Жанры:</h4>
                        <p><?php $__currentLoopData = $season->film->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($g->name); ?> <?php if(!$loop->last): ?>/ <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <select id="series" class="mb-2 form-select w-25">
                    <?php $__currentLoopData = $season->series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($serie->id); ?>">Серия: <?php echo e($serie->number); ?>: <?php echo e($serie->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="row" id="player"><?php echo $season->series[0]->video; ?></div>
            <h4>Сезон: <?php echo e($season->number); ?> Серия <span id="serie_num"><?php echo e($season->series[0]->number); ?> "<?php echo e($season->series[0]->title); ?>"</span></h4>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/seasons/show.blade.php ENDPATH**/ ?>