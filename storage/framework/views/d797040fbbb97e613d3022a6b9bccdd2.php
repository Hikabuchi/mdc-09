<?php $__env->startSection('title', 'Добавить фильм'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex">
        <?php echo $__env->make('admin.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <form action="<?php echo e(route('films.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Год</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="year">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Описание</label><br>
                    <textarea name="description" id="" cols="60" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Продюссер</label><br>
                    <select name="producers" id="">
                    <option value="producer">Выбрать режиссёра</option>
                    <?php $__currentLoopData = $producers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producer->id); ?>"><?php echo e($producer->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Страна</label><br>
                    <select name="countries" id="">
                        <option value="">Выбрать страну</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Жанры</label><br>
                    <select multiple name="genres[]" id="genre" class="sel2 col-12">
                        <option value="">Выбрать жанры</option>
                        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3 aroles">
                    <label for="exampleInputEmail1" class="form-label">Актеры</label><br>
                    <div class="arole">
                        <select name="actors[]" id="actor">
                            <option value="">Выбрать актера</option>
                            <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($actor->id); ?>"><?php echo e($actor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="role" class="form-label">В роли </label>
                        <input type="text" name="role[]" id="role">
                        <input type="button" value="-" class="del-role-create">
                    </div>
                </div>
                <input type="button" value="+" class="clonerole">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label>
                    <input type="file"  class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ссылка на плеер</label><br>
                    <textarea name="video" id="" cols="60" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/create.blade.php ENDPATH**/ ?>