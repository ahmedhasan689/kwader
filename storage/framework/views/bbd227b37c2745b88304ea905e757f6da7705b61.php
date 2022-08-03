<?php $__env->startSection('page_title', 'وظائفي'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3" style="background-color: #E7EAF6; height: 650px">
                <h3 class="my_job_status">الحالة</h3>
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="list-style: none;">
                    <li class="nav-item my_job_li" role="presentation">
                        <button class="nav-link my_job_button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            <img src="<?php echo e(asset('Front_Assets/img/Ellipse 306.png')); ?>" class="my_job_image" />
                            المفتوحة
                        </button>
                    </li>

                    <li class="nav-item my_job_li" role="presentation">
                        <button class="nav-link my_job_button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                            <img src="<?php echo e(asset('Front_Assets/img/Group 594.png')); ?>" class="my_job_image" />
                            قيد المراجعة
                        </button>

                    </li>

                    <li class="nav-item my_job_li" role="presentation">
                        <button class="nav-link my_job_button" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                            <img src="<?php echo e(asset('Front_Assets/img/Group 593.png')); ?>" class="my_job_image" />
                            المكتملة
                        </button>
                    </li>

                    <li class="nav-item my_job_li" role="presentation">
                        <button class="nav-link my_job_button" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel-tab-pane" type="button" role="tab" aria-controls="cancel-tab-pane" aria-selected="false">
                            <img src="<?php echo e(asset('Front_Assets/img/Group 592.png')); ?>" class="my_job_image" />
                            الملغاة
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-md-9" style="margin-top: 50px; padding-right: 50px">
                <div style="margin-bottom: 50px">
                    <a href="#" style="text-decoration: none">
                        <button class="btn btn-danger my_job_search_btn" >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input class="form-control form-control-lg" style="padding-right: 75px;" type="text" placeholder="إعثر على إعلان سابق" aria-label=".form-control-lg example">
                    </a>
                </div>
                <div class="tab-content" id="myTabContent">

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                            <?php if( $job->status == 'Opened' ): ?>
                                <div class="row my_job_box" style="margin-bottom: 15px">
                                <div class="col-md-9" style="margin-top: 5px">
                                    <h5 style="display: block; color: #3A3F50; margin-bottom: 12px;">
                                        <a href="<?php echo e(route('job.show', ['slug' => $job->slug])); ?>" style="text-decoration: none; color: #3A3F50;">
                                            <?php echo e($job->job_title); ?>

                                        </a>
                                    </h5>
                                    <div style="color: #898EA3">
                                        <span style="margin-left: 8px;">
                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                            <?php echo e($job->created_at->diffForHumans()); ?>

                                        </span>
                                        <?php if($job->employee_applicants): ?>
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                                <?php echo e($job->employee_applicants->count()); ?>  مرشح
                                            </span>
                                        <?php else: ?>
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                                0 مرشح
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="dropdown" style="display: flex; justify-content: end;">
                                        <button class="btn btn-secondary dropdown-toggle my_job_btn" style="margin-top: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            خيارات
                                        </button>
                                        <ul class="dropdown-menu" style="width: 200px;">
                                            <li>
                                                <form action="<?php echo e(route('job.delete', ['id' => $job->id])); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="dropdown-item" type="submit">
                                                        ألغِ هذه الوظيفة
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    أبلغ عن مشكلة
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php else: ?>
                                <h5 style="text-align: center" class="alert alert-danger">
                                    لا يوجد وظائف هنا !
                                </h5>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <?php if( $job->status == 'Under-Review' ): ?>
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <div class="row my_job_box" style="margin-bottom: 15px">
                                            <div class="col-md-9" style="margin-top: 5px">
                                                <h5 style="display: block; color: #3A3F50; margin-bottom: 12px;">
                                                    <a href="<?php echo e(route('job.show', ['slug' => $job->slug])); ?>" style="text-decoration: none; color: #3A3F50;">
                                                        <?php echo e($job->job_title); ?>

                                                    </a>
                                                </h5>
                                                <div style="color: #898EA3">
                                            <span style="margin-left: 8px;">
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                                <?php echo e($job->created_at->diffForHumans()); ?>

                                            </span>
                                                    <?php if($job->employee_applicants): ?>
                                                        <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    <?php echo e($job->employee_applicants->count()); ?>  مرشح
                                                </span>
                                                    <?php else: ?>
                                                        <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    0 مرشح
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown" style="display: flex; justify-content: end;">
                                                    <button class="btn btn-secondary dropdown-toggle my_job_btn" style="margin-top: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        خيارات
                                                    </button>
                                                    <ul class="dropdown-menu" style="width: 200px;">
                                                        <li>
                                                            <form action="<?php echo e(route('job.delete', ['id' => $job->id])); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button class="dropdown-item" type="submit">
                                                                    ألغِ هذه الوظيفة
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                أبلغ عن مشكلة
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php else: ?>
                                    <h5 style="text-align: center" class="alert alert-danger">
                                        لا يوجد وظائف هنا !
                                    </h5>
                                <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <?php if( $job->status == 'Closed' ): ?>
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="row my_job_box" style="margin-bottom: 15px">
                                        <div class="col-md-9" style="margin-top: 5px">
                                            <h5 style="display: block; color: #3A3F50; margin-bottom: 12px;">
                                                <a href="<?php echo e(route('job.show', ['slug' => $job->slug])); ?>" style="text-decoration: none; color: #3A3F50;">
                                                    <?php echo e($job->job_title); ?>

                                                </a>
                                            </h5>
                                            <div style="color: #898EA3">
                                            <span style="margin-left: 8px;">
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                                <?php echo e($job->created_at->diffForHumans()); ?>

                                            </span>
                                                <?php if($job->employee_applicants): ?>
                                                    <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    <?php echo e($job->employee_applicants->count()); ?>  مرشح
                                                </span>
                                                <?php else: ?>
                                                    <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    0 مرشح
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dropdown" style="display: flex; justify-content: end;">
                                                <button class="btn btn-secondary dropdown-toggle my_job_btn" style="margin-top: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    خيارات
                                                </button>
                                                <ul class="dropdown-menu" style="width: 200px;">
                                                    <li>
                                                        <form action="<?php echo e(route('job.delete', ['id' => $job->id])); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="dropdown-item" type="submit">
                                                                ألغِ هذه الوظيفة
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            أبلغ عن مشكلة
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php else: ?>
                                <h5 style="text-align: center" class="alert alert-danger">
                                    لا يوجد وظائف هنا !
                                </h5>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade" id="cancel-tab-pane" role="tabpanel" aria-labelledby="cancel-tab" tabindex="0">
                            <?php if( $job->status == 'Canceled' ): ?>
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="row my_job_box" style="margin-bottom: 15px">
                                        <div class="col-md-9" style="margin-top: 5px">
                                            <h5 style="display: block; color: #3A3F50; margin-bottom: 12px;">
                                                <a href="<?php echo e(route('job.show', ['slug' => $job->slug])); ?>" style="text-decoration: none; color: #3A3F50;">
                                                    <?php echo e($job->job_title); ?>

                                                </a>
                                            </h5>
                                            <div style="color: #898EA3">
                                            <span style="margin-left: 8px;">
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                                <?php echo e($job->created_at->diffForHumans()); ?>

                                            </span>
                                                <?php if($job->employee_applicants): ?>
                                                    <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    <?php echo e($job->employee_applicants->count()); ?>  مرشح
                                                </span>
                                                <?php else: ?>
                                                    <span>
                                                    <i class="fa-solid fa-user"></i>
                                                    0 مرشح
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="dropdown" style="display: flex; justify-content: end;">
                                                <button class="btn btn-secondary dropdown-toggle my_job_btn" style="margin-top: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    خيارات
                                                </button>
                                                <ul class="dropdown-menu" style="width: 200px;">
                                                    <li>
                                                        <form action="<?php echo e(route('job.delete', ['id' => $job->id])); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="dropdown-item" type="submit">
                                                                ألغِ هذه الوظيفة
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            أبلغ عن مشكلة
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php else: ?>
                                <h5 style="text-align: center" class="alert alert-danger">
                                    لا يوجد وظائف هنا !
                                </h5>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employer/job/my_job.blade.php ENDPATH**/ ?>