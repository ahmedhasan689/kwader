<?php echo jquery(); ?>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<script src="https://kit.fontawesome.com/5427831588.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="<?php echo e(asset('Front_Assets/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('Front_Assets/js/chosen.jquery.min.js')); ?>"></script>

<script>
    const userId = "<?php echo e(auth()->id()); ?>"
</script>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<!--

<?php /**PATH E:\kwader\resources\views/components/footer-script.blade.php ENDPATH**/ ?>