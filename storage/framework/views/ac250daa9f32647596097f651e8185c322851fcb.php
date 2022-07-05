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
                            <input type="range" min="100" max="10000" name="salary" class="slider" id="myRange">
                            <div class="d-flex " style="justify-content:space-between;">
                                <span>100.00$</span>
                                <span id="demo"></span>
                            </div>

                        </div>
                        <hr>
                        <div class="country">
                            <h5>الدولة</h5>
                            <input type="text" placeholder="غير محدد">
                        </div>
                        <hr>
                        <div class="years">
                            <h5>سنوات الخبرة</h5>
                            <input type="checkbox" id="years_one" name="years_one" value="0-2 سنوات">
                            <label for="vehicle1">
                                0-2سنوات
                            </label>
                            <br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="five">
                            <label for="vehicle2"> 2-5سنوات</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="ten">
                            <label for="vehicle3"> 5-10سنوات</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="over">
                            <label for="vehicle4"> +10سنوات</label>
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
                        <button type="submit" class="btn btn-success" id="result">
                            بحث
                        </button>
                    </form>


                </div>
                <div class="col-9 left d-flex mt-5 gap-2" id="all_jobs" style="">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                        <div class="title">
                            <img src="<?php echo e(asset('Front_Assets/img/ss.png')); ?>" alt="">

                            <h5>
                                <a href="<?php echo e(route('job.show', ['id' => $job->id])); ?>" style="text-decoration: none; color: #000"><?php echo e($job->job_title); ?></a>
                            </h5>

                            <i data-bs-toggle="modal" data-bs-target="#favModal" class="fa-regular fa-heart"></i>

                            <!-- Modal -->
                            <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            <h5 class="modal-title mb-2 text-center" id="exampleModalLabel">أضف هذا
                                                الاعلان الى
                                                مفضلتي
                                            </h5>

                                            <form>
                                                <div class="mb-3">
                                                    <label for="listName" class="form-label">انقر على قائمة لإضافة
                                                        الإعلان</label>
                                                    <input type="text" value="اسم القائمة" class="form-control"
                                                           id="listName" aria-describedby="listName" readonly>

                                                </div>
                                                <div class="mb-3">

                                                    <input type="text" value="اسم القائمة" class="form-control"
                                                           id="listName" aria-describedby="listName" readonly>

                                                </div>
                                                <div class="mb-3" id="ans">

                                                    <!-- <input type="text" value="اسم القائمة" class="form-control"
                                                                            id="listName" aria-describedby="listName" readonly> -->

                                                </div>

                                                <button type="button" class="btnAdd btn-primary"
                                                        onclick="hideButton(this)"><span>+</span>انشاء
                                                    قائمة
                                                    جديدة</button>
                                                <div class="mb-3" id="div2">


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

            <nav aria-label="Page navigation example" class="navigation-search">
                <?php echo e($jobs->links()); ?>
















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
                output.innerHTML = this.value + ".00$";;
            }
            slider.addEventListener("mousemove", function () {
                var x = slider.value;
                var color = 'red' + x + '%';
                slider.style.background = color;
            })
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/employer/job/index.blade.php ENDPATH**/ ?>