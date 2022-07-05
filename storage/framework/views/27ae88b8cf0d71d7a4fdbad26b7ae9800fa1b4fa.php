<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    الوظائف
                </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / لوحة التحكم
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">قائمة الوظائف</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-14 tx-gray-500 mb-2">
                        هنا قائمة الوظائف يمكنك الموافقة أو رؤية إستمرارية الوظيفة
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p">
                                    <span>
                                        المسمى الوظيفي
                                    </span>
                                </th>
                                <th class="wd-lg-20p">
                                    <span>
                                        صاحب العمل
                                    </span>
                                </th>
                                <?php if( $status == 'Under-Review'): ?>
                                    <th class="wd-lg-20p">
                                        <span>
                                            الوصف
                                        </span>
                                    </th>
                                <?php elseif( $status == 'Opened' ): ?>
                                    <th class="wd-lg-20p">
                                        <span>
                                            عدد المتقدمون
                                        </span>
                                    </th>
                                <?php endif; ?>
                                <th class="wd-lg-20p">
                                    <span>
                                        السعر
                                    </span>
                                </th>

                                <th class="wd-lg-20p">
                                    <span>
                                        نظام العمل
                                    </span>
                                </th>

                                <th class="wd-lg-20p">
                                    عمليات
                                </th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($job->job_title); ?>

                                    </td>
                                    <td>
                                        <?php echo e($job->employer->user->first_name); ?>

                                    </td>
                                    <?php if( $status == 'Under-Review'): ?>
                                        <td class="wd-lg-20p">
                                            <span>
                                                <?php echo e($job->description); ?>

                                            </span>
                                        </td>
                                    <?php elseif( $status == 'Opened' ): ?>
                                        <td class="wd-lg-20p">
                                            <?php if($job->employee_applicants): ?>
                                                <span>
                                                    <?php echo e(count($job->employee_applicants)); ?>

                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    0
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>

                                    <td>
                                        <span>
                                            <?php echo e($job->salary); ?>

                                        </span>
                                    </td>

                                    <td>
                                        <span>
                                            <?php echo e($job->job_system); ?>

                                        </span>
                                    </td>

                                    <?php if($status == 'Under-Review'): ?>
                                        <td>
                                            <form action="<?php echo e(route('admin.job.accept', ['id' => $job->id])); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field( 'PUT' ); ?>
                                                <button type="submit" class="btn btn-sm btn-success" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="#" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field( 'DELETE' ); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-x"></i>
                                                </button>
                                            </form>
                                            <form action="#" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field( 'PUT' ); ?>
                                                <button type="submit" class="btn btn-sm btn-warning" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php elseif($status == 'Opened'): ?>
                                        <td>
                                            <form action="" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field( 'PUT' ); ?>
                                                <button type="submit" class="btn btn-sm btn-info" style="padding: 5px 13px;">
                                                    <i class="icon ion-ios-share-alt" style="margin-right: 1px"></i>
                                                </button>
                                            </form>
                                            <form action="" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field( 'DELETE' ); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" style="padding: 5px 13px;">
                                                    <i class="las la-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php endif; ?>

                                </tr>

                                

























                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex">
                        <?php echo e($jobs->links()); ?>

                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/Dashboard/job/index.blade.php ENDPATH**/ ?>