<?php $__env->startSection('title', 'Личный кабинет админа'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex">
        <?php echo $__env->make('admin.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <form action="/actors/<?php echo e($actor->id); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Имя и фамилия</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo e($actor->name); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" name="year_of_birth" value="<?php echo e($actor->year_of_birth); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label> <br>
                    <img src="<?php echo e(Storage::url($actor->image)); ?>" alt="" class="">
                    <input type="file"  class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/actors/edit.blade.php ENDPATH**/ ?>