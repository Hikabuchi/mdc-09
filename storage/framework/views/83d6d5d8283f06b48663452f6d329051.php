<?php $__env->startSection('title', 'Личный кабинет'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex">
        <?php echo $__env->make('admin.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <div class="row">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Текст</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->status != 2 && $r->status != 1): ?>
                        <tr>
                            <td><?php echo e($r->user->name); ?></td>
                            <td><?php echo e($r->text); ?></td>
                            <td>
                                <a href="/reviews/moder/<?php echo e($r->id); ?>/1" class="btn btn-primary">V</a>
                                <a href="/reviews/moder/<?php echo e($r->id); ?>/2" class="btn btn-danger">X</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/admin_comment.blade.php ENDPATH**/ ?>