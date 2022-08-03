<?php $__env->startSection('page_title', 'تأكيد البريد الإلكتروني'); ?>

<?php $__env->startSection('content'); ?>

<div style="width: 490px;
    display: flex;
    margin: auto;
    height: 500px;">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-card','data' => []]); ?>
<?php $component->withName('auth-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('logo', null, []); ?> 
            <a href="/">
                <img src="<?php echo e(asset('Front_Assets/img/Group 404.png')); ?>" style="width: 100px;
    height: 100px;
    display: flex;
    margin: auto;
    margin-top: 60px;">
            </a>
         <?php $__env->endSlot(); ?>

        <div class="mb-4 text-sm text-gray-600">
            <?php echo e(__('قمنا بإرسال رابط إلى البريد الخاص بك ، يرجى تفقد بريدك ، في حال لم يصلك بريد يرجى الضغط على "إرسال مرة اخرى"')); ?>

        </div>

        <?php if(session('status') == 'verification-link-sent'): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

            </div>
        <?php endif; ?>

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>

                <div style="display:flex; justify-content: end;">
                    <button style="background-color: #002c7f;padding: 10px 15px; border: none; border-radius: 10px; color: white;">
                        <?php echo e(__('إرسال مرة آخرى')); ?>

                    </button>
                </div>
            </form>

            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-top: -25px;">
                <?php echo csrf_field(); ?>

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900" style="border: none; background: transparent;color: #AAA;">
                    <?php echo e(__('تسجيل خروج')); ?>

                </button>
            </form>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kwader\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>