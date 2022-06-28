const search = document.querySelector('.search')
const link = document.querySelector('.srch-link')
const input = document.querySelector('.input')
link.addEventListener('click', () => {
    search.classList.toggle('active')
    input.focus()
})


/* Edit Content */
function editAboutMe() {
    document.getElementById("about_me").style.display="none";
    document.getElementById("edit_about_me").style.display="block";
}

function editPersonalInfo() {
    document.getElementById("personal_info").style.display="none";
    document.getElementById("edit_personal_info").style.display="block";
  }
function editSalaryInfo() {
document.getElementById("personal_info").style.display="none";
document.getElementById("edit_salary_info").style.display="block";
}
function editAvailability() {
document.getElementById("availability").style.display="none";
document.getElementById("edit_availability").style.display="block";
}

$(document).ready(function() {
  $('#personal_info_cancel').click(function(e) {
      e.preventDefault();
      document.getElementById("edit_personal_info").style.display="none";
      document.getElementById("personal_info").style.display="block";
  })
})
$(document).ready(function() {
    $('#edit_salary_cancel').click(function(e) {
        e.preventDefault();
        document.getElementById("edit_salary_info").style.display="none";
        document.getElementById("personal_info").style.display="block";
    })
})
$(document).ready(function() {
    $('#edit_availability_cancel').click(function(e) {
        e.preventDefault();
        document.getElementById("edit_availability").style.display="none";
        document.getElementById("availability").style.display="block";
    })
})
$(document).ready(function() {
    $('#bio_cancel').click(function(e) {
        e.preventDefault();
        document.getElementById("edit_about_me").style.display="none";
        document.getElementById("about_me").style.display="block";
    })
})
$(document).ready(function() {
    $('#about-me').click(function(e) {
        e.preventDefault();
        document.getElementById("edit_about_me").style.display="none";
        document.getElementById("about_me").style.display="block";
    })
})
$(document).ready(function() {
    $('#experModalButton').click(function(e) {
        e.preventDefault();
        document.getElementById("experModal").style.display="none";
    })
})


  /* Hover Dropdown */
document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth > 992) {
      document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {
        everyitem.addEventListener('mouseover', function (e) {
          let el_link = this.querySelector('a[data-bs-toggle]');
          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.add('show');
            nextEl.classList.add('show');
          }
        });
        everyitem.addEventListener('mouseleave', function (e) {
          let el_link = this.querySelector('a[data-bs-toggle]');

          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.remove('show');
            nextEl.classList.remove('show');
          }
        })
      });
    }
  });

$(document).ready(function(){
        $(".accountType").click(function(){
            $("#staticBackdropOption").modal('hide');
            $("#staticBackdropSign").modal('show');
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

$(document).ready(function() {
    $('#personal-tap').submit(function(e) {
        e.preventDefault();
        var first_name = $('#tap-first').val();
        var last_name = $('#tap-last').val();
        var day = $('#day').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var nationality = $('#nationality').val();
        var country = $('#country').val();
        var marital_status = $('#marital_status').val();


        var employee_id = $('#employee_id').val();

        var gender;
        if ($("#male-gender").is(":checked")) {
            gender = $('#male-gender').val();
        }else if ($("#female-gender").is(":checked")){
            gender = $('#female-gender').val();;
        }

        $.ajax({
            url: '/employee/dashboard/personal_tap/' + employee_id,
            type: 'PUT',
            data: {
                first_name: first_name,
                last_name: last_name,
                day: day,
                month: month,
                year: year,
                gender: gender,
                nationality: nationality,
                country: country,
                marital_status: marital_status,
            },
            dataType: 'json',
            success: function(data){
                if (data.errors){
                    $.each(data.errors, function(key, value){
                        $('.tap-personal-errors').empty();
                        $('.tap-personal-errors').append('<p class="alert alert-danger text-danger">' + value + '</p>');

                    });

                }else if (data.success){
                    location.reload(true);
                }

            },
            error: function(data){
                console.log(data.errors);
            },
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
                            $('#error_msg_register').append('<p class="text-danger">'+value+'</p>');
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
                    url: '/employee/profile/getSpecializationByName/' + name,
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

// By Id
$(document).ready(function() {


    $('input[name="job_field"]').change(function () {

        if( $(this).prop("checked") == true ) {
            var name = $(this).val();

            if(name) {

                $.ajax({
                    type: "get",
                    url: '/employee/profile/getSpecializationById/' + name,
                    data: {
                        name: name
                    },
                    dataType: "json",
                    success: function(data){

                            $('.special').empty();
                        for (var i = 0; i < data.type.length; i++){
                            $('.special').append(`
                                <li style="list-style: none">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" style="margin-right: -23px" name="special[]" value="` + data.type[i].specialization_name + `" id="flexCheckDefault">
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

$(document).ready(function() {
    $('#personal_special').chosen();
});

$(document).ready(function() {
    $('#job_skills').chosen();
});

$(document).ready(function() {
    $('#still').change(function () {
        if ($(this).is(":checked")) {
            $('#end_date_month').prop('disabled', true);
            $('#end_date_year').prop('disabled', true);
        }else{
            $('#end_date_month').prop('disabled', false);
            $('#end_date_year').prop('disabled', false);
        }
    })
});


$(document).ready(function() {
    var salary = document.getElementById('myRange');
    var output = document.getElementById('demo');

    output.innerHTML = salary.value;

    let options = {};

    $('#years_one').change(function() {
        if( $(this).prop("checked") == true ) {
            var years = $(this).val();
        }
        if (Object.keys(options).length = 2) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '/employer/search',
                dataType: 'json',
                data: {
                    years: years,
                },
                success: function(data) {
                    $('#all_jobs').empty();
                    $('#all_jobs').append(`
                        <div class="card">
                            <div class="title">
                                <img src="Front_Assets/img/ss.png" alt="">
                                <h5>
                                    `+ data.result.job_title +`
                                </h5>

                                <i data-bs-toggle="modal" data-bs-target="#favModal" class="fa-regular fa-heart"></i>

                                <!-- Modal -->
                                <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                <h5 class="modal-title mb-2 text-center" id="exampleModalLabel">أضف هذا
                                                    الاعلان الى
                                                    مفضلتي
                                                </h5>


                                                    <div class="mb-3">
                                                        <label for="listName" class="form-label">انقر على قائمة لإضافة
                                                            الإعلان</label>
                                                        <input type="text" value="اسم القائمة" class="form-control"
                                                               id="listName" aria-describedby="listName" readonly>

                                                    </div>
                                                    <div class="mb-3">

                                                        <input type="text" value="اسم القائمة" class="form-control"
                                                               id="listName" aria-describedby="listName" readonly>

                                                    </div>
                                                    <div class="mb-3" id="ans">

                                                        <!-- <input type="text" value="اسم القائمة" class="form-control"
                                                                                id="listName" aria-describedby="listName" readonly> -->

                                                    </div>

                                                    <button type="button" class="btnAdd btn-primary"
                                                            onclick="hideButton(this)"><span>+</span>انشاء
                                                        قائمة
                                                        جديدة</button>
                                                    <div class="mb-3" id="div2">


                                                    </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>
                                {{ $job->description }}
                            </p>
                            <div class="group">
                                @php
                                    $array_one = array_slice( $job->skills, 0, 4 );
                                    $full_array = $job->skills;
                                    $remaining_array = array_diff($full_array, $array_one);
                                @endphp

                                @foreach($array_one as $skill)
                                    <span title="{{ $skill }}">
                                        {{ Str::limit($skill, 8) }}
                                    </span>
                                @endforeach
                                <span title="{{ implode(', ',  $remaining_array) }}">+ {{ count($remaining_array) }}</span>
                            </div>
                            <hr />
                            <div class="foot d-flex">
                                <div>
                                    <i class="fa-solid fa-clock"></i>
                                    <span>
                                        {{ $job->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="d-flex">
                                    <h5>
                                       $ {{ $job->salary }}
                                    </h5> <span> / شهر</span>
                                </div>
                            </div>
                        </div>

                    `);
                },
                error: function(data) {
                    console.log(data)
                }

            })
        };
    });

    salary.oninput = function() {
        $('.gro').empty();
        output.innerHTML = this.value;
        options['salary'] = output.innerHTML;
        $('.gro').append(`
            <span>الحد الأدنى ` +  options['salary'] + ` <i class="fa-solid fa-circle-xmark"></i></span>
        `);

        if (Object.keys(options).length = 2) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '/employer/search',
                dataType: 'json',
                data: {
                    data: output.innerHTML,
                },
                success: function(data) {
                    $('#all_jobs').empty();
                    $('#all_jobs').append(`
                        <div class="card">
                            <div class="title">
                                <img src="Front_Assets/img/ss.png" alt="">
                                <h5>
                                    `+ data.result.job_title +`
                                </h5>

                                <i data-bs-toggle="modal" data-bs-target="#favModal" class="fa-regular fa-heart"></i>

                                <!-- Modal -->
                                <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                <h5 class="modal-title mb-2 text-center" id="exampleModalLabel">أضف هذا
                                                    الاعلان الى
                                                    مفضلتي
                                                </h5>


                                                    <div class="mb-3">
                                                        <label for="listName" class="form-label">انقر على قائمة لإضافة
                                                            الإعلان</label>
                                                        <input type="text" value="اسم القائمة" class="form-control"
                                                               id="listName" aria-describedby="listName" readonly>

                                                    </div>
                                                    <div class="mb-3">

                                                        <input type="text" value="اسم القائمة" class="form-control"
                                                               id="listName" aria-describedby="listName" readonly>

                                                    </div>
                                                    <div class="mb-3" id="ans">

                                                        <!-- <input type="text" value="اسم القائمة" class="form-control"
                                                                                id="listName" aria-describedby="listName" readonly> -->

                                                    </div>

                                                    <button type="button" class="btnAdd btn-primary"
                                                            onclick="hideButton(this)"><span>+</span>انشاء
                                                        قائمة
                                                        جديدة</button>
                                                    <div class="mb-3" id="div2">


                                                    </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>
                                {{ $job->description }}
                            </p>
                            <div class="group">
                                @php
                                    $array_one = array_slice( $job->skills, 0, 4 );
                                    $full_array = $job->skills;
                                    $remaining_array = array_diff($full_array, $array_one);
                                @endphp

                                @foreach($array_one as $skill)
                                    <span title="{{ $skill }}">
                                        {{ Str::limit($skill, 8) }}
                                    </span>
                                @endforeach
                                <span title="{{ implode(', ',  $remaining_array) }}">+ {{ count($remaining_array) }}</span>
                            </div>
                            <hr />
                            <div class="foot d-flex">
                                <div>
                                    <i class="fa-solid fa-clock"></i>
                                    <span>
                                        {{ $job->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="d-flex">
                                    <h5>
                                       $ {{ $job->salary }}
                                    </h5> <span> / شهر</span>
                                </div>
                            </div>
                        </div>

                    `);
                },
                error: function(data) {
                    console.log(data)
                }

            })
        };

    }

    $('input[name="years_one"]').change(function () {
        if ($(this).attr('checked') === true) {
            console.log('Ok');
        }
    })


    //     $('#result').on('click', function(e) {
    //         e.preventDefault();
    //     // $.ajax({
    //     //     type: 'POST',
    //     //     url: '/employer/search/'+output.innerHTML,
    //     //     data: {
    //     //         salary: output.innerHTML,
    //     //     },
    //     //     dataType: 'json',
    //     //     success: function(data) {
    //     //         console.log(data.result.job_title)
    //     //         // $('#all_jobs').empty();
    //     //         // $('#all_jobs').append(`
    //     //         //     <div class="card">
    //     //         //         <div class="title">
    //     //         //             <img src="Front_Assets/img/ss.png" alt="">
    //     //         //             <h5>
    //     //         //                 `+ data.result.job_title +`
    //     //         //             </h5>
    //     //         //
    //     //         //             <i data-bs-toggle="modal" data-bs-target="#favModal" class="fa-regular fa-heart"></i>
    //     //         //
    //     //         //             <!-- Modal -->
    //     //         //             <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    //     //         //                  aria-hidden="true">
    //     //         //                 <div class="modal-dialog">
    //     //         //                     <div class="modal-content">
    //     //         //
    //     //         //                         <div class="modal-body">
    //     //         //                             <button type="button" class="btn-close" data-bs-dismiss="modal"
    //     //         //                                     aria-label="Close"></button>
    //     //         //                             <h5 class="modal-title mb-2 text-center" id="exampleModalLabel">أضف هذا
    //     //         //                                 الاعلان الى
    //     //         //                                 مفضلتي
    //     //         //                             </h5>
    //     //         //
    //     //         //
    //     //         //                                 <div class="mb-3">
    //     //         //                                     <label for="listName" class="form-label">انقر على قائمة لإضافة
    //     //         //                                         الإعلان</label>
    //     //         //                                     <input type="text" value="اسم القائمة" class="form-control"
    //     //         //                                            id="listName" aria-describedby="listName" readonly>
    //     //         //
    //     //         //                                 </div>
    //     //         //                                 <div class="mb-3">
    //     //         //
    //     //         //                                     <input type="text" value="اسم القائمة" class="form-control"
    //     //         //                                            id="listName" aria-describedby="listName" readonly>
    //     //         //
    //     //         //                                 </div>
    //     //         //                                 <div class="mb-3" id="ans">
    //     //         //
    //     //         //                                     <!-- <input type="text" value="اسم القائمة" class="form-control"
    //     //         //                                                             id="listName" aria-describedby="listName" readonly> -->
    //     //         //
    //     //         //                                 </div>
    //     //         //
    //     //         //                                 <button type="button" class="btnAdd btn-primary"
    //     //         //                                         onclick="hideButton(this)"><span>+</span>انشاء
    //     //         //                                     قائمة
    //     //         //                                     جديدة</button>
    //     //         //                                 <div class="mb-3" id="div2">
    //     //         //
    //     //         //
    //     //         //                                 </div>
    //     //         //
    //     //         //
    //     //         //                         </div>
    //     //         //
    //     //         //
    //     //         //
    //     //         //                     </div>
    //     //         //                 </div>
    //     //         //             </div>
    //     //         //         </div>
    //     //         //
    //     //         //         <p>
    //     //         //             {{ $job->description }}
    //     //         //         </p>
    //     //         //         <div class="group">
    //     //         //             @php
    //     //         //                 $array_one = array_slice( $job->skills, 0, 4 );
    //     //         //                 $full_array = $job->skills;
    //     //         //                 $remaining_array = array_diff($full_array, $array_one);
    //     //         //             @endphp
    //     //         //
    //     //         //             @foreach($array_one as $skill)
    //     //         //                 <span title="{{ $skill }}">
    //     //         //                     {{ Str::limit($skill, 8) }}
    //     //         //                 </span>
    //     //         //             @endforeach
    //     //         //             <span title="{{ implode(', ',  $remaining_array) }}">+ {{ count($remaining_array) }}</span>
    //     //         //         </div>
    //     //         //         <hr />
    //     //         //         <div class="foot d-flex">
    //     //         //             <div>
    //     //         //                 <i class="fa-solid fa-clock"></i>
    //     //         //                 <span>
    //     //         //                     {{ $job->created_at->diffForHumans() }}
    //     //         //                 </span>
    //     //         //             </div>
    //     //         //             <div class="d-flex">
    //     //         //                 <h5>
    //     //         //                    $ {{ $job->salary }}
    //     //         //                 </h5> <span> / شهر</span>
    //     //         //             </div>
    //     //         //         </div>
    //     //         //     </div>
    //     //         //
    //     //         // `);
    //     //     },
    //     //     error: function (data) {
    //     //         console.log(data)
    //     //     }
    //     //
    //     // })
    // })


});


$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});





