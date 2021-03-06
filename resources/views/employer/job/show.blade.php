@extends('layouts.front_layout')

@section('page_title', 'وصف الوظيفة')

@section('content')
    <div class="jobDescription">
        <div class="jobDescription-content">
            <div class="jobDescription-header d-flex">
                <div>
                    <h5>
                        {{ $job->job_title }}

                    </h5>
                </div>
                <div class="left">
                    <h5 style="padding-right: 2px;">
                        {{ $job->salary }}
                    </h5>
                    <span>/ شهر </span>
                </div>
            </div>
            <hr>
            <div class="jobDescription-two  d-flex">
                <div>
                    <span>المجال:</span>
                    <span>
                        {{ $job->field->field_name }}
                    </span>
                </div>
                <div>
                    <span>الاختصاص:</span>
                    <span>
                        {{ $job->specialization[0] }}
                    </span>
                </div>
                <div>
                    <span>اللغات:</span>
                    @foreach($job->languages as $language)
                        <span>
                            {{ $language }} -
                        </span>
                    @endforeach
                </div>
                <div>
                    <span>نظام العمل:</span>
                    <span>
                        {{ $job->job_system }}
                    </span>
                </div>
                <div>
                    <span>سنوات الخبرة:</span>
                    <span>
                        {{ $job->years_of_experience }}
                    </span>
                </div>
                <div>
                    <span>الدولة:</span>
                    <span>
                        {{ $job->country->country_name }}
                    </span>
                </div>
            </div>
            <hr>
            <div class="jobDescription-skill d-flex" style="padding: 12px 25px">
                <div style="margin-top: 10px; width: 75%">
                    @foreach( $job->skills as $skill )
                        <span>
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
                <div style="width: 17%;">
                    @if (auth()->user()->user_type == 'Employee')
                        <button class="btn btn-success" style="background-color: #00B398; border: none; margin-top: -10px">تقدم الآن</button>
                    @else
                        <span style="margin-left: 30px; background-color: transparent">

                        </span>
                    @endif
                    <i class="fa-regular fa-heart" style="color: #080; font-size: 25px; margin-right: 25px; margin-top: 5px"></i>
                </div>
            </div>
            <hr>
            <div class="jobDescription-body">
                <div>
                    <h5 style="margin-right: -20px;">
                        وصف الوظيفة
                    </h5>
                    <p>
                        {{ $job->description }}

                    </p>
                </div>

                <br> <br>
            </div>

            @if (auth()->user()->user_type == 'Employee')
                <div style="text-align: left; padding:0px 70px;">
                    <button class="btn btn-success" id="update_job" style="background-color: #00B398; border: none; margin-top: -10px"
                            @if($job->employee_applicants)
                                @if( in_array($employee->id, $job->employee_applicants) )
                                    disabled
                                @endif
                            @endif>
                        تقدم الآن
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="send_id_to_job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('Front_Assets/img/Group 1189.png') }}">
                                <input type="hidden" value="{{ $job->id }}" id="job_object">
                            </div>
                            <div class="modal-footer">
                                <h6>
                                    تم التقدم للوظيفة بنجاح
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if( auth()->user()->user_type == 'Employer' )
            @if( $job->employer_id == auth()->user()->employer->id )

            <div class="jobDescription-staffApply">
                <div class="dropdown">
                    <h5 class="btn btn-secondary dropdown-toggle dropbutton" onclick="btnToggle()" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">
                        الكوادر المتقدمة
                    </h5>

                    <ul id="Dropdown" style="margin-top: 70px;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($users as $user)
                            <li>
                                <div class="section d-flex">
                                    <div class="d-flex">
                                        <div class="image">
                                            <img src="{{ $user->image }}" alt="">
                                        </div>
                                        <div class="title">
                                            <p>
                                                {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                            </p>
                                            <span>{{ $user->job_title }}</span>
                                            <i class="fa-solid fa-flag"></i>
                                            <span>{{ $user->country->country_name }}</span>


                                            <span><i class="fa-solid fa-clock"></i>منذ 4أيام</span>

                                        </div>
                                    </div>

                                    <div class="but">
                                        <a href="{{ route('employee.dashboard.show', ['id' => $user->id]) }}" type="button" class="btn btn-primary right">اطلع على السيرة الذاتية</a>
                                        <a href="{{ route('chat.create', ['slug' => $job->slug, 'employee' => $user->id]) }}" type="button" class="btn btn-primary left">تواصل مع الكادر</a>

                                    </div>
                                </div>
                            </li>
                            <hr>
                        @endforeach

                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </ul>

                </div>


            </div>
        @endif
        @endif
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    </div>

    <footer>
        <div class="container">
            <div class="row pt-5 pb-2 text-center text-sm-start">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>كوادر.كوم</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">عن كوادر.كوم</a>
                        <a class="nav-link" href="#">إرشادات الاستخدام</a>
                        <a class="nav-link" href="#">بيان الخصوصية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>الكادر</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">انضمَّ إلينا</a>
                        <a class="nav-link" href="#">ابحث عن وظيفة</a>
                        <a class="nav-link" href="#">كوادر بريميوم</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>صاحب العمل</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">أنشئ حسابك الآن</a>
                        <a class="nav-link" href="#">أعلن عن وظيفة</a>
                        <a class="nav-link" href="#">بطاقات العضوية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>تابعنا على</h5>
                    <div
                        class="social-icon d-flex align-items-center justify-content-center justify-content-sm-start mt-3 gap-4">
                        <a href="#">
                            <span>
                                <i class="bi bi-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-linkedin"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-facebook"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="last-footer py-4">
            © 2022 كوادر.كوم جميع الحقوق محفوظة
        </div>
    </footer>

    <script>
        var disableButton = (e) => {
            $('#jobDescription-click').prop('disabled', true);
        };

        var enableButton = (e) => {
            $('#jobDescription-click').prop('disabled', false);
        };

        $(document).on('click', '.offer-close', disableButton);

        function btnToggle() {
            document.getElementById("Dropdown").classList.toggle("show");
        }

        // Prevents menu from closing when clicked inside
        document.getElementById("Dropdown").addEventListener('click', function (event) {
            alert("click outside");
            event.stopPropagation();
        });
        window.onclick = function (event) {
            if (!event.target.matches('.dropbutton')) {

                var dropdowns =
                    document.getElementsByClassName("dropdownmenu-content");

                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
@endsection
