<?php $__env->startSection('page_title', 'إضافة وظيفة'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('job.store', ['step' => 2])); ?>" method="POST" id="add_job">
        <?php echo csrf_field(); ?>
        <div class="addJob">
            <h2>أضف وظيفة جديدة</h2>
            <div class="steps container">
                <ul class="d-flex">
                    <li class="d-flex one-steps">
                        <?php if( $step == 1): ?>
                            <div>1</div>
                            <h5>ادخال البيانات</h5>
                        <?php else: ?>
                            <div style="background-color: #00B398; color: #fff; border-color: #00B398">1</div>
                            <h5 style="color: #00B398">ادخال البيانات</h5>
                        <?php endif; ?>

                    </li>
                    <li class="d-flex two-steps">
                        <div>2</div>
                        <h5>معاينة الوظيفة</h5>
                    </li>
                    <li class="d-flex three-steps">
                        <div>3</div>
                        <h5>دفع الرسوم</h5>
                    </li>
                </ul>

                
                <?php if( $step == 1 ): ?>
                <div class="first-step" style="display:block;">
                <?php else: ?>
                <div class="first-step" style="display:none;">
                <?php endif; ?>

                        <div class="row d-flex gap-2">
                            <div class="col-lg-4" style="border: 1px solid #898EA3; border-radius:5px; padding-bottom: 30px;">
                                <div class="mb-3 px-4 mt-4">
                                    <label for="jobName" class="form-label">
                                        المسمى الوظيفي
                                    </label>
                                    <input type="text" name="job_title" placeholder="مثال: مبرمج،مصمم جرافيك، مدير تسويقي" class="form-control <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="jobName" aria-describedby="company">
                                    <?php $__errorArgs = ['job_title'];
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
                                <div class="mb-3 px-4 mt-4">
                                    <label for="field" class="form-label">
                                        المجال
                                    </label>
                                    <input type="text" placeholder="ابحث عن المجال" class="form-control" id="field" aria-describedby="company">
                                    <div class="over">
                                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check" style="margin-right: 4px">
                                                <input class="form-check-input <?php $__errorArgs = ['job_field'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="job_field" value="<?php echo e($field->id); ?>" id="<?php echo e($field->id); ?>">
                                                <label class="form-check-label" for="<?php echo e($field->id); ?>">
                                                   <?php echo e($field->field_name); ?>

                                                </label>
                                            </div>
                                            <?php $__errorArgs = ['job_field'];
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <div class="specialize px-4 mt-4">
                                    <label for="specialized" class="form-label">
                                        الاختصاص
                                    </label>
                                    <input type="text" placeholder="ابحث عن الاختصاص" class="form-control" id="specialized" aria-describedby="company">
                                    <div class="over special">
                                        <span style="margin-right: 100px">
                                            سيكون الأختصاص هنا !
                                        </span>

                                        <?php $__errorArgs = ['special'];
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

                                </div>

                                <div class="mb-3 px-4 mt-4">
                                    <label for="jobName" class="form-label">
                                        المهارات
                                    </label>
                                    <select class="form-select" id="job_skills" multiple aria-label="Default select example" name="skills[]">

                                        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($skill->skill_name); ?>">
                                                <?php echo e($skill->skill_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="years px-4 mt-4">
                                    <h5>سنوات الخبرة</h5>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field <?php $__errorArgs = ['years_of_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="years_of_experience" value="0-2 سنوات" id="exper1">
                                        <label class="form-check-label" for="exper1">
                                            0-2 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field <?php $__errorArgs = ['years_of_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="years_of_experience" value="5-2 سنوات" id="exper2">
                                        <label class="form-check-label" for="exper2">
                                            5-2 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field <?php $__errorArgs = ['years_of_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="years_of_experience" value="10-5 سنوات" id="exper3">
                                        <label class="form-check-label" for="exper3">
                                            10-5 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field <?php $__errorArgs = ['years_of_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="years_of_experience" value="+10 سنوات" id="exper4">
                                        <label class="form-check-label" for="exper4">
                                            +10 سنوات
                                        </label>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['years_of_experience'];
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
                            <div class="col-lg-8" style="border: 1px solid #898EA3; border-radius:5px;">

                                <div class="d-flex gap-2  px-4 mt-4">
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="sallary" class="form-label">الراتب الشهري</label>
                                        <input style="width:100% ;" type="number" class="form-control <?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="salary" id="sallary">
                                        <?php $__errorArgs = ['salary'];
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
                                    <div class="mb-3">
                                        <label for="location" class="form-label" style="display: block">نظام العمل</label>

                                        <div style="display:inline; margin-left: 25px;">
                                            <input type="radio" id="system5" class="form-check-input <?php $__errorArgs = ['job_system'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job_system" value="دوام كامل">
                                            <label class="form-check-label" for="system5" style="">
                                                دوام كامل
                                            </label>
                                        </div>
                                        <div style="display:inline;">
                                            <input type="radio" id="system6" class="form-check-input <?php $__errorArgs = ['job_system'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job_system" value="دوام جزئي">
                                            <label class="form-check-label" for="system6">
                                                دوام جزئي
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['job_system'];
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
                                </div>

                                <div class="d-flex gap-2  px-4">
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="country" class="form-label">الدولة</label>
                                        <select class="form-select <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="country_id">
                                            <option >الرجاء إختيار الدولة من هنا</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>">
                                                    <?php echo e($country->country_name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['country_id'];
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
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="language" class="form-label">اللغات</label>
                                        <select id="languages" class="form-select <?php $__errorArgs = ['languages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" multiple name="languages[]" style="height: 20px">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($language->language_name); ?>">
                                                    <?php echo e($language->language_name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['languages'];
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
                                </div>
                                <div class="d-flex gap-2  px-4 mt-4">
                                    <div class="mb-3" style="width:100% ;">

                                        <br>
                                        <div class="form-outline">
                                            <label class="form-label" for="textAreaExample2">وصف الوطيفة</label>
                                            <textarea class="form-control <?php $__errorArgs = ['job_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job_description" id="textAreaExample2" rows="12"></textarea>
                                            <?php $__errorArgs = ['job_description'];
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
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                
                <?php if( $step == 2 ): ?>
                <div class="job-preview" style="display:block;">
                <?php else: ?>
                <div class="job-preview" style="display:none;">
                <?php endif; ?>
                    <div>
                        <img src="<?php echo e(asset('Front_Assets/img/Group 613.png')); ?>" alt="">
                        <p id="threeStep">
                            جاري معالجة طلبكم, ترقب ردَّنا قريبا
                        </p>
                    </div>
                </div>

                
                <?php if( $step == 3 ): ?>
                <div class="payment-fees" style="display:block;">
                <?php else: ?>
                <div class="payment-fees" style="display:none;">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="right">
                                <div class="card">
                                    <span>مجموع الدفع</span>
                                    <h5>$50</h5>
                                </div>
                                <p>كيف تريد أن تدفع</p>

                                    <div class="d-flex ss">
                                        <div><input type="checkbox" name="" id=""> <span>بطاقة الائتمانية</span></div>
                                        <div class="image d-flex">
                                            <img src="<?php echo e(asset('Front_Assets/img/mastercard.png')); ?>" alt="">
                                            <img src="<?php echo e(asset('Front_Assets/img/visa.png')); ?>'" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex ss">
                                        <div><input type="checkbox" name="" id=""> <span>Paypal</span></div>
                                        <div class="image d-flex ">
                                           <img src="<?php echo e(asset('Front_Assets/img/paypal.png')); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex ss">
                                        <div>
                                            <input type="checkbox" name="" id="">
                                            <span>
                                                بطاقة عضوية
                                            </span>
                                        </div>
                                        <div class="image d-flex">
                                            <img src="<?php echo e(asset('Front_Assets/img/Group 620.png')); ?>" alt="">
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-lg-4 center text-center mt-4">

                                <h5>تفاصيل الدفع الخاصة بك</h5>
                                <span>
                                    سيتم الدفع عن طريق حساب Paypal
                                </span>
                                <br>
                                <br>
                                <br>
                                <br>
                                <a href="<?php echo e(route('financial.CreatePayment', ['total' => 50])); ?>" type="submit" class="btn click" style="background-color: #00B398; color: white; padding: 10px 60px;">
                                    ادفع الان
                                </a>


                        </div>
                        <div class="col-lg-4 mt-5">
                            <img src="<?php echo e(asset('Front_Assets/img/Group 734.png')); ?>" alt="">
                        </div>
                    </div>
                </div>

                
                <?php if( $step == 4 ): ?>
                <div class="payment-fees" style="display:block;">
                <?php else: ?>
                <div class="payment-fees" style="display:none;">
                <?php endif; ?>
                    <div style="text-align: center; margin-top: 20px;">
                        <img src="<?php echo e(asset('Front_Assets/img/Group 613.png')); ?>" alt="" style="width: 300px; height: 300px">
                        <p id="threeStep" style="margin-top: 25px; font-size: 20px;">
                            مبروك ، لقد تم إعلان الوظيفة
                        </p>
                    </div>
                </div>

                <?php if( $step == 1 ): ?>
                    <div class="px-4 mt-4" style="float:left ; ">
                        <button type="submit" style="background-color: #00B398; border: none; padding: 10px 20px; font-size: large;"  class="btn btn-primary">
                            معاينة الوظيفة
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </form>
    <br> <br> <br><br> <br> <br>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });

            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }

      });

      function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employer/job/create.blade.php ENDPATH**/ ?>