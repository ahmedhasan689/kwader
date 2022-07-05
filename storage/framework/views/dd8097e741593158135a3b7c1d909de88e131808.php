<?php $__env->startSection('page_title', 'شركاتي'); ?>

<?php $__env->startSection('content'); ?>

<div class="information">
    <div class="container">
        <h2>
            معلومات عن شركتك

        </h2>
        <div class="informationContent">
            <p>هذه المعلومات ضرورية لاضافة وظائف و تحرير العقود. لن تظهر في ملفك الشخصي</p>
            <form action="<?php echo e(route('company.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row d-flex gap-2 mx-2">

                    <div class="col-lg-6  mb-5 bb">

                        <div class="header">
                            المعلومات القانونية
                        </div>

                        
                        <div class="mb-3 px-4 mt-4">
                            <label for="companyName" class="form-label">اسم الشركة</label>
                            <input type="text" name="company_name" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="companyName" aria-describedby="company">
                            <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback">
                                <?php echo e($message); ?>

                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        
                        <div class="mb-3  px-4">
                            <label for="state" class="form-label">الحالة القانونية</label>
                            <select style="width:100% ;" id="country" class="form-select" name="legal_status">
                                <option value="registered">مسجل</option>
                                <option value="unregistered">غير مسجل</option>
                            </select>
                        </div>

                        
                        <div class="mb-3 px-4">
                            <label for="numberSign" class="form-label">رقم التسجيل</label>
                            <input type="text" name="registration_number" class="form-control <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="numberSign">
                            <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>



                        
                        <div class="mb-3  px-4">
                            <label for="title" class="form-label">العنوان</label>
                            <input type="text" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title">
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>



                        
                        <div class="d-flex gap-2  px-4">
                            <div class="mb-3" style="width:50% ;">
                                <label for="country" class="form-label">الدولة</label>
                                <select style="width:100% ;" aria-placeholder="لدولة" id="country" class="form-select" name="country_id">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>">
                                            <?php echo e($country->country_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            
                            <div class="mb-3" style="width:50% ;">
                                <label for="postNumber" class="form-label">الرقم البريدي</label>
                                <input style="width:100% ;" name="postal" type="text" class="form-control <?php $__errorArgs = ['postal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="postNumber">
                                <?php $__errorArgs = ['postal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>

                        
                        <div class="px-4">
                            <button type="submit" class="btn btn-primary">
                                حفظ
                            </button>
                        </div>

                    </div>

                    
                    <div class="col-lg-6 mb-5 ">
                        <div class="logo">
                            <div class="header">
                                شعار الشركة
                            </div>
                            <div>
                                <img class="personalPhoto" src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>" alt="">

                                <label for="file-input">
                                    <img class="camera" src="<?php echo e(asset('Front_Assets/img/photo-camera (1).png')); ?>" alt="">
                                </label>

                                <input id="file-input" name="visual_identity" type="file" />
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row" style="width: 85%; margin-right: 0px;">

                <form action="<?php echo e(route('contact.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="header">
                        معلومات الاتصال
                    </div>
                    <div class="d-flex gap-2  px-4 mt-4">

                        
                        <div class="mb-3" style="width:50% ;">
                            <label for="emailEx" class="form-label">البريد الالكتروني</label>
                            <input style="width:100% ;" name="company_email" type="email" class="form-control" id="emailEx">
                        </div>

                        
                        <div class="mb-3" style="width:50% ;">
                            <label for="location" class="form-label">الموقع الإلكتروني</label>
                            <input style="width:100% ;" name="company_website" type="text" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="d-flex gap-2  px-4">

                        
                        <div class="mb-3" style="width:50% ;">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input style="width:100% ;" name="company_phone" type="number" class="form-control" id="phone">
                        </div>

                        
                        <div class="mb-3" style="width:50% ;">
                            <label for="fax" class="form-label">رقم الفاكس</label>
                            <input style="width:100% ;" name="company_fax" type="number" class="form-control" id="fax">
                        </div>
                    </div>
                    <div class="px-4">
                        <button type="submit" class="btn btn-primary">
                            حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employer/company/index.blade.php ENDPATH**/ ?>