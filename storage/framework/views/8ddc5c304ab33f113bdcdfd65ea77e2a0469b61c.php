<?php $__env->startSection('page_title', 'إنشاء الحساب'); ?>

<?php $__env->startSection('content'); ?>
    <div class="staffOption ">


        <form action="<?php echo e(route('profile.set-information')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">

                <div class="col-lg-7 mb-5">
                    <div class="container">
                        <div class="row mt-5">
                            <h2>
                                ملفك الشخصي

                            </h2>
                            <p>
                                اختر المجالات التي ترغب في العمل بها. سيتم اعتبار اختيارك الأول مجال عملك الرئيسي
                            </p>

                            <div class="one">
                                <h5>مجالاتك</h5>
                                <div class="d-flex oneinter">
                                    <div>
                                        <p><?php echo e($employee->field->field_name); ?></p>
                                        <div class="group">
                                            <?php $__currentLoopData = $employee->specialization; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span>
                                                    <?php echo e($special); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two">
                                <h5>المسمى الوظيفي</h5>
                                <input type="text" class="form-control <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job_title" placeholder="مثال: مبرمج،مصمم جرافيك، مدير تسويقي">
                                <?php $__errorArgs = ['job_title'];
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
                            <div class="three">
                                <h5>البلد</h5>
                                <div style="height: 38px;">
                                    <span id="flag">
                                        <img src="<?php echo e(asset('flags/QA.png')); ?>" style="width: 20px; margin: 10px">
                                    </span>
                                    <select class="form-select <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" aria-label="Default select example" style="border: none; border-radius: 0;">
                                        <option >الرجاء إختيار الدولة</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>">
                                                <?php echo e($country->country_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['country'];
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
                            <div class="four">
                                <h5>سنوات الخبرة</h5>
                                <div class="group mt-3">
                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="2-0سنوات" checked>
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            2-0 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="5-2 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            5-2 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="10-5 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            10-5 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="+10 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            +10 سنوات
                                        </span>
                                    </label>

                                </div>

                            </div>
                            <div class="five">
                                <h5>المهارات</h5>
                                <p>يرجى الإشارة إلى جميع مهاراتك التي تعتقد أنها ذات صلة وأن العميل قد يبحث عن: البرمجيات /
                                    التقنيات التي تتقنها ، ومجالات
                                    تخصصك ، ومهاراتك الشخصية والإدارية ، وقطاعات العمل التي تكون خبيراً فيها ، إلخ
                                    أي شيء يمكن أن يثير اهتمام أصحاب الاعمال ويساعدهم في العثور على ملفك الشخصي
                                    يحق لك طرح ما يصل إلى 50 مهارة !! كن حذرًا ، يعد الترتيب أمرًا مهمًا: أول 7 مهاره رئيسية
                                    أهم من غيرها ، اخترها بعناية</p>

                                <select class="form-select form-select-lg mb-3 <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple id="skills" name="skills[]">
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option>
                                            <?php echo e($skill->skill_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['skills'];
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
                            <div class="six">
                                <h5>
                                    الراتب الشهري
                                </h5>
                                <p>ادخل الراتب التقريبي الذي ترغب في تقاضيه شهريا بدوام كامل ( 7ساعات يوميا/5 أيام في
                                    الأسبوع ). ملاحظة هذا المبلغ قابل
                                    للنقاش
                                    مع صاحب العمل حسب شروط العقد</p>
                                <div>
                                    <input type="number" class="<?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0" name="salary">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                </div>
                                <?php $__errorArgs = ['salary'];
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
                            <div class="seven">
                                <h5>
                                    رقم الهاتف
                                </h5>
                                <p>لن يظهر رقم هاتفك في ملفك الشخصي ولن تتم مشاركته إلّا مع أصحاب الأعمال المتعاقد معهم</p>
                                <div style="border: 1px solid #ccc">
                                    <input type="text" class="form-control phone_number" name="phone_number" style="width: 90%;display: inline;border: none;">
                                    <select name="" class="flag_select" style="height: 38px;border: none;width: 9%;">
                                        <option>
                                            One
                                        </option>
                                        <option>
                                            Two
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="sub d-flex gap-2">
                                <button class="btn btn-light" style="background-color: transparent; color:#ccc;">
                                    <a href="<?php echo e(route('profile.specialization')); ?>" class="back" style="padding: 5px 20px; border-radius: 7px;padding-right: 20px;margin-left: -22px; text-decoration: none">
                                            رجوع
                                    </a>
                                </button>
                                <button type="submit" class="save">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 leftOp d-none d-lg-block">
                    <img style="position:static; width: 50%; left:20%; top: 200px;" src="<?php echo e(asset('Front_Assets/img/Group 862.png')); ?>" alt="">
                </div>
            </div>
        </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employee/profile/profile_info.blade.php ENDPATH**/ ?>