
$(document).ready(function(){
        $(".accountType").click(function(){
            $("#staticBackdropOption").modal('hide');
        });
});

$(document).ready(function(){
        $(".loss").click(function(){
            $("#staticBackdropLogin").modal('hide');
        });
});
$(document).ready(function(){
    $(".fa-search").click(function(){
        $(".inp").toggle();
    });

});
$(".sign").on('show.bs.modal', function (e) {
    $("#staticBackdropSign").modal("hide");
});

$(document).ready(function() {
    $(".staff").click(function() {
        $(".bb").hide();
        $(".cc").show();
        $(this).css({ "background-color":"#00B398" , "color":"#fff"})
        $(".owner").css({ "background-color":"transparent" , "color":"gray"})

    });
});
$(document).ready(function() {
    $(".owner").click(function() {
        $(".cc").hide();
         $(".bb").show();
        $(this).css({ "background-color":"#002C7F" , "color":"#fff"})
        $(".staff").css({ "background-color":"transparent" , "color":"gray"})

    });
});

$(document).ready(function() {
    $('input[name="accept"]').change(function() {
        if($(this).prop("checked") == true) {
            $('#register').attr('disabled',function() {
                $(this).attr('disabled', false)
            })
        }else if($(this).prop("checked") == false) {
            $('#register').attr('disabled',function() {
                $(this).attr('disabled', true)
            })
        }

  });

})

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Login Request (Ajax)
$(document).ready(function() {
    $('#login_form').submit(function(e) {
        e.preventDefault();

        var email = $('#email').val();
        var password = $('#password').val();
        var user_type = $('#user_type').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/login',
            data: {
                email: email,
                password: password,
                user_type: user_type,
            },
            dataType: 'json',
            success: function(data) {
                var user_type = data.data.user_type;

                if ( user_type == 'Employer' ) {
                    window.location.href = "/employer/dashboard";
                }else if( user_type == 'Employee' ){
                    window.location.href = "/employee/dashboard";
                }else{
                    window.location.href = "/admin/dashboard";
                }
            },
            error: function (data) {
                $('#error_msg').append(`
                    <div class="alert alert-danger" role="alert">
                        Whoops! Something went wrong.
                    </div>
                `)
            }
        });

    })
})

$(document).ready(function() {
    $(".owner").click(function(e) {
        e.preventDefault();

        var type = $(".owner").val();

        $.ajax({
            type: 'GET',
            url: $('.accountType').attr('href'),
            data: {
                type: type,
            },
            success: function(data) {
                console.log(data.name);
                $(".owner").click(function(){
                    $("#staticBackdropOption").modal('hide');
                });
            },
            error: function(data){
                console.log(data)
            }

        })
    });

    $(".staff").click(function(e) {
        e.preventDefault();

        var user = $(".staff").val();


        $.ajax({
            type: 'GET',
            url: $('#employee').attr('href'),
            data: {
                type: user,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data.name);
                $("#employee").click(function(){
                    $("#staticBackdropOption").modal('hide');
                    $("#staticBackdropSign").modal('show');
                });
            },
            error: function(data){
                console.log(data)
            }

        })
    });
})



// Ajax Register Request
$(document).ready(function() {
    $('#register-form').submit(function(e) {
        e.preventDefault();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#register_email').val();
        var password = $('#register_password').val();
        var password_confirm = $('#confirm').val();
        var token = $('input[name="_token"]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (password === password_confirm) {
            $.ajax({
                url: $('#register-form').attr('action'),
                type: 'POST',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirm,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.errors){
                        $.each(data.errors, function(key, value){
                            $('#error_msg_register').show();
                            $('#error_msg_register').append('<p>'+value+'</p>');
                        });
                    }

                    if ( data.user.user_type == 'Employer' ) {
                        window.location.href = '/employer/dashboard'
                    }else if( data.user.user_type == 'Employee' ) {
                        window.location.href = '/employee/profile/specialization'
                    }else {
                        window.location.href = '/employer/dashboard'
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });
        } else {
            alert('Password');
        }
    });
});

// Choice Field & Specialization
$(document).ready(function() {


    $('input[name="field_name"]').change(function () {

        if( $(this).prop("checked") == true ) {
            var name = $(this).val();

            if(name) {


                $.ajax({
                    type: "get",
                    url: '/employee/profile/getSpecialization/' + name,
                    data: {
                        name: name
                    },
                    dataType: "json",
                    success: function(data){
                        $('.leftOp').append(`
                                <div class="dropdown" style="margin-top: 25px;">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        ` + name + `
                                    </a>

                                    <ul class="dropdown-menu ssb" aria-labelledby="dropdownMenuLink">

                                    </ul>
                                </div>
                            `);
                        for (var i = 0; i < data.type.length; i++){
                            $('.ssb').append(`
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="` + data.type[i].specialization_name + `" value="` + data.type[i].specialization_name + `" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            ` + data.type[i].specialization_name + `
                                        </label>
                                    </div>
                                </li>
                            `)
                        }
                    },
                    error: function(data){
                        console.log(data)
                    },
                });

            }

        }else if($(this).prop("checked") == false) {
            $('.leftOp').empty()
            $(this).prop("checked", false)
        }
    })

})

// Flags
$(document).ready(function() {
    $('select[name="country"]').on('change', function() {
        var country = $(this).val();

        console.log(country);
        if (country) {
            $.ajax({
                url: '/employee/profile/getFlag/' + country,
                type: "GET",
                dataType: "json",

                success: function(data) {
                    $('#flag').empty();
                    $.each(data, function(key, value) {
                        var url = value + '.png';
                        $('#flag').append(
                            '<img src="http://127.0.0.1:8000/flags/' + url + ' " alt="flags">',
                        )
                    });
                },
                error: function(data){
                    console.log(data)
                }
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});

$(document).ready(function () {
    $('input[name="job_field"]').change(function () {
        var job_field = $(this).val();

        $.ajax({
            url: '/employee/profile/getSpecialization/' + job_field,
            type: "Get",
            dataType: "json",
            success: function (data){
                $('.special').empty()
                for (var i = 0; i < data.type.length; i++){
                    $('.special').append(`
                        <div class="form-check">
                            <input class="form-check-input" style="margin-right: 4px" name="special[]" type="checkbox" value="` + data.type[i].specialization_name + `" id=" ` + data.type[i].id +  ` ">
                            <label class="form-check-label" for="flexCheckChecked">
                                ` + data.type[i].specialization_name + `
                            </label>
                        </div>
                    `)
                }
            },
            error: function (data){
                console.log(data)
            }

        })


    });
});

// Send Visual Identity To Hidden Input In The Form
$('#uploadImage').change(function() {
    $('#image').val( $(this).val() );
});

$(document).ready(function() {
   $('#skills').chosen();
});

$(document).ready(function() {
    $('#languages').chosen();
});


$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});




