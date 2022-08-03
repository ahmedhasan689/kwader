<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    الشكاوي والإقتراحات
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
                        <h4 class="card-title mg-b-0">الشكاوي والإقتراحات</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">
                        هنا تجد كافة الشكاوي والإقتراحات التي تصل إلى لوحة التحكم
                    </p>
                    <div class="col-sm-6 col-md-3 mg-t-10" style="margin-right: -12px">
                        <a href="<?php echo e(route('admin.employee.trash')); ?>" class="btn btn-outline-danger">قائمة المحذوفات</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p">
                                    <span>
                                        الإسم
                                    </span>
                                </th>
                                <th class="wd-lg-20p">
                                    <span>
                                        الإيميل
                                    </span>
                                </th>
                                <th class="wd-lg-20p">
                                    <span>
                                        رقم الهاتف
                                    </span>
                                </th>
                                <th class="wd-lg-20p">
                                    <span>
                                        الرسالة
                                    </span>
                                </th>

                                <th class="wd-lg-20p">
                                    <span>
                                        تاريخ الرسالة
                                    </span>
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td>
                                        <?php echo e($contact->name); ?>

                                    </td>

                                    <td>
                                        <a href="#"><?php echo e($contact->email); ?></a>
                                    </td>

                                    <td>
                                        <?php echo e($contact->phone_number); ?>

                                    </td>
                                    <td>

                                        <span class="text-info">
                                            <?php echo e($contact->message); ?>

                                        </span>

                                    </td>

                                    <td>
                                        <span class="text-danger">
                                            <?php echo e($contact->created_at->format('Y-m-d')); ?>

                                        </span>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-left">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/Dashboard/contact_us/index.blade.php ENDPATH**/ ?>