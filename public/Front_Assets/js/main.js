
/*$(document).ready(function(){
        $(".click").click(function(){
            $("#staticBackdropSign").modal('hide');

        });
});*/
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
                var user_type = data.auth.user_type;

                if ( user_type == 'Employer' ) {
                    window.location.href = "/employer/dashboard";
                }else if( user_type == 'Employee' ){
                    window.location.href = "/employee/dashboard";
                }else{
                    window.location.href = "/dashboard";
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
                    }else if(data.success){
                        alert('Ok');
                    }
                },
            });
        } else {
            alert('Password');
        }
    });
});

