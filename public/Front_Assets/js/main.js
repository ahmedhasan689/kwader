
const search = document.querySelector('.search')
const link = document.querySelector('.srch-link')
const input = document.querySelector('.input')
link.addEventListener('click', () => {
    search.classList.toggle('active')
    input.focus()
});

// add new list name
// function hideButton(x) {
//     x.style.display = 'none';
//     var div1 = document.getElementById("div2");
//     var divParent = document.createElement("div");
//     var newNode = document.createElement('input');
//     var title = document.createElement('span');
//     var buttonList = document.createElement('button');
//     buttonList.id = ("buttonList")
//     buttonList.textContent = "سجل"
//     title.appendChild(document.createTextNode(' ادخل اسم القائمة الجديدة '));
//     div1.appendChild(title);
//     div1.appendChild(divParent);
//
//     divParent.className = ("d-flex" , "divParent")
//     divParent.appendChild(newNode);
//     divParent.appendChild(buttonList);
//
//     // div1.innerHTML =( " < input type = 'text' placeholder = 'اسم القائمة' class='form-control'  id = 'listName' > ");
//     function buttonList() {
//         var name = newNode.value;
//         document.getElementById('ans').innerHTML = name;
//         div1.style.display = "none";
//     }
// }
$(document).ready(function() {
    $('.btnAdd').click(function() {
        $(this).css("display", "none");
        $('.div2').css("display", "block");
    });
});

$(document).ready(function () {
    $('button[type="button"]').click(function () {
        var name = $('.job-selected').val();
        console.log(name);
    })
});
// contract
$(document).ready(function () {
    $(".two").click(function () {
        $(".tableOne").hide();
        $(".tableTwo").show();
        $(this).css({"background-color": "#002C7F", "color": "#fff"})
        $(".two a").css({"color": "#fff"})

        $(".one").css({"background-color": "transparent", "color": "gray"})
        $(".one a").css({"color": "gray"})


    });
});

$(document).ready(function () {
    $(".one").click(function () {
        $(".tableTwo").hide();
        $(".tableOne").show();
        $(this).css({"background-color": "#002C7F", "color": "#fff"})
        $(".one a").css({"color": "#fff"})

        $(".two").css({"background-color": "transparent", "color": "gray"})
        $(".two a").css({"color": "gray"})


    });
});
$(document).ready(function () {
    $(".loginToOption").click(function () {
        $("#staticBackdropLogin").modal('hide');
        $("#staticBackdropOption").modal('show');
    });
});
$(document).ready(function () {
    $(".signToLogin").click(function () {
        $("#staticBackdropSign").modal('hide');
        $("#staticBackdropLogin").modal('show');
    });
});

var changePicSettings = function (event) {
    document.getElementById("pic_settings").style.visibility = "visible";
    document.getElementById("cam").style.display = "none";
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};

var changePic = function (event) {
    edit_pic
    document.getElementById("submit_pic").style.display = "block";
    document.getElementById("edit_pic").style.display = "none";
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};

/* Edit Content */
function editAboutMe() {
    document.getElementById("about_me").style.display = "none";
    document.getElementById("edit_about_me").style.display = "block";
}

function editPersonalInfo() {
    document.getElementById("personal_info").style.display = "none";
    document.getElementById("edit_personal_info").style.display = "block";
}

function editSalaryInfo() {
    document.getElementById("personal_info").style.display = "none";
    document.getElementById("edit_salary_info").style.display = "block";
}

function editAvailability() {
    document.getElementById("availability").style.display = "none";
    document.getElementById("edit_availability").style.display = "block";
}

$(document).ready(function () {
    $('#personal_info_cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("languagesModal").style.display = "none";
    })
});
$(document).ready(function () {
    $('#cancel_langs').click(function (e) {
        e.preventDefault();
        document.getElementById("educationModal").style.display = "none";
    })
});

$(document).ready(function () {
    $('#edu-cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("edit_personal_info").style.display = "none";
        document.getElementById("personal_info").style.display = "block";
    })
});


$(document).ready(function () {
    $('#edit_salary_cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("edit_salary_info").style.display = "none";
        document.getElementById("personal_info").style.display = "block";
    })
})
$(document).ready(function () {
    $('#edit_availability_cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("edit_availability").style.display = "none";
        document.getElementById("availability").style.display = "block";
    })
})
$(document).ready(function () {
    $('#bio_cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("edit_about_me").style.display = "none";
        document.getElementById("about_me").style.display = "block";
    })
})
$(document).ready(function () {
    $('#about-me').click(function (e) {
        e.preventDefault();
        document.getElementById("edit_about_me").style.display = "none";
        document.getElementById("about_me").style.display = "block";
    })
})
$(document).ready(function () {
    $('#experModalButton').click(function (e) {
        e.preventDefault();
        document.getElementById("experModal").style.display = "none";
    })
})
$(document).ready(function () {
    $('#certification_cancel').click(function (e) {
        e.preventDefault();
        document.getElementById("certificateModal").style.display = "none";
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

$(document).ready(function () {
    $(".accountType").click(function () {
        $("#staticBackdropOption").modal('hide');
        $("#staticBackdropSign").modal('show');
    });
});

$(document).ready(function () {
    $(".loss").click(function () {
        $("#staticBackdropLogin").modal('hide');
    });
});
$(document).ready(function () {
    $(".fa-search").click(function () {
        $(".inp").toggle();
    });

});
$(".sign").on('show.bs.modal', function (e) {
    $("#staticBackdropSign").modal("hide");
});

$(document).ready(function () {
    $(".staff").click(function () {
        $(".bb").hide();
        $(".cc").show();
        $(this).css({"background-color": "#00B398", "color": "#fff"})
        $(".owner").css({"background-color": "transparent", "color": "gray"})

    });
});
$(document).ready(function () {
    $(".owner").click(function () {
        $(".cc").hide();
        $(".bb").show();
        $(this).css({"background-color": "#002C7F", "color": "#fff"})
        $(".staff").css({"background-color": "transparent", "color": "gray"})

    });
});

$(document).ready(function () {
    $('input[name="accept"]').change(function () {
        if ($(this).prop("checked") == true) {
            $('#register').attr('disabled', function () {
                $(this).attr('disabled', false)
            })
        } else if ($(this).prop("checked") == false) {
            $('#register').attr('disabled', function () {
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
$(document).ready(function () {
    $('#login_form').submit(function (e) {
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
            success: function (data) {
                var user_type = data.data.user_type;

                if (user_type == 'Employer') {
                    window.location.href = "/employer/dashboard";
                } else if (user_type == 'Employee') {
                    window.location.href = "/employee/dashboard";
                } else {
                    window.location.href = "/admin/dashboard";
                }
            },
            error: function (data) {
                $('#error_msg').append(`
                    <div class="alert alert-danger" role="alert">
                        هناك خطأ بالمعلومات حاول مرة أخرى
                    </div>
                `)
            }
        });

    })
})


$(document).ready(function () {
    $(".owner").click(function (e) {
        e.preventDefault();

        var type = $(".owner").val();

        $.ajax({
            type: 'GET',
            url: $('.accountType').attr('href'),
            data: {
                type: type,
            },
            success: function (data) {
                console.log(data.name);
                $(".owner").click(function () {
                    $("#staticBackdropOption").modal('hide');
                });
            },
            error: function (data) {
                console.log(data)
            }

        })
    });

    $(".staff").click(function (e) {
        e.preventDefault();

        var user = $(".staff").val();


        $.ajax({
            type: 'GET',
            url: $('#employee').attr('href'),
            data: {
                type: user,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data.name);
                $("#employee").click(function () {
                    $("#staticBackdropOption").modal('hide');
                    $("#staticBackdropSign").modal('show');
                });
            },
            error: function (data) {
                console.log(data)
            }

        })
    });
})


// Ajax Register Request
$(document).ready(function () {
    $('#register-form').submit(function (e) {
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
                success: function (data) {
                    // console.log(data.user);
                    if (data.errors) {
                        $.each(data.errors, function (key, value) {
                            $('#error_msg_register').show();
                            $('#error_msg_register').append('<p>' + value + '</p>');
                        });
                    }

                    if (data.user.user_type == 'Employer') {
                        window.location.href = '/employer/dashboard'
                    } else if (data.user.user_type == 'Employee') {
                        window.location.href = '/employee/profile/specialization'
                    } else {
                        window.location.href = '/employer/dashboard'
                    }

                },
                error: function (data) {
                    console.log(data);
                }
            });
        } else {
            alert('Password');
        }
    });
});

// Set Personal Info For Employee
$(document).ready(function () {
    $('#personal-tap').submit(function (e) {
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
        } else if ($("#female-gender").is(":checked")) {
            gender = $('#female-gender').val();
            ;
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
            success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        $('.tap-personal-errors').empty();
                        $('.tap-personal-errors').append('<p class="alert alert-danger text-danger">' + value + '</p>');

                    });

                } else if (data.success) {
                    location.reload(true);
                }

            },
            error: function (data) {
                console.log(data.errors);
            },
        })

    });
})

// Set Total Salary
$(document).ready(function () {
    $("#duration").change(function () {
        var duration = $(this).children("option:selected").val();
        var salary = $('#salaryJob').val();

        $.ajax({
            url: '/contract/totalSalary',
            type: 'post',
            data: {
                duration: duration,
                salary: salary,
            },
            dataType: 'json',
            success: function (data) {
                document.getElementById("totalBudget").value = data.total;
            },
            error: function (data) {
                console.log(data)
            }
        })

    });
});

// Choice Field & Specialization
$(document).ready(function () {


    $('input[name="field_name"]').change(function () {

        if ($(this).prop("checked") == true) {
            var name = $(this).val();

            if (name) {


                $.ajax({
                    type: "get",
                    url: '/employee/profile/getSpecializationByName/' + name,
                    data: {
                        name: name
                    },
                    dataType: "json",
                    success: function (data) {
                        $('.leftOp').empty();
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
                        for (var i = 0; i < data.type.length; i++) {
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
                    error: function (data) {
                        console.log(data)
                    },
                });

            }

        } else if ($(this).prop("checked") == false) {
            $('.leftOp').empty()
            $(this).prop("checked", false)
        }
    })

})

// By Id
$(document).ready(function () {

    $('input[name="job_field"]').change(function () {

        if ($(this).prop("checked") == true) {
            var name = $(this).val();

            if (name) {

                $.ajax({
                    type: "get",
                    url: '/employee/profile/getSpecializationById/' + name,
                    data: {
                        name: name
                    },
                    dataType: "json",
                    success: function (data) {

                        $('.special').empty();
                        for (var i = 0; i < data.type.length; i++) {
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
                    error: function (data) {
                        console.log(data)
                    },
                });

            }

        } else if ($(this).prop("checked") == false) {
            $('.leftOp').empty()
            $(this).prop("checked", false)
        }
    })

})

// Flags
$(document).ready(function () {
    $('select[name="country"]').on('change', function () {
        var country = $(this).val();

        console.log(country);
        if (country) {
            $.ajax({
                url: '/employee/profile/getFlag/' + country,
                type: "GET",
                dataType: "json",

                success: function (data) {
                    $('#flag').empty();
                    $.each(data, function (key, value) {
                        var url = value + '.png';
                        $('#flag').append(
                            '<img src="http://127.0.0.1:8000/flags/' + url + ' " alt="flags" style="width: 20px; margin: 10px">',
                        )
                    });
                },
                error: function (data) {
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

            success: function (data) {
                $('.special').empty()
                for (var i = 0; i < data.type.length; i++) {
                    $('.special').append(`
                        <div class="form-check">
                            <input class="form-check-input" style="margin-right: 4px" name="special[]" type="checkbox" value="` + data.type[i].specialization_name + `" id=" ` + data.type[i].id + ` ">
                            <label class="form-check-label" for="flexCheckChecked">
                                ` + data.type[i].specialization_name + `
                            </label>
                        </div>
                    `)
                }
            },
            error: function (data) {
                console.log(data)
            }

        })


    });
});

// Send Visual Identity To Hidden Input In The Form
$('#uploadImage').change(function () {
    $('#image').val($(this).val());
});

// Employee Experience Modal
$(document).ready(function () {
    $('#experience').submit(function (e) {
        e.preventDefault();
        var job_title = $('#experience-Job-title').val();
        var special = $('#personal_special').val();
        var company_name = $('#experience-company').val();
        var country_id = $('#experience-country').val();
        var start_month = $('#start-month').val();
        var start_year = $('#start-year').val();
        var description = $('#description').val();
        var end_month = null;
        var end_year = null;

        $('#still').change(function () {
            if ($(this).is(":checked")) {
                $('#end_date_month').prop('disabled', true);
                $('#end_date_year').prop('disabled', true);
            } else {
                $('#end_date_month').prop('disabled', false);
                $('#end_date_year').prop('disabled', false);
                end_month = $('#end_date_month').val();
                end_year = $('#end_date_year').val();
            }
        })

        $.ajax({
            url: '/employee/dashboard/practicalExperience',
            type: 'POST',
            data: {
                job_title: job_title,
                country_id: country_id,
                company_name: company_name,
                special: special,
                start_month: start_month,
                start_year: start_year,
                end_month: end_month,
                end_year: end_year,
                description: description,
            },
            dataType: 'json',
            success: function (data) {
                if (data.errors) {
                    $('.experience-error').append(`
                        <p class="alert alert-danger">
                            يرجى التأكد من تعبئة جميع الخانات
                        </p>
                    `)
                } else if (data.success) {
                    location.reload(true);
                }
            },
            error: function (data) {

            },
        })
    })
})

// Employee Specialization Modal
$(document).ready(function () {
    $('#employee_field').submit(function (e) {
        e.preventDefault();
        var specializations = $('#employee_specialization').val();
        var skills = $('#employee_skills').val();
        var description = $('#field_description').val();

        $.ajax({
            url: '/employee/dashboard/setSkills',
            type: 'post',
            data: {
                specializations: specializations,
                skills: skills,
                description: description
            },
            dataType: 'json',
            success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        $('.skill-error').append('<p class="alert alert-danger">' + value + '</p>')
                    });
                } else if (data.success) {
                    location.reload(true);
                }
            },
            error: function (data) {
                console.log(data);
            },

        })
    })
});

$('#edu_still').change(function () {
    if ($(this).prop('checked') == true) {
        $('#edu_end_month').prop('disabled', true);
        $('#edu_end_year').prop('disabled', true);
    } else {
        $('#edu_end_month').prop('disabled', false);
        $('#edu_end_year').prop('disabled', false);
    }
})
// $(document).ready(function() {
//     $('#edu_still').change(function() {
//         if ($(this).prop('checked') == true) {
//             $('#edu_end_month').prop('disabled', true);
//             $('#edu_end_year').prop('disabled', true);
//         }else{
//             $('#edu_end_month').prop('disabled', false);
//             $('#edu_end_year').prop('disabled', false);
//         }
//     })
//     $('#education').submit(function(e) {
//         e.preventDefault();
//         var enterprise_name = $('#edu-name').val();
//         var diploma_name = $('#diploma').val();
//         var start_month = $('#edu_start_month').val();
//         var start_year = $('#edu_start_year').val();
//         var specialization = $('#edu_special').val();
//         var description = $('#edu-description').val();
//         var certification_url = $('#edu-url').val();
//         var certification_file = $('#cert-file')[0].files;
//         var end_month = $('#edu_end_month').val();
//         if (end_month == 'الشهر') {
//             end_month = null;
//         }
//         var end_year= $('#edu_end_year').val();
//         if (end_year == 'السنة') {
//             end_year = null;
//         }
//
//         $.ajax({
//             url: '/employee/dashboard/education',
//             type: 'post',
//             data: {
//                 enterprise_name: enterprise_name,
//                 diploma_name: diploma_name,
//                 start_month: start_month,
//                 start_year: start_year,
//                 end_month: end_month,
//                 end_year: end_year,
//                 specialization: specialization,
//                 description: description,
//                 certification_url: certification_url,
//                 certification_file: certification_file,
//             },
//             dataType: 'json',
//             success: function(data) {
//                 console.log(data)
//                 // if(data.errors) {
//                 //     $.each(data.errors, function(key, value){
//                 //         $('.edu-error').append('<p class="alert alert-danger">' + value + '</p>')
//                 //     });
//                 //     // $('.edu-error').append('<p class="alert alert-danger">يرجى التأكد من البيانات</p>')
//                 // }else if(data.success){
//                 //     location.reload(true);
//                 // }
//             },
//             error: function(data) {
//                 console.log(data)
//             }
//         })
//
//     });
// })

$(document).ready(function () {
    $('#update_job').click(function (e) {
        e.preventDefault();
        var job = $('#job_object').val();

        $.ajax({
            url: '/employer/job/' + job,
            type: 'put',
            data: {
                id: job,
            },
            dataType: 'json',
            success: function (data) {
                $('#send_id_to_job').modal('show');
                setTimeout(function () {// wait for 5 secs(2)
                    location.reload(true); // then reload the page.(3)
                }, 3000);
            },
            error: function (data) {
                console.log(data)
            },
        })
    });
})

$(document).ready(function () {
    $('#skills').chosen();
});

$(document).ready(function () {
    $('#languages').chosen();
});
$(document).ready(function () {
    $('#cert_special').chosen();
});
$(document).ready(function () {
    $('#employee_skills').chosen();
});
$(document).ready(function () {
    $('#personal_special').chosen();
});

$(document).ready(function () {
    $('#job_skills').chosen();
});
$(document).ready(function () {
    $('#edu_special').chosen();
});

$(document).ready(function () {
    $('#still').change(function () {
        if ($(this).is(":checked")) {
            $('#end_date_month').prop('disabled', true);
            $('#end_date_year').prop('disabled', true);
        } else {
            $('#end_date_month').prop('disabled', false);
            $('#end_date_year').prop('disabled', false);
        }
    })
});

$(document).ready(function () {
    $('#cert_not_end').change(function () {
        if ($(this).is(":checked")) {
            $('#cert_end_month').prop('disabled', true);
            $('#cert_end_year').prop('disabled', true);
        } else {
            $('#cert_end_month').prop('disabled', false);
            $('#cert_end_year').prop('disabled', false);
        }
    })
});


$(document).ready(function () {
    var salary = document.getElementById('myRange');
    var output = document.getElementById('demo');

    output.innerHTML = salary.value;

    let options = {};

    $('#years_one').change(function () {
        if ($(this).prop("checked") == true) {
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
                success: function (data) {
                    $('#all_jobs').empty();
                    $('#all_jobs').append(`
                        <div class="card">
                            <div class="title">
                                <img src="Front_Assets/img/ss.png" alt="">
                                <h5>
                                    ` + data.result.job_title + `
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
                error: function (data) {
                    console.log(data)
                }

            })
        };
    });




$('input[name="years_one"]').change(function () {
    if ($(this).attr('checked') === true) {
        console.log('Ok');
    }
})

// Start Job Search
$(document).ready(function() {
    salary.oninput = function () {
        $('.gro').empty();
        output.innerHTML = this.value;
        $('.gro').append(`
        <span>الحد الأدنى ` + output.innerHTML + ` <i class="fa-solid fa-circle-xmark"></i></span>
    `);

        salary = output.innerHTML;


        $.ajax({
            url: '/employer/search',
            type: 'post',
            data: {
                salary: salary,
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });

    }
});
// End Job Search

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

// Add New List
$(document).ready(function() {
   $('.newListSubmit').click(function(e){
       e.preventDefault();

       var list_name = $('#newlistName').val();
       var type = $('#newlistType').val();
       var job = $('input[class="new_job_id"]').val();

       $.ajax({
           url: '/employer/existing/newList',
           type: 'post',
           data: {
               list_name: list_name,
               type: type,
           },
           dataType: 'json',
           success: function(data) {


                   $('.existing_list').append(`
                        <div class="mb-3">
                            <input type="hidden" name="job_id" value="` + job_id + `">
                            <button type="submit" style="background-color: #E7EAF6; border-color: #898EA3; display:block; padding-right: 18px; width: 100%" name="existing_id" value="`+ data.existings.id +`" class="form-control">
                                ` + data.existings.existing_name  +`
                            </button>
                        </div>
                   `)

           },
           error: function(data) {
                console.log(data)
           },
       })
   })
});

$(document).ready(function() {
    $('button[name="kwader_tap"]').click(function() {
        var value = $(this).val();
        var list_type =  $('input[name="list_type"]').attr("value", value);
        var test = $('input[name="list_type"]').val()

        console.log(test);
    })
});

$(document).ready(function() {
    $('button[name="jobs_tap"]').click(function() {
        var value = $(this).val();
        var list_type =  $('input[name="list_type"]').attr("value", value);
        var test = $('input[name="list_type"]').val()

        console.log(test);
    })
})

// function filter() {
//     var data = {};
//     var salary = document.getElementById('myRange');
//     salary.oninput = function () {
//         $('.gro').empty();
//         output.innerHTML = this.value;
//         $('.gro').append(`
//             <span>الحد الأدنى ` + output.innerHTML + ` <i class="fa-solid fa-circle-xmark"></i></span>
//         `);
//
//         const money = {
//             score: output.innerHTML
//         };
//
//         const finalResult = Object.assign(data,money);
//         console.log(finalResult)
//     }
//     // data.test(output.innerHTML);
//
//     $('#country_search_jobs').change(function () {
//         var country = $(this).val();
//         data.push(country);
//
//         const co = {
//             score: output.innerHTML
//         };
//         const finalCountry = Object.assign(data,co);
//
//         console.log(finalCountry);
//     });
//
//
//
//
// }


$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});





