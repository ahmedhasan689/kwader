<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    الكادر
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
                        <h4 class="card-title mg-b-0">قائمة الكوادر</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-14 tx-gray-500 mb-2">
                          هنا تجد كافة الكوادر في الموقع، يمكنك التعديل والحذف من هنا
                    </p>
                    <div class="col-sm-6 col-md-3 mg-t-10" style="margin-right: -12px">
                        <a href="<?php echo e(route('admin.employer.trash')); ?>" class="btn btn-outline-danger">قائمة المحذوفات</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p">
                                        <span>
                                            المستخدم
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span></span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            تاريخ التسجيل
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            الحالة
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            البريد الإلكتروني
                                        </span>
                                    </th>

                                    <th class="wd-lg-20p">
                                        <span>
                                            تأكيد البريد الإلكتروني
                                        </span>
                                    </th>

                                    <th class="wd-lg-20p">
                                        عمليات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2" src="<?php echo e($user->employee->image); ?>">
                                    </td>
                                    <td>
                                        <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->created_at->diffForHumans()); ?>

                                    </td>

                                    <td class="text-center">
                                        <?php if( Cache::has('user-is-online' . $user->id) ): ?>
                                            <span class="label text-success d-flex">
                                            <div class="dot-label bg-success ml-1"></div>
                                            Active
                                        </span>
                                        <?php else: ?>
                                            <span class="label text-muted d-flex">
                                            <div class="dot-label bg-gray-300 ml-1"></div>
                                            Inactive
                                        </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo e($user->email); ?></a>
                                    </td>
                                    <td>
                                        <?php if( $user->email_verified_at ): ?>
                                            <span class="text-success">
                                                Yes
                                            </span>
                                        <?php else: ?>
                                            <span class="text-danger">
                                                No
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('admin.employee.edit', ['id' => $user->id])); ?>" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a href="#" data-target="#delete-<?php echo e($user->id); ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                                            <i class="las la-trash" style="margin-right: 1px"></i>
                                        </a>
                                    </td>

                                </tr>

                                
                                <div class="modal" id="delete-<?php echo e($user->id); ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-danger mg-b-20">
                                                    إنتباه : أنت تقوم بحذف كادر
                                                </h4>
                                                <p class="mg-b-20 mg-x-20">
                                                    سيتم جدولة الحذف للكادر خلال 30 يوماً ، ثم يتم الحذف التلقائي ، يمكنك أن تجد الكادر من خلال قائمة المحذوفات
                                                </p>
                                                <form action="<?php echo e(route( 'admin.employee.delete', ['id' => $user->id] )); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn ripple btn-danger pd-x-25">
                                                        متأكد
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination mt-4 mb-0 float-left">
                        <?php echo e($users->links()); ?>

                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/Dashboard/employee/index.blade.php ENDPATH**/ ?>