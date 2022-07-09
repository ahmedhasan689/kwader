<head dir="rtl">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('Front_Assets/img/favicon-16x16.png')); ?>">

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="<?php echo e(asset('Front_Assets/css/chosen.min.css')); ?>">

   <link rel="stylesheet" href="<?php echo e(asset('Front_Assets/css/bootstrap.rtl.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('Front_Assets/css/style.css')); ?>">
   <?php echo $__env->yieldContent('css'); ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>
        <?php echo $__env->yieldContent('page_title'); ?>
    </title>
    <?php echo toastr_css(); ?>
</head>
<?php /**PATH E:\kwader\resources\views/components/head.blade.php ENDPATH**/ ?>