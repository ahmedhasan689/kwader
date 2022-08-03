<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="<?php echo e(url('/' . $page='index')); ?>"><img src="<?php echo e(asset('Front_Assets/img/Group 404.png')); ?>" class="main-logo" alt="logo">
                </a>



			</div>
			<div class="main-sidemenu">

                
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="<?php echo e(asset('Dashboard_Assets/img/faces/6.jpg')); ?>"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">
                                <?php echo e(Auth::user()->first_name . ' ' . Auth::user()->last_name); ?>

                            </h4>
							<span class="mb-0 text-muted">
                                <?php echo e(Auth::user()->user_type); ?>

                            </span>
						</div>
					</div>
				</div>

				<ul class="side-menu">
					<li class="side-item side-item-category">Main</li>
					<li class="slide">
						<a class="side-menu__item" href="<?php echo e(route('admin.dashboard.index')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" >
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                                <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>
                            <span class="side-menu__label">الرئيسية</span>
                            <span class="badge badge-success side-badge">1</span>
                        </a>
					</li>








					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                            <span class="side-menu__label">
                                الكوادر
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
						<ul class="slide-menu">
							<li>
                                <a class="slide-item" href="<?php echo e(route('admin.employee.index')); ?>">
                                    قائمة الكوادر
                                </a>
                            </li>
							<li>
                                <a class="slide-item" href="<?php echo e(route('admin.employee.create')); ?>">
                                    إضافة كادر
                                </a>
                            </li>
						</ul>
					</li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                            <span class="side-menu__label">
                                أصحاب العمل
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.employer.index')); ?>">
                                    قائمة أصحاب العمل
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.employer.create')); ?>">
                                    إضافة صاحب عمل
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                            <span class="side-menu__label">
                                الوظائف
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.job.index', ['status' => 'Under-Review'])); ?>">
                                    قيد المراجعة
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.job.index', ['status' => 'Opened'])); ?>">
                                    المفتوحة
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.job.index', ['status' => 'In-Progress'])); ?>">
                                    قيد التنفيذ
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.job.index', ['status' => 'Canceled'])); ?>">
                                    الملغاة
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="<?php echo e(route('admin.job.create')); ?>">
                                    إضافة وظيفة
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
                            <i class="fa-solid fa-file-signature" style="margin-left: 15px;color: #AAA; font-size: 18px;"></i>
                            <span class="side-menu__label">
                                العقود
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a class="slide-item" href="#">
                                    قائمة العقود
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="#">
                                    إضافة عقد
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . $page='#')); ?>">
                            <i class="fa-solid fa-coins" style="margin-left: 15px;margin-right: 1px; color: #AAA; font-size: 18px;"></i>
                            <span class="side-menu__label">
                                المعاملات المالية
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a class="slide-item" href="#">
                                    قائمة المعاملات المالية
                                </a>
                            </li>
                            <li>
                                <a class="slide-item" href="#">
                                    إضافة معاملة مالية
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" href="<?php echo e(route('admin.contact_us.index')); ?>">
                            <i class="fa-solid fa-inbox" style="margin-left: 15px;margin-right: 1px; color: #AAA; font-size: 18px;"></i>
                            <span class="side-menu__label">
                                الشكاوي والإقتراحات
                            </span>
                        </a>
                    </li>





























































































































































				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
<?php /**PATH E:\kwader\resources\views/layouts/main-sidebar.blade.php ENDPATH**/ ?>