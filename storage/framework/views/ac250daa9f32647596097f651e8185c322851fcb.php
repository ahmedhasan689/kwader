<?php $__env->startSection('page_title', 'الوظائف'); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #04AA6D;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="search">
        <div class="container">
            <div class="row">

                <div class="col-3 right">
                    <form>
                        <h5>
                            البحث
                        </h5>
                        <div class="gro">

                        </div>
                        <hr>

                        <h5>الراتب الشهري</h5>


                        <div class="slidecontainer">
                            <input type="range" min="100" max="5000" step="100" name="salary" class="slider" id="myRange" onchange="filter()">
                            <div class="d-flex " style="justify-content:space-between;">
                                <span>100.00$</span>
                                <span id="demo"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="country">
                            <h5>الدولة</h5>
                            <select class="form-select" aria-label="Default select example" id="country_search_jobs" name="country" onchange="filter()">
                                <option>أختر من القائمة</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>">
                                        <?php echo e($country->country_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <hr>
                        <div class="years">
                            <h5>سنوات الخبرة</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="0-2 سنوات" id="year_one">
                                <label class="form-check-label" for="flexCheckDefault">
                                    0-2 سنوات
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="5-2 سنوات" id="year_two">
                                <label class="form-check-label" for="flexCheckChecked">
                                    5-2 سنوات
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="10-5 سنوات" id="year_three">
                                <label class="form-check-label" for="flexCheckChecked">
                                    10-5 سنوات
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="+10 سنوات" id="year_four">
                                <label class="form-check-label" for="flexCheckChecked">
                                    +10 سنوات
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <h5>المجال</h5>
                            <input type="text" placeholder="ابحث عن مجالك">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="تكنولوجيا المعلومات">
                            <label for="vehicle1"> تكنولوجيا المعلومات
                            </label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="برمجة و تطوير">
                            <label for="vehicle2"> برمجة و تطوير</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="هندسة و علوم">
                            <label for="vehicle3"> هندسة و علوم</label>
                            <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="تسويق و مبيعات">
                            <label for="vehicle4"> تسويق و مبيعات</label>
                            <br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="فن و تصميم ">
                            <label for="vehicle5"> فن و تصميم</label>
                            <br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="كتابة و ترجمة  ">
                            <label for="vehicle6"> كتابة و ترجمة</label>
                            <br>
                            <input type="checkbox" id="vehicle7" name="vehicle7" value="دعم فني ">
                            <label for="vehicle7"> دعم فني</label>
                            <br>
                            <input type="checkbox" id="vehicle8" name="vehicle8" value="محاسبة و مالية ">
                            <label for="vehicle8"> محاسبة و مالية</label>
                        </div>
                        <hr>
                        <div class="specialize">
                            <h5>الاختصاص</h5>
                            <input type="text" placeholder="ابحث عن اختصاصك">

                            <input type="checkbox" id="vehicle1" name="vehicle1" value="special1">
                            <label for="vehicle1">الاختصاص1</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="special2">
                            <label for="vehicle2"> الاختصاص2</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="special3">
                            <label for="vehicle3"> الاختصاص3</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="special4">
                            <label for="vehicle4">الاختصاص4</label><br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="special5">
                            <label for="vehicle5"> الاختصاص5</label><br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="special6">
                            <label for="vehicle6"> الاختصاص6</label>

                        </div>
                        <hr>
                        <div class="skills">
                            <h5>المهارات</h5>
                            <input type="text">
                        </div>
                        <hr>
                        <div class="system ">
                            <h5>نظام العمل</h5>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="1">
                            <label for="vehicle1"> دوام كامل
                            </label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="2">
                            <label for="vehicle2"> دوام جزئي</label><br>
                        </div>
                        <hr>
                        <div class="language">
                            <h5>اللغات</h5>
                            <input type="text" placeholder="ابحث عن اللغة">

                            <input type="checkbox" id="vehicle1" name="vehicle1" value="arabic">
                            <label for="vehicle1"> العربية</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="english">
                            <label for="vehicle2"> الإنجليزية</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="french">
                            <label for="vehicle3"> الفرنسية</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="spanich">
                            <label for="vehicle4"> الاسبانية</label><br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="turkey">
                            <label for="vehicle5"> التركية</label><br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="alman">
                            <label for="vehicle6">الالمانية</label>
                        </div>
                        <hr>
                    </form>


                </div>
                <div class="col-9 left d-flex mt-5 gap-2" id="all_jobs" style="">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card">
                        <div class="title">
                            <img src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>" alt="">

                            <h5>
                                <a href="<?php echo e(route('job.show', ['slug' => $job->slug])); ?>" style="text-decoration: none; color: #000">
                                    <?php echo e($job->job_title); ?>

                                </a>
                            </h5>

                            <i data-bs-toggle="modal" value="<?php echo e($job->id); ?>" data-id="<?php echo e($job->id); ?>" onclick="divId(this)" data-bs-target="#favModal-<?php echo e($job->id); ?>" class="fa-regular fa-heart" style="margin-right: 45px;"></i>

                            <!-- Modal -->
                            <div class="modal fade newListModal" id="favModal-<?php echo e($job->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            <h5 class="modal-title mb-2 text-center" id="exampleModalLabel">
                                                أضف هذا الاعلان الى مفضلتي
                                            </h5>

                                            <label for="listName" class="form-label">
                                                انقر على قائمة لإضافة
                                                الإعلان
                                            </label>
                                            <form action="<?php echo e(route('employer.existing.modalStore')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3 existing_list">
                                                    <?php $__currentLoopData = $existings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $existing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input type="hidden" class="new_job_id" name="new_job_id" value="<?php echo e($job->id); ?>">
                                                        <button type="submit" style="background-color: #E7EAF6; border-color: #898EA3; display:block; padding-right: 18px; width: 100%" name="existing_id" value="<?php echo e($existing->id); ?>" class="form-control">
                                                            <?php echo e($existing->existing_name); ?>

                                                        </button>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <button id="newList_btn" name="newList_btn" type="button" class="btnAdd btn-primary">
                                                    <span>+</span>
                                                    انشاء قائمة جديدة
                                                </button>
                                            </form>
                                            <form action="<?php echo e(route('employer.existing.newList')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3 div2" id="div2" style="margin-top: 10px; display: none">
                                                    <label class="mb-2">
                                                        ادخل اسم القائمة الجديدة
                                                    </label>
                                                    <input type="hidden" name="type" id="newlistType" value="job">
                                                    <input type="text" class="form-control" placeholder="اسم القائمة" id="newlistName" name="list_name" style="width: 75%; display: inline; background-color: #fff">
                                                    <button type="submit" class="btn btn-success newListSubmit" style="width: 15%; margin-top: -7px;height: 40px;background-color: #00B398;color: #fff;">
                                                        سجل
                                                    </button>
                                                </div>
                                            </form>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <p>
                            <?php echo e($job->description); ?>

                        </p>
                        <div class="group">
                            <?php
                                $array_one = array_slice( $job->skills, 0, 4 );
                                $full_array = $job->skills;
                                $remaining_array = array_diff($full_array, $array_one);
                            ?>

                            <?php $__currentLoopData = $array_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span title="<?php echo e($skill); ?>">
                                    <?php echo e(Str::limit($skill, 8)); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <span title="<?php echo e(implode(', ',  $remaining_array)); ?>">+ <?php echo e(count($remaining_array)); ?></span>
                        </div>
                        <hr />
                        <div class="foot d-flex">
                            <div>
                                <i class="fa-solid fa-clock"></i>
                                <span>
                                    <?php echo e($job->created_at->diffForHumans()); ?>

                                </span>
                            </div>
                            <div class="d-flex">
                                <h5>
                                   $ <?php echo e($job->salary); ?>

                                </h5> <span> / شهر</span>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div style="background-color: transparent; display: flex; justify-content: center; margin-right: 300px">
                <?php echo e($jobs->links()); ?>

            </div>
            <nav aria-label="Page navigation example" class="navigation-search" style="background-color: transparent">















            </nav>
            <br> <br>
        </div>

    </div>
    </div>

    <?php $__env->startSection('js'); ?>
        <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value + ".00$";


            slider.oninput = function () {
                output.innerHTML = this.value + ".00$";
            }
            slider.addEventListener("mousemove", function () {
                var x = slider.value;
                var color = 'red' + x + '%';
                slider.style.background = color;
            })


            function divId(element) {
                 job_id = $(element).attr('data-id');
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employer/job/index.blade.php ENDPATH**/ ?>
