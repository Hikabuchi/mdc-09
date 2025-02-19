<?php $__env->startSection('title', 'Фильм'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row d-flex">
            <div class="col-7 flex-md-equal">
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5"><?php echo e($film ->title); ?></h2>
                    </div>
                    <img class="img-fluid min-vh-100" src="<?php echo e(Storage::url($film ->image)); ?>" alt="">
                </div>
            </div>
            <div class="col-5 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
                <div class="my-3 p-3">
                    <h3 class="fs-2 text-body-emphasis">Описание:</h3>
                    <p><?php echo e($film ->description); ?></p>
                    <div class="d-flex justify-content-between">
                        <h4>Год:</h4>
                        <a href="/filter?year[]=<?php echo e($film ->year); ?>"><p><?php echo e($film ->year); ?></p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Страна:</h4>
                        <a href="/filter?country[]=<?php echo e($film ->country->id); ?>"><p><?php echo e($film ->country->name); ?></p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Режиссёр:</h4>
                        <a href="/filter?producer=<?php echo e($film ->producer->id); ?>"><p><?php echo e($film ->producer->name); ?></p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Жанры:</h4>
                        <p><?php $__currentLoopData = $film->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="/filter?genre[]= <?php echo e($g->id); ?>"> <?php echo e($g->name); ?> <?php if(!$loop->last): ?>/ <?php endif; ?> </a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                    </div>
                </div>
            </div>
            <hr>
           <div class="row">
               <?php $__currentLoopData = $film->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="col-lg-4">
                           <div class="">
                               <a href="/<?php echo e($actor->image); ?>" data-lightbox="actors" data-title="<?php echo e($actor->name); ?>"><img src="<?php echo e(Storage::url($actor->image)); ?>" alt=""></a>
                           </div>
                           <a href="/filter?actor=<?php echo e($actor->id); ?>">
                               <h2 class="fw-normal"><?php echo e($actor->name); ?></h2>
                           </a>
                           <p><?php echo e($actor->pivot->role); ?></p>
                       </div>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>

            <div class="row">
                <?php if($film->video != 'NULL'): ?>
                <?php echo $film ->video; ?>

                <?php endif; ?>
            </div>
            <?php if(count($film->seasons)): ?>
                <div class="row d-flex">
                    <h3>Сезоны</h3>
                    <?php $__currentLoopData = $film->seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-2 d-none d-lg-block">
                                <img class="img-fluid" src="<?php echo e($season ->image); ?>" alt="">
                            </div>
                            <div class="col-10 p-4 d-flex flex-column position-static ">
                                <h2 class="mb-0"><a href="/seasons/<?php echo e($season->id); ?>">Сезон: <?php echo e($season ->number); ?></a> </h2>
                                <div class="mb-1 text-body-secondary">Описание: <?php echo e($season ->description); ?></div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
        <h2>Отзывы:</h2>
        <?php if(auth()->guard()->check()): ?>
            <div class="">
                <form action="/review/create" method="post">
                    <input type="hidden" name="film_id" value="<?php echo e($film -> id); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <?php echo csrf_field(); ?>
                    <label for="rate">Оценка</label><br>
                    <input type="range" name="rate" id="rate" max="5" min="1" step="1"><br>
                    <label for="text">Отзыв</label><br>
                    <textarea id="text" name="text"></textarea><br>
                    <input name="review" id="review" type="submit" class="btn btn-secondary" value="Оставить отзыв">
                </form>
            </div>
        <?php endif; ?>

        <?php if($errors -> any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            <?php $__currentLoopData = $film->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($rev->status != 2): ?>
                    <div class="col">
                        <div class="card  rounded-3 shadow-sm">
                            <div class="card-header py-3"><?php echo e($rev->user->name); ?>

                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <?php echo e($rev->rate); ?>

                                </p>
                                <p><?php echo e(\Carbon\Carbon::parse($rev->created_at)->format('d/m/y H:i')); ?></p>
                            </div>
                            <?php echo e($rev->text); ?>


                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/films/show.blade.php ENDPATH**/ ?>