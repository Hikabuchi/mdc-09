<?php $__env->startSection('title', 'Добавить фильм'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex">
        <?php echo $__env->make('admin.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <form action="/films/<?php echo e($film->id); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="<?php echo e($film->title); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Год</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="year" value="<?php echo e($film->year); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Описание</label><br>
                    <textarea name="description" id="" cols="60" rows="10"><?php echo e($film->description); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Продюссер</label><br>
                    <select name="producer" id="">
                        <option value="producer">Выбрать режиссёра</option>
                        <?php $__currentLoopData = $producers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($producer->id); ?>" <?php if($film->producer->id == $producer->id): ?> selected <?php endif; ?>><?php echo e($producer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Страна</label><br>
                    <select name="country" id="">
                        <option value="">Выбрать страну</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>" <?php if($film->country->id == $country->id): ?> selected <?php endif; ?>><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Жанры</label><br>
                    <select multiple name="genres[]" id="genre" class="sel2 col-12">
                        <option value="">Выбрать жанры</option>
                        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($genre->id); ?>" <?php if($film->genres->contains('id', $genre->id)): ?> selected <?php endif; ?>><?php echo e($genre->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3 aroles">
                    <label for="exampleInputEmail1" class="form-label">Актеры</label><br>
                    <?php $__currentLoopData = $film->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="arole">
                        <select name="actors[]" id="actor">
                            <option value="">Выбрать актера</option>
                            <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($actor->id); ?>" <?php if($a->id == $actor->id): ?> selected <?php endif; ?>><?php echo e($actor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="role" class="form-label">В роли </label>
                        <input type="text" name="role[]" id="role" value="<?php echo e($a->pivot->role); ?>">
                        <input type="button" value="-" class="del-role">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <input type="button" value="+" class="clonerole">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label> <br>
                    <img src="<?php echo e(Storage::url($film->image)); ?>" alt="" class="">
                    <input type="file"  class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ссылка на плеер</label><br>
                    <textarea name="video" id="" cols="60" rows="10"><?php echo e($film->video); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/edit.blade.php ENDPATH**/ ?>