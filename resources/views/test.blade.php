<select class="form-select" aria-label="Disabled select example" name="country">
    @foreach( $countries as $country)
        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
    @endforeach
</select>
<span name="test">

</span>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ asset('assets/js/plugins-jquery.js') }}"></script>

<script>
    $(document).ready(function() {
        $('select[name="country"]').on('change', function() {
            var country = $(this).val();

            if (country) {
                $.ajax({
                    url: "{{ URL::to('/flags') }}/" + country,
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
