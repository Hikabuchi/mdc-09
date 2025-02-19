<?php $__env->startSection('title', 'Личный кабинет админа'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex">
        <?php echo $__env->make('admin.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <h1>Админ панель для <?php echo e(Auth::user()->name); ?></h1>
            <a href="films/create">Добавить фильм</a>
            <div class="my-5">
                <div class="row text-center">
                    <div class="col-2 border">Название</div>
                    <div class="col-2 border">Описание</div>
                    <div class="col-1 border">Год</div>
                    <div class="col-1 border">Режиссёр</div>
                    <div class="col-1 border">Страна</div>
                    <div class="col-2 border">Изображение</div>
                    <div class="col-2 border">Видео</div>
                    <div class="col-1 border">Действия</div>
                </div>
                <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row text-center">
                        <div class="col-2 border"><?php echo e($film->title); ?></div>
                        <div class="col-2 border"><?php echo e($film->description); ?></div>
                        <div class="col-1 border"><?php echo e($film->year); ?></div>
                        <div class="col-1 border"><?php echo e($film->producer->name); ?></div>
                        <div class="col-1 border"><?php echo e($film->country->name); ?></div>
                        <div class="col-2 border"><?php echo e($film->image); ?></div>
                        <div class="col-2 border"><?php echo e($film->video); ?></div>
                        <div class="col-1 border">
                            <a href="/films/<?php echo e($film-> id); ?>/edit/" class="btn btn-primary">Редактировать</a>
                            <form action="<?php echo e(route('films.destroy',$film->id)); ?>" method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($film->id); ?>">
                                <button type="submit" class="del btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-4 border">
                            <?php $__currentLoopData = $film->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($actor->name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-4 border"><?php echo e($film->title); ?></div>
                        <div class="col-4 border">
                            <?php $__currentLoopData = $film->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($genre->name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/profile_admin.blade.php ENDPATH**/ ?>