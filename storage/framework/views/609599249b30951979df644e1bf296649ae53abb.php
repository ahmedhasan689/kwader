
<div class="dropdown nav-item main-header-notification">
    <a class="new nav-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        <?php if( $unread > 0): ?>
            <span class=" pulse"></span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu">
        <div class="menu-header-content bg-primary text-right">
            <div class="d-flex">
                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
                <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
            </div>
            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have <?php echo e($unread); ?> unread Notifications</p>
        </div>

        <div class="main-notification-list Notification-scroll">
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="d-flex p-3 border-bottom" href="<?php echo e($notification->data['url']); ?>">
                    <div class="notifyimg">
                        <img src="<?php echo e($notification->data['icon']); ?>" width="40" height="40">
                    </div>
                    <div class="mr-3">
                        <h5 class="notification-label mb-1"><?php echo e($notification->data['title']); ?></h5>
                        <div class="notification-subtext">
                            <?php echo e($notification->data['body']); ?>

                        </div>
                        <div class="notification-subtext">
                            <?php echo e($notification->created_at->diffForHumans()); ?>

                        </div>
                    </div>
                    <div class="mr-auto" >
                        <i class="las la-angle-left text-left text-muted"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="dropdown-footer">
            <a href="">VIEW ALL</a>
        </div>
    </div>
</div>
<?php /**PATH E:\kwader\resources\views/components/notification-component.blade.php ENDPATH**/ ?>