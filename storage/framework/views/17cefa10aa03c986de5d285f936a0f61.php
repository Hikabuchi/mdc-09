<?php $__env->startSection('title', 'Авторизация'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center">
        <form class="col-4 py-5" method="POST" action="/login">
            <?php echo csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
            <?php if($errors -> any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger"><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="form-floating pb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="example0000">
                <label for="floatingInput">Login</label>
            </div>

            <div class="form-floating pb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3 pb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Запомнить меня
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-body-secondary">Нет аккаунта? <a href="">Зарегистрироваться</a></p>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/login.blade.php ENDPATH**/ ?>