<?php $__env->startSection('page_title', 'العقود والمعاملات المالية'); ?>

<?php $__env->startSection('content'); ?>
<div class="suggest">
    <h2>
        حرّر عقد عمل ل<?php echo e($specific_employee->user->first_name . ' ' . $specific_employee->user->last_name); ?>

    </h2>
    <div class="content">
        <div class="row">
            <div class="col-lg-5">
                <form action="<?php echo e(route('contract.store', ['job' => $specific_job->id ,'employee' => $specific_employee->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="nameJob" class="form-label">
                            المسمى الوظيفي
                        </label>
                        <input type="text" name="job_title" class="form-control" id="nameJob"
                            placeholder="مثال: مبرمج , مصمم جرافيك , مدير تسويقي" value="<?php echo e($specific_job->job_title); ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <div style="margin-left: 80px;">
                            <label for="range" class="form-label">مدة العقد</label>
                            <select class="form-select" name="duration" aria-label="Default select example" style="width: 170%" id="duration">
                                <option value="شهر">شهر</option>
                                <option value="شهرين">شهرين</option>
                                <option value="ثلاث أشهر">ثلاث أشهر</option>
                              </select>
                        </div>
                        <div class="mx-3">
                            <label for="">نظام العمل</label>
                            <div class="d-flex mt-3" style="width: 115%;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="دوام كامل" <?php if($specific_job->job_system == 'دوام كامل'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineRadio1">
                                        دوام كامل
                                    </label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-right: -10px;">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="دوام جزئي" <?php if($specific_job->job_system == 'دوام جزئي'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineRadio2">
                                        دوام جزئي
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div>
                            <label for="salaryJob" class="form-label">الراتب الشهري</label>
                            <div class="d-flex suggest-inp">
                                <input type="text" class="form-control" name="salary" id="salaryJob" placeholder="0" value="<?php echo e($specific_job->salary); ?>">
                                <span>$</span>
                            </div>

                        </div>
                        <div>
                            <label for="budget" class="form-label">رسوم الموقع</label>
                            <div class="d-flex suggest-inp">
                                <input type="text" class="form-control" name="tt" value="50" id="budget" disabled>
                                <span>$</span>
                            </div>
                        </div>
                        <br>
                        <div>
                            <label for="budget" class="form-label">المجموع</label>
                            <div class="d-flex suggest-inp">
                                <input type="text" name="total" class="form-control" id="totalBudget" disabled>
                                <span>$</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-5">
                        <button type="submit" class="btn btn-primary sent">أرسل</button>
                        <button type="button" class="btn btn-primary">حفظ كمسودة</button>

                    </div>
                </form>

            </div>
            <div class="col-lg-7">
                <img src="<?php echo e(asset('Front_Assets/img/Group 1296.png')); ?>" alt="">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/Contract/create.blade.php ENDPATH**/ ?>