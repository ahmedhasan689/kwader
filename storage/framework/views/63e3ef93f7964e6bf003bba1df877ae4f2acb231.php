<?php $__env->startSection('page_title', 'أختيار التخصص'); ?>

<?php $__env->startSection('content'); ?>
    <div class="staffOption">
        <form action="<?php echo e(route('profile.updateField')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-lg-7">
                    <div class="container">

                        <div class="row pt-5 mb-5">

                            <h2>
                                اختر مجال تخصصك

                            </h2>
                            <p>
                                اختر المجالات التي ترغب في العمل بها. سيتم اعتبار اختيارك الأول مجال عملك الرئيسي
                            </p>

                            <div class="col-lg-4">
                                <label class="option_item">
                                    <input type="radio" class="checkbox" name="field_name" value="برمجة وتطوير">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 256.png')); ?>" alt="">
                                        <h5>
                                            برمجة و تطوير
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox" name="field_name" value="هندسة وعلوم">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>


                                        <img src="<?php echo e(asset('Front_Assets/img/Group 257.png')); ?>" alt="">
                                        <h5>
                                            هندسة و علوم
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="تسويق ومبيعات">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>

                                        <img src="<?php echo e(asset('Front_Assets/img/Group 255.png')); ?>" alt="">
                                        <h5>تسويق ومبيعات</h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="كتابة وترجمة">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>

                                        <img src="<?php echo e(asset('Front_Assets/img/Group 629.png')); ?>" alt="">
                                        <h5>
                                            كتابة و ترجمة
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="دعم فني">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 251.png')); ?>" alt="">
                                        <h5>
                                            دعم فني
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="محاسبة ومالية">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 259.png')); ?>" alt="">
                                        <h5>
                                            محاسبة و مالية
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">


                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="فن وتصميم">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 262.png')); ?>" alt="">
                                        <h5>
                                            فن و تصميم
                                        </h5>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="radio" class="checkbox field_value" name="field_name" value="تكنولوجيا المعلومات">
                                    <div class="option_inner job facebook ">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 266.png')); ?>" alt="">
                                        <h5 style="margin-top: -20px;">
                                            تكنولوجيا المعلومات
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4">

                                <label class="option_item">
                                    <input type="checkbox" class="checkbox">
                                    <div class="option_inner job facebook">
                                        <div class="tickmark"></div>
                                        <img src="<?php echo e(asset('Front_Assets/img/Group 645.png')); ?>" alt="">
                                        <h5>
                                            لم أجد مجالي
                                        </h5>
                                    </div>
                                </label>
                            </div>
                            <div class="sub">
                                <button type="submit">واصل</button>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="col-lg-5 leftOp ">


                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employee/profile/specialization.blade.php ENDPATH**/ ?>