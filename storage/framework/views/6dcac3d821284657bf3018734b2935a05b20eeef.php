<select class="form-select" aria-label="Disabled select example" name="country">
    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span name="test">

</span>

<script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
<!-- plugins-jquery -->
<script src="<?php echo e(asset('assets/js/plugins-jquery.js')); ?>"></script>

<script>
    $(document).ready(function() {
        $('select[name="country"]').on('change', function() {
            var country = $(this).val();

            if (country) {
                $.ajax({
                    url: "<?php echo e(URL::to('/flags')); ?>/" + country,
                    type: "GET",
                    dataType: "json",

                    success: function(data) {
                        $('span[name="test"]').empty();
                        $.each(data, function(key, value) {
                            var url = value + '.png';
                            $('span[name="test"]').append(
                                '<img src="flags/'+ url +'" alt="flags">',
                            )
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<?php /**PATH E:\kwader\resources\views/test.blade.php ENDPATH**/ ?>