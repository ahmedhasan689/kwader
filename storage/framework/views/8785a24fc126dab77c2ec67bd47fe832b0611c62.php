<?php $__env->startSection('page_title', 'محادثة'); ?>

<?php $__env->startSection('content'); ?>
    <div class="inboxMessage mt-5">
        <div class="container">
            <div class="row">
                <div class="col-3 right">
                    <div class="messages">
                        <h5>المحادثات</h5>
                        <div>

                        </div>
                    </div>
                    <ul>
                        <li class="d-flex">
                            <img src="<?php echo e($employee->image); ?>" alt="">
                            <div>
                                <p>
                                    <?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?>

                                </p>
                                <p>اعلان : <?php echo e($job->job_title); ?></p>
                            </div>
                            <span>18:37</span>
                        </li>

                    </ul>
                </div>
                <div class="col-9">
                    <div class="hhed d-flex">
                        <div class="col-lg-6 d-flex ">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img class="avtar" src="<?php echo e($employee->image); ?>" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0"><?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?></h6>

                            </div>
                        </div>
                        <div>
                            <button class="btn">
                                التبليغ عن محتوى
                            </button>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-8">
                            <div class="chat">
                                <div class="chat-header clearfix">

                                </div>
                                <div class="chat-history">
                                    <ul class="m-b-0">
                                        <li class="clearfix">
                                            <div class="message other-message float-right"> Hi Aiden, how are you? How
                                                is the
                                                project coming along? </div>
                                            <div class="message-data text-right">
                                                <span class="message-data-time">10:10 AM, Today</span>
                                                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"> -->
                                            </div>

                                        </li>
                                        <li class="clearfix">

                                            <div class="message my-message">Are we meeting today?</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:12 AM, Today</span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="message my-message">Project has been already finished and I have
                                                results
                                                to show you.</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>

                                        </li>
                                        <li class="clearfix">
                                            <div class="message my-message">Project has been already finished and I have
                                                results
                                                to show you.</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>

                                        </li>
                                        <li class="clearfix">
                                            <div class="message my-message">Project has been already finished and I have
                                                results
                                                to show you.</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>

                                        </li>
                                        <li class="clearfix">
                                            <div class="message my-message">Project has been already finished and I have
                                                results
                                                to show you.</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>

                                        </li>
                                        <li class="clearfix">
                                            <div class="message my-message">Project has been already finished and I have
                                                results
                                                to show you.</div>
                                            <div class="message-data">
                                                <span class="message-data-time">10:15 AM, Today</span>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                                <div class="chat-message clearfix">
                                    <div class="input-group mb-0">

                                        <input type="text" class="form-control" placeholder="أكتب رسالة هنا">
                                        <div class="input-group-prepend">
                                            <!-- <span class="input-group-text"><i class="fa fa-send"></i></span> -->
                                            <button class="btn">أرسل</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 left" style="margin-right:-10px;">
                            <div>
                                <button class="btn">
                                    التبليغ عن محتوى
                                </button>
                            </div>
                            <div class="d-flex">
                                <img src="<?php echo e($employee->image); ?>" alt="">
                                <div class="nn">
                                    <p><?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?></p>
                                    <p>اعلان: <?php echo e($job->job_title); ?></p>
                                </div>
                            </div>
                            <br>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    الأنشطة الحالية
                                </button>
                                <ul class="dropdown-menu last" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <p>فاطمة الزهراء قبلت الوظيفة على <span>مصمم جرافيك</span></p>
                                    </li>
                                    <li class="d-flex" style="flex-direction:column;">
                                        <p> تحرير عقد <?php echo e($employee->user->first_name . ' ' . $employee->user->last_name); ?> بمسمى وظيفي
                                            <span>
                                                <?php echo e($job->job_title); ?>

                                            </span>
                                        </p>

                                        <div class="d-flex">
                                            <a href="#" class="rights" style=" text-decoration: none; width: 50%;background-color: #00B398; color: #fff; height: 35px;border-radius: 5px;padding: -1px 29px; display: flex;justify-content: center;border-bottom: none;">
                                                تحرير عقد
                                            </a>
                                            <button class="lefts" style="width: 50%;">
                                                إلغاء
                                            </button>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="aoe">
                                <button class="btn">
                                    اقترح عقد العمل
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/Chat/create.blade.php ENDPATH**/ ?>