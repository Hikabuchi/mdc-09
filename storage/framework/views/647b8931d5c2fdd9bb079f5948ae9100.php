<div class="d-flex" xmlns:a="http://www.w3.org/1999/html">
    <div class="d-flex flex-column flex-shrink-0 p-3  shadow" style="width: 230px;">
        <a href="/" class="d-flex align-items-center  mb-md-0 me-md-auto text-black text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Фильтр</span>
        </a>
        <form action="/filter" method="get">
            <hr>
            <label for="genre"><strong>Жанры: </strong></label><br>
            <select multiple name="genre[]" id="genre" class="sel2 col-12">
                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($gen->id); ?>" <?php if(is_array(request()->genre) && in_array($gen->id, request()->genre)): ?> selected <?php endif; ?>><?php echo e($gen->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <hr>

            <select name="year" id="year">
                <option value="">Выбрать год</option>
                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($year->year); ?>" <?php if(request()->year == $year->year): ?> selected <?php endif; ?>><?php echo e($year->year); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <hr>
            <label for="country"><strong>Страны: </strong></label><br>
            <select multiple name="country[]" id="country" class="sel2 col-12">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php if(is_array(request()->country) && in_array($country->id, request()->country)): ?> selected <?php endif; ?>><?php echo e($country->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <hr>
            <button type="submit" class="btn btn-primary">Фильтровать</button>
        </form>


    </div>
<?php /**PATH /var/www/html/resources/views/filter_nav.blade.php ENDPATH**/ ?>