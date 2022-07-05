<?php $__env->startSection('page_title', 'تعديل الملف الشخصي'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container personal-page mb-5">
        <div class="row align-items-center custom-border">
            <div class="col-lg-3 col-md-4">
                <form class="form-pic">
                    <div class="profile-pic">
                        <label id="edit_pic" class="-label" for="file">
                            <i class="bi bi-camera-fill me-2"></i>
                            <span>تعديل صورتك</span>
                        </label>
                        <input id="file" type="file" onchange="changePic(event)" />
                        <img src="<?php echo e($employee->image); ?>" class="img-fluid" alt="" id="output">
                    </div>
                    <button id="submit_pic" type="submit">حفظ الصورة</button>
                </form>








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
                                <i class="fa-solid fa-location-dot" style="color: #00B5AD"></i>
                                <img width="20" src="<?php echo e(asset('flags/') . '/' . $employee->country->code . '.png'); ?>" alt="">
                                <span class="country">
                                    <?php echo e($employee->country->country_name); ?>

                                </span>
                            </div>
                            <button onclick="editPersonalInfo()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
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
                            <button onclick="editSalaryInfo()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>

                    
                    <div id="edit_personal_info" class="py-4 px-3" style="display: none;">
                        <form action="<?php echo e(route('employee.dashboard.editInfo', ['id' => $employee->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <label for="first-name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-4 mb-3">
                                    <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" id="first-name" value="<?php echo e($employee->user->first_name); ?>">
                                    <?php $__errorArgs = ['first_name'];
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
                                <div class="col-sm-4 mb-3">
                                    <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" id="last-name" value="<?php echo e($employee->user->last_name); ?>">
                                    <?php $__errorArgs = ['last_name'];
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
                            <div class="mb-3 row">
                                <label for="Job-title" class="col-sm-3 col-form-label">
                                    المسمى الوظيفي
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?php $__errorArgs = ['job_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job_title" id="Job-title" value="<?php echo e($employee->job_title); ?>">
                                    <?php $__errorArgs = ['job_title'];
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
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">بلد الإقامة</label>
                                <div class="col-sm-8">
                                    <select class="form-select mb-3 <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="country_id">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($employee->country->id == $country->id): ?> selected <?php endif; ?> value="<?php echo e($country->id); ?>">
                                                <?php echo e($country->country_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['country_id'];
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
                                <button type="reset" class="btn btn-secondary px-3" id="personal_info_cancel">
                                    الغاء
                                </button>
                                <button type="submit" class="btn main-btn-2 px-3" id="set_info">
                                    حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                    

                    
                    <div id="edit_salary_info" class="py-4 px-3" style="display: none;">
                        <form action="<?php echo e(route('employee.dashboard.editSalary', ['id' => $employee->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <label for="monthly-salary" class="col-sm-3 col-form-label">الراتب الشهري</label>
                                <div class="col-sm-4 mb-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="salary" value="<?php echo e($employee->salary); ?>">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <?php $__errorArgs = ['salary'];
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
                            </div>
                            <div class="mb-3 row">
                                <label for="exper-years" class="col-sm-3 col-form-label">سنوات الخبرة</label>
                                <div class="col-sm-8">
                                    <input type="radio" class="btn-check" value="0-2 سنوات" name="years_of_experience" id="option1" autocomplete="off" <?php if($employee->years_of_experience == '2-0 سنوات'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-secondary" for="option1">0 - 2 سنوات</label>

                                    <input type="radio" class="btn-check" value="2-5 سنوات" name="years_of_experience" id="option2" autocomplete="off" <?php if($employee->years_of_experience == '5-2 سنوات'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-secondary" for="option2">2 -5 سنوات</label>

                                    <input type="radio" class="btn-check" value="5-10 سنوات" name="years_of_experience" id="option3" autocomplete="off" <?php if($employee->years_of_experience == '10-5 سنوات'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-secondary" for="option3">5 -10 سنوات</label>

                                    <input type="radio" class="btn-check" value="+10 سنوات" name="years_of_experience" id="option4" autocomplete="off" <?php if($employee->years_of_experience == '+10 سنوات'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-secondary" for="option4">+10 سنوات</label>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary px-3" id="edit_salary_cancel">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
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
                                <button onclick="editAvailability()" class="btn btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </div>
                        </div>

                        <div id="edit_availability" class="py-4 px-3" style="display: none;">
                            <form action="<?php echo e(route('employee.dashboard.editAvailability', ['id' => $employee->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" value="Available" name="availability" id="btnradio1" autocomplete="off" <?php if($employee->availability == 'Available'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-primary" for="btnradio1" style="border-bottom-right-radius: 20px;
                                    border-top-right-radius: 20px;">متاح</label>

                                    <input type="radio" class="btn-check" value="Unavailable" name="availability" id="btnradio2" autocomplete="off" <?php if($employee->availability == 'Unavailable'): ?> checked <?php endif; ?>>
                                    <label class="btn btn-outline-primary" for="btnradio2" style="border-bottom-left-radius: 20px;
                                    border-top-left-radius: 20px;">غير متاح</label>
                                </div>
                                <div class="mt-4">
                                    <h4>نظام العمل</h4>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="job_type" id="inlineCheckbox1" value="دوام كامل" <?php if($employee->job_type == 'دوام كامل'): ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="inlineCheckbox1">دوام كامل</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="job_type" id="inlineCheckbox2" value="دوام جزئي" <?php if($employee->job_type == 'دوام جزئي'): ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="inlineCheckbox2">دوام جزئي</label>
                                    </div>
                                </div>
                                <div class="col-sm-11 d-flex gap-2 mt-4">
                                    <button type="reset" class="btn btn-secondary flex-fill" id="edit_availability_cancel">الغاء</button>
                                    <button type="submit" class="btn main-btn-2 flex-fill">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <button onclick="editAboutMe()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
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
                            <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أخبرنا عن نفسك</h3>
                                </div>
                                <div class="modal-body">
                                    
                                    <form action="<?php echo e(route('employee.dashboard.personalTap', ['id' => $employee->id])); ?>" method="POST" id="personal-tap">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>

                                        <input type="hidden" id="employee_id" value="<?php echo e($employee->id); ?>">


                                        <div class="tap-personal-errors">

                                        </div>

                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" class="form-control" id="tap-first" name="first_name" value="<?php echo e($employee->user->first_name); ?>">
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" name="last_name" id="tap-last" value="<?php echo e($employee->user->last_name); ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="day" name="day">
                                                    <?php for( $i = 1; $i <= 31; $i++ ): ?>
                                                        <option <?php if( $day->format('d') == $i ): ?> selected <?php endif; ?>>
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="month" name="month">
                                                    <?php for( $i = 1; $i <= 12; $i++ ): ?>
                                                        <option <?php if( $day->format('m') == $i ): ?> selected <?php endif; ?>>
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>

                                                </select>
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="year" name="year">
                                                    <?php for( $i = 1970; $i <= 2022; $i++ ): ?>
                                                        <option <?php if( $day->format('Y') == $i ): ?> selected <?php endif; ?>>
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الجنس</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline" style="display:inline-block;">
                                                    <input class="form-check-input" type="radio" name="gender" id="male-gender" value="Male" <?php if( $employee->gender == 'Male'): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="display:inline-block;">
                                                    <input class="form-check-input" type="radio" name="gender" id="female-gender" value="Female" <?php if( $employee->gender == 'Female'): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="inlineRadio2">انثى</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الجنسية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="nationality" name="nationality">
                                                    <?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $national): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($employee->nationality_id == $national->id): ?> selected <?php endif; ?> value="<?php echo e($national->id); ?>">
                                                            <?php echo e($national->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">بلد الاقامة</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="country" name="country_id">
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($employee->country_id == $country->id): ?> selected <?php endif; ?> value="<?php echo e($country->id); ?>">
                                                            <?php echo e($country->country_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الحالة الاجتماعية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="marital_status" name="marital_status">
                                                    <option value="عزابي" <?php if( $employee->marital_status == 'عزابي'): ?> selected <?php endif; ?>>اعزب</option>
                                                    <option value="متزوج" <?php if( $employee->marital_status == 'متزوج'): ?> selected <?php endif; ?>>متزوج</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="about-me">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane fade" id="v-pills-experience" role="tabpanel" aria-labelledby="v-pills-experience-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الخبرة العملية</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#experModal">أضف خبرة</button>
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
                    <div class="modal fade" id="experModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف خبرتك العملية</h3>
                                </div>
                                <div class="experience-error">

                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employee.dashboard.practicalExperience')); ?>" method="POST" id="experience">
                                        <?php echo csrf_field(); ?>

                                        <div class="mb-4 row">
                                            <label for="Job-title" class="col-sm-3 col-form-label">المسمى الوظيفي</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="job_title" class="form-control" id="experience-Job-title">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="spc" class="col-sm-3 col-form-label">التخصص</label>
                                            <div class="col-sm-8">
                                                <select id="personal_special" class="special" name="special[]" multiple>
                                                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($specialization->specialization_name); ?>">
                                                            <?php echo e($specialization->specialization_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="compa" class="col-sm-3 col-form-label">اسم الشركة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="company_name" id="experience-company">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">مكان التوظيف</label>
                                            <div class="col-sm-8">
                                                <select id="experience-country" class="form-select" aria-label="Default select example" name="country_id">
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($country->id); ?>">
                                                            <?php echo e($country->country_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="start_month" aria-label="Default select example" id="start-month">
                                                    <option selected>الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4" >
                                                <select class="form-select mb-3" name="start_year" aria-label="Default select example" id="start-year">
                                                    <option selected>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>

                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_month" aria-label="Default select example" id="end_date_month">
                                                    <option >الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_year" aria-label="Default select example" id="end_date_year">
                                                    <option>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="still" value="option1" >
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1" style="margin-right: 25px;">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف الوظيفي</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="experModalButton">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                     aria-labelledby="v-pills-education-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التعليم و الدبلومات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#educationModal">أضف دبلوم</button>
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
                    
                    <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف معلومات التعليم</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employee.dashboard.education')); ?>" method="POST" id="education" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="edu-error">

                                        </div>
                                        <div class="mb-4 row">
                                            <label for="edu-name" class="col-sm-3 col-form-label">اسم المؤسسة</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="enterprise_name" class="form-control" id="edu-name">
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="deploma" class="col-sm-3 col-form-label">اسم الدبلوم</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="diploma_name" class="form-control" id="diploma">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="edu_start_month" name="edu_start_month">
                                                    <option selected>الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="edu_start_year" name="edu_start_year">
                                                    <option selected>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example" id="edu_end_month" name="edu_end_month">
                                                    <option>الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example" id="edu_end_year" name="edu_end_year">
                                                    <option>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="edu_still">
                                                    <small class="form-check-label text-muted" for="edu_still" style="margin-right: 25px">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="sp" class="col-sm-3 col-form-label">مجال التخصص</label>
                                            <div class="col-sm-8">
                                                <select id="edu_special" class="special" name="special[]" multiple>
                                                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($specialization->specialization_name); ?>">
                                                            <?php echo e($specialization->specialization_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" name="description" id="edu-description" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="cert_url" id="edu-url">
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">ملف الشهادة</label>
                                            <div class="col-sm-8">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" name="cert_file" id="cert-file" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="cert-file">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="edu-cancel">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-certificate" role="tabpanel"
                     aria-labelledby="v-pills-certificate-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الشهادات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#certificateModal">أضف شهادة</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <?php $__currentLoopData = $certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <img class="border rounded-circle border-success border-2" src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>"
                                         width="50" alt="">
                                    <div>
                                        <span class="d-block">
                                            <?php echo e($certification->name); ?>

                                        </span>
                                        <small>
                                            <?php echo e($certification->center_name); ?>

                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <?php echo e($certification->start_date); ?> -
                                    <?php if( $certification->end_date == ' / ' ): ?>
                                        <?php echo e('لا يوجد تاريخ إنتهاء'); ?>

                                    <?php else: ?>
                                        <?php echo e($certification->end_date); ?>

                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <?php $__currentLoopData = $certification->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="button" class="btn btn-sm">
                                <?php echo e($special); ?>

                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أدرج الشهادات التي تحصلت عليها</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employee.dashboard.certification')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mb-4 row">
                                            <label for="certif-name" class="col-sm-3 col-form-label">
                                                اسم الشهادة
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="certification_name" class="form-control" id="certification-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="center-name" class="col-sm-3 col-form-label">اسم المركز</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="center_name" class="form-control" id="center-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="major" class="col-sm-3 col-form-label">مجال التخصص</label>
                                            <div class="col-sm-8">
                                                <select id="cert_special" class="special" name="special[]" multiple>
                                                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($specialization->specialization_name); ?>">
                                                            <?php echo e($specialization->specialization_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ الإصدار</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" name="start_month" id="cert_start_month" aria-label="Default select example">
                                                    <option>الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" name="start_year" id="cert_start_year" aria-label="Default select example">
                                                    <option>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ الانتهاء</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_month" id="cert_end_month" aria-label="Default select example">
                                                    <option>الشهر</option>
                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_year" id="cert_end_year" aria-label="Default select example">
                                                    <option>السنة</option>
                                                    <?php for($i = 1980; $i <= 2022; $i++): ?>
                                                        <option value="<?php echo e($i); ?>">
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="cert_not_end" value="option1">
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1" style="margin-right: 25px;">هذه الشهادة لا تملك تايخ إنتهاء</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="certification_url" class="form-control" id="cert">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">ملف الشهادة</label>
                                            <div class="col-sm-8">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" name="certification_file" id="upload" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="upload">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="certification_cancel">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="tab-pane fade" id="v-pills-skills" role="tabpanel" aria-labelledby="v-pills-skills-tab"
                     tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التخصصات والمهارات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#skillsModal">أضف تخصص</button>
                    </div>
                    <?php $__currentLoopData = $employee_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ms-4 mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <img class="ounded-circle" src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>" width="50" alt="">
                                    <h4>
                                        <?php echo e($employee_skill->specialization->specialization_name); ?>

                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-3">
                            <?php $__currentLoopData = $employee_skill->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" class="btn btn-sm">
                                    <?php echo e($skill); ?>

                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="mt-3 ms-4">
                            <p class="tab-content">
                                <?php echo e($employee_skill->description); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف مجال تخصصك</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" id="employee_field">
                                        <div class="skill-error">

                                        </div>
                                        <div class="mb-4 row">
                                            <label for="certif-name" class="col-sm-3 col-form-label">المجال</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" name="specialization" id="employee_specialization" aria-label="Default select example">

                                                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($specialization->id); ?>">
                                                            <?php echo e($specialization->specialization_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="major-name" class="col-sm-3 col-form-label">
                                                التخصص
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select specialization" multiple id="employee_skills" name="skills[]" aria-label="Default select example">
                                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($skill->skill_name); ?>">
                                                            <?php echo e($skill->skill_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea name="description" id="field_description" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="employee_skills">
                                                الغاء
                                            </button>
                                            <button type="submit" class="btn main-btn-2 px-3">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                
                <div class="tab-pane fade" id="v-pills-languages" role="tabpanel"
                     aria-labelledby="v-pills-languages-tab" tabindex="0">
                    <?php if( session()->has('error') ): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php echo e(session()->get('error')); ?>

                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">اللغات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#languagesModal">أضف لغة</button>
                    </div>
                    <?php $__currentLoopData = $employee_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="container ms-4">
                            <?php echo e($employee_language->language->language_name); ?> : <?php echo e($employee_language->level); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="languagesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف مجال تخصصك</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employee.dashboard.setlanguages')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-4 row">
                                            <div class="col-sm-6">
                                                <select class="form-select mb-3" name="language_id" id="employee_language" aria-label="Default select example">
                                                    <option>اختر لغة</option>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($language->id); ?>">
                                                        <?php echo e($language->language_name); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-select mb-3" name="level" id="language_level" aria-label="Default select example">
                                                    <option>اختر المستوى </option>
                                                    <option value="مبتدئ">مبتدئ</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option value="أتحدثه بطلاقة">أتحدثه بطلاقة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="cancel_langs">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                


                <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab"
                     tabindex="0">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">السيرة الذاتية</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#CVModal">أرفق السيرة الذاتية</button>
                    </div>
                    <div class="container" style="margin-top: 25px">
                        <?php $__currentLoopData = $curriculum_vitaes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculum_vitae): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <iframe src="<?php echo e(asset('/Employee_CVs') . '/' . $curriculum_vitae->cv); ?>" type="application/pdf" width="900px" height="600px"></iframe>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="modal fade" id="CVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أرفق السيرة الذاتية</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employee.dashboard.addCV')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-4 row">
                                            <div class="col-sm-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" name="cv_file" id="cv-upload" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="cv-upload">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="certification_cancel">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employee/edit.blade.php ENDPATH**/ ?>