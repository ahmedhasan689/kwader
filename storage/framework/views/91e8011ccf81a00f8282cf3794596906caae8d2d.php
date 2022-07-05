<?php $__env->startSection('page_title', 'عرض الملف الشخصي'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container personal-page mb-5">
        <div class="row align-items-center custom-border">
            <div class="col-lg-3 col-md-4">
                <div class="profile-pic">
                    <img src="<?php echo e($employee->image); ?>" class="img-fluid" alt="" id="output">
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="d-flex justify-content-between my-4 my-md-0 flex-column flex-md-row">
                    <div id="personal_info" class="user-info text-center text-md-start">
                        <div class="edit-hover">
                            <h3 class="name">
                                <?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?>

                            </h3>
                            <p class="Job-title">
                                <?php echo e($employee->job_title); ?>

                            </p>
                            <div
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                                <i class="bi bi-geo-alt-fill"></i>
                                <img width="20" src="<?php echo e(asset('flags/') . '/' . $employee->country->code . '.png'); ?>" alt="">
                                <span class="country">
                                    <?php echo e($employee->country->country_name); ?>

                                </span>
                            </div>
                        </div>
                        <div class="edit-hover pe-0 pe-md-5 py-3">
                            <div class="div-group d-flex mt-3">
                                <div class="py-2">
                                    <small>الراتب</small>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4>
                                            <?php echo e($employee->salary); ?>$
                                        </h4>
                                        <small> / الشهر</small>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <small>سنوات الخبرة</small>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4>
                                            <?php echo e($employee->years_of_experience); ?>

                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="mt-4 mt-md-0 mx-auto mx-md-0">
                        <div id="availability">
                            <div class="edit-hover p-4">
                                <div class="availability">
                                    <?php if($employee->availability == 'Available'): ?>
                                        <span class="dot" style="background-color: #080"></span>
                                        <span class="state">متاح</span>
                                    <?php else: ?>
                                        <span class="dot"></span>
                                        <span class="state">غير متاح</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php if(auth()->user()->user_type == 'Employer'): ?>
                    <div style="margin-top: -100px;margin-left: 25px; text-align: left;">
                        <button href="#" type="button" data-bs-toggle="modal" data-bs-target="#selectJob" class="btn btn-success" style="margin-bottom: 5px; font-size: 18px; padding: 10px 50px; background-color: #00B398; border: none">
                            أقترح عليّ وظيفة
                        </button>
                        <br>
                        <button href="#" type="button" class="btn btn-outline-secondary" style="color: #898EA3; font-size: 18px; padding: 10px 35px">
                            <i class="fa-regular fa-heart" style="color: #898EA3"></i>
                            أضف إلى المفضلة
                        </button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="selectJob" tabindex="-1" aria-labelledby="selectJobLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            أقترح وظيفة
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button class="btn btn-secondary" type="button" style="background-color: #E7EAF6; border: 1px solid #898EA3; padding: 10px 15px; width: 100%; margin-bottom: 5px; color: #898EA3; text-align: right">
                                                <input type="hidden" class="job-selected" value="<?php echo e($job->id); ?>">
                                                <?php echo e($job->job_title); ?>

                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="modal-footer" style="justify-content: flex-end;">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: transparent; padding: 8px 25px; color: #898EA3">
                                            إلغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary" style="background-color: #00B398; padding: 8px 25px; border: none">
                                            أقترح
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="row d-flex flex-column flex-lg-row custom-border">
            <div class="col-lg-3 mb-lg-0 mb-5">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-about-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="true">
                        <i class="fa-solid fa-circle-user"></i>
                        نبذة عني
                    </button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa-solid fa-id-card"></i>
                        المعلومات الشخصية
                    </button>
                    <button class="nav-link" id="v-pills-experience-tab" data-bs-toggle="pill" data-bs-target="#v-pills-experience" type="button" role="tab" aria-controls="v-pills-experience" aria-selected="false">
                        <i class="fa-solid fa-briefcase"></i>
                        الخبرة العملية
                    </button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill" data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education" aria-selected="false">
                        <i class="fa-solid fa-graduation-cap"></i>
                        التعليم و الدبلومات
                    </button>
                    <button class="nav-link" id="v-pills-certificate-tab" data-bs-toggle="pill" data-bs-target="#v-pills-certificate" type="button" role="tab" aria-controls="v-pills-certificate" aria-selected="false">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        الشهادات
                    </button>
                    <button class="nav-link" id="v-pills-skills-tab" data-bs-toggle="pill" data-bs-target="#v-pills-skills" type="button" role="tab" aria-controls="v-pills-skills" aria-selected="false">
                        <i class="fa-solid fa-gear"></i>
                        التخصصات والمهارات
                    </button>

                    <button class="nav-link" id="v-pills-languages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-languages" type="button" role="tab" aria-controls="v-pills-languages" aria-selected="false">
                        <i class="fa-solid fa-language"></i>
                        اللغات
                    </button>
                    <button class="nav-link" id="v-pills-cv-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cv" type="button" role="tab" aria-controls="v-pills-cv" aria-selected="false">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        السيرة الذاتية
                    </button>
                </div>
            </div>

            <div class="col-lg-9 tab-content mt-3" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel"
                     aria-labelledby="v-pills-about-tab" tabindex="0">
                    <h3 class="tab-title">نبذة عني</h3>
                    <div id="about_me" class="ms-4 mt-4">
                        <div class="edit-hover pe-0 pe-md-5 py-0 py-md-3">
                            <p class="tab-content">
                                <?php echo e($employee->bio); ?>

                            </p>
                        </div>
                    </div>
                    <div id="edit_about_me" class="p-4" style="display: none; background-color: #e7eaf680;">
                        <form action="<?php echo e(route('employee.dashboard.editBio', ['id' => $employee->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row mb-4">
                                <div class="col-sm-11">
                                    <textarea class="form-control <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bio" rows="5">
                                        <?php echo e($employee->bio); ?>

                                    </textarea>
                                    <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary px-3" id="bio_cancel">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>

                
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                     tabindex="0">
                    <h3 class="tab-title">المعلومات الشخصية</h3>
                    <div class="ms-4 mt-4">
                        <div class="edit-hover">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th class="tab-title" scope="row">الاسم</th>
                                    <td>
                                        <?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">تاريخ الميلاد</th>
                                    <td>
                                        <?php echo e($employee->date_of_birth); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنس</th>
                                    <td>
                                        <?php if( $employee->gender == 'Male' ): ?>
                                            ذكر
                                        <?php else: ?>
                                            أنثى
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنسية</th>
                                    <td>
                                        <?php if($employee->nationalit_id): ?>
                                            <?php echo e($employee->nationality->name); ?>

                                        <?php else: ?>
                                            <?php echo e($employee->country->country_name . 'ي'); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">بلد الإقامة</th>
                                    <td>
                                        <?php echo e($employee->country->country_name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الحالة الاجتماعية</th>
                                    <td>
                                        <?php echo e($employee->marital_status); ?>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane fade" id="v-pills-experience" role="tabpanel" aria-labelledby="v-pills-experience-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الخبرة العملية</h3>
                    </div>
                    <?php if($practical_experiences): ?>
                        <?php $__currentLoopData = $practical_experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ms-4 mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center gap-3">
                                        <img class="border rounded-circle border-success border-2" src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>"
                                             width="50" alt="">
                                        <div>
                                            <span class="d-block"><?php echo e($practical->company_name); ?></span>
                                            <small><?php echo e($practical->job_title); ?></small>
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo e($practical->start_date); ?> -
                                        <?php if( $practical->end_date == '/'): ?>
                                            <?php echo e('حتى الآن'); ?>

                                        <?php else: ?>
                                            <?php echo e($practical->end_date); ?>

                                        <?php endif; ?>  -
                                        <?php echo e($practical->country->country_name); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="container mt-3">
                                <?php $__currentLoopData = $practical->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button" class="btn btn-sm">
                                        <?php echo e($special); ?>

                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="mt-3" style="margin-right: 30px;">
                                <p class="tab-content">
                                    <?php echo e($practical->description); ?>

                                </p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>


                
                <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                     aria-labelledby="v-pills-education-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التعليم و الدبلومات</h3>
                    </div>
                    <?php if( $educations ): ?>
                        <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ms-4 mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center gap-3">
                                        <img class="border rounded-circle border-success border-2" src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>"
                                             width="50" alt="">
                                        <div>
                                            <span class="d-block">
                                                <?php echo e($education->enterprise_name); ?>

                                            </span>
                                            <small>
                                                <?php echo e($education->diploma_name); ?>

                                            </small>
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo e($education->start_date); ?> -
                                        <?php if( $education->end_date == ' / ' ): ?>
                                            <?php echo e('حتى الآن'); ?>

                                        <?php else: ?>
                                            <?php echo e($education->end_date); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3">
                                <?php $__currentLoopData = $education->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button" class="btn btn-sm">
                                        <?php echo e($special); ?>

                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="mt-3">
                                <p class="tab-content">
                                    <?php echo e($education->description); ?>

                                </p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>


                <div class="tab-pane fade" id="v-pills-certificate" role="tabpanel"
                     aria-labelledby="v-pills-certificate-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الشهادات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#certificateModal">أضف شهادة</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <img class="border rounded-circle border-success border-2" src="images/company.png"
                                     width="50" alt="">
                                <div>
                                    <span class="d-block">اسم الشهادة</span>
                                    <small>اسم المركز</small>
                                </div>
                            </div>
                            <div>
                                تاريخ الإصدار - تاريخ الانتهاء
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                    </div>

                </div>


                <div class="tab-pane fade" id="v-pills-skills" role="tabpanel" aria-labelledby="v-pills-skills-tab"
                     tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التخصصات والمهارات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#skillsModal">أضف تخصص</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <img class="ounded-circle" src="images/skills.png" width="50" alt="">
                                <h4>فن و تصميم</h4>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                        <button type="button" class="btn btn-sm">التخصص 2</button>
                        <button type="button" class="btn btn-sm">التخصص 3</button>
                        <button type="button" class="btn btn-sm">التخصص 4</button>
                        <button type="button" class="btn btn-sm">التخصص 5</button>
                        <button type="button" class="btn btn-sm">التخصص 6</button>
                        <button type="button" class="btn btn-sm">التخصص 7</button>
                        <button type="button" class="btn btn-sm">التخصص 8</button>
                        <button type="button" class="btn btn-sm">التخصص 9</button>
                    </div>
                    <div class="mt-3 ms-4">
                        <p class="tab-content">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                            وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص
                            الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها
                            من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                            النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير
                            في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا
                            النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر"
                            (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-languages" role="tabpanel"
                     aria-labelledby="v-pills-languages-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">اللغات</h3>
                    </div>
                    <div class="container ms-4">
                        العربي : متوسط
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab"
                     tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">السيرة الذاتية</h3>
                    </div>
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row pt-5 pb-2 text-center text-sm-start">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>كوادر.كوم</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">عن كوادر.كوم</a>
                        <a class="nav-link" href="#">إرشادات الاستخدام</a>
                        <a class="nav-link" href="#">بيان الخصوصية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>الكادر</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">انضمَّ إلينا</a>
                        <a class="nav-link" href="#">ابحث عن وظيفة</a>
                        <a class="nav-link" href="#">كوادر بريميوم</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>صاحب العمل</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">أنشئ حسابك الآن</a>
                        <a class="nav-link" href="#">أعلن عن وظيفة</a>
                        <a class="nav-link" href="#">بطاقات العضوية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>تابعنا على</h5>
                    <div
                        class="social-icon d-flex align-items-center justify-content-center justify-content-sm-start mt-3 gap-4">
                        <a href="#">
                            <span>
                                <i class="bi bi-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-linkedin"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-facebook"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="last-footer py-4">
            © 2022 كوادر.كوم جميع الحقوق محفوظة
        </div>
    </footer>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employee/show.blade.php ENDPATH**/ ?>