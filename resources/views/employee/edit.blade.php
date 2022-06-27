@extends('layouts.front_layout')

@section('page_title', 'تعديل الملف الشخصي')

@section('content')
    <div class="container personal-page mb-5">
        <div class="row align-items-center custom-border">
            <div class="col-lg-3 col-md-4">
                <div class="profile-pic">
                    <label class="-label" for="file">
                        <i class="bi bi-camera-fill me-2"></i>
                        <span>تعديل صورتك</span>
                    </label>
                    <input id="file" type="file" onchange="changePic(event)" />
                    <img src="{{ $employee->image }}" class="img-fluid" alt="" id="output">
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="d-flex justify-content-between my-4 my-md-0 flex-column flex-md-row">
                    <div id="personal_info" class="user-info text-center text-md-start">
                        <div class="edit-hover">
                            <h3 class="name">
                                {{ $employee->user->first_name . ' ' . $employee->user->last_name }}
                            </h3>
                            <p class="Job-title">
                                {{ $employee->job_title }}
                            </p>
                            <div
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                                <i class="bi bi-geo-alt-fill"></i>
                                <img width="20" src="{{ asset('flags/') . '/' . $employee->country->code . '.png'}}" alt="">
                                <span class="country">
                                    {{ $employee->country->country_name }}
                                </span>
                            </div>
                            <button onclick="editPersonalInfo()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                        <div class="edit-hover pe-0 pe-md-5 py-3">
                            <div class="div-group d-flex mt-3">
                                <div class="py-2">
                                    <small>الراتب</small>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4>
                                            {{ $employee->salary }}$
                                        </h4>
                                        <small> / الشهر</small>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <small>سنوات الخبرة</small>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4>
                                            {{ $employee->years_of_experience }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <button onclick="editSalaryInfo()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>
                    <div id="edit_personal_info" class="py-4 px-3" style="display: none;">
                        <form action="{{ route('employee.dashboard.editInfo', ['id' => $employee->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label for="first-name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-4 mb-3">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first-name" value="{{ $employee->user->first_name }}">
                                    @error('first_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last-name" value="{{ $employee->user->last_name }}">
                                    @error('last_name')
                                    <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Job-title" class="col-sm-3 col-form-label">
                                    المسمى الوظيفي
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" id="Job-title" value="{{ $employee->job_title }}">
                                    @error('job_title')
                                    <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">بلد الإقامة</label>
                                <div class="col-sm-8">
                                    <select class="form-select mb-3 @error('country_id') is-invalid @enderror" aria-label="Default select example" name="country_id">
                                        @foreach( $countries as $country)
                                            <option @if($employee->country->id == $country->id) selected @endif value="{{ $country->id }}">
                                                {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary px-3" id="personal_info_cancel">
                                    الغاء
                                </button>
                                <button type="submit" class="btn main-btn-2 px-3" id="set_info">
                                    حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="edit_salary_info" class="py-4 px-3" style="display: none;">
                        <form>
                            <div class="row">
                                <label for="monthly-salary" class="col-sm-3 col-form-label">الراتب الشهري</label>
                                <div class="col-sm-4 mb-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="333">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="exper-years" class="col-sm-3 col-form-label">سنوات الخبرة</label>
                                <div class="col-sm-8">
                                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary" for="option1">0 - 2 سنوات</label>

                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option2">2 -5 سنوات</label>

                                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option3">5 -10 سنوات</label>

                                    <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option4">+10 سنوات</label>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="submit" class="btn btn-secondary px-3">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4 mt-md-0 mx-auto mx-md-0">
                        <div id="availability">
                            <div class="edit-hover p-4">
                                <div class="availability">
                                    @if($employee->availability == 'Available')
                                        <span class="dot" style="background-color: #080"></span>
                                        <span class="state">متاح</span>
                                    @else
                                        <span class="dot"></span>
                                        <span class="state">غير متاح</span>
                                    @endif
                                </div>
                                <button onclick="editAvailability()" class="btn btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </div>
                        </div>
                        <div id="edit_availability" class="py-4 px-3" style="display: none;">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1" style="border-bottom-right-radius: 20px;
                                border-top-right-radius: 20px;">متاح</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2" style="border-bottom-left-radius: 20px;
                                border-top-left-radius: 20px;">غير متاح</label>
                            </div>
                            <div class="mt-4">
                                <h4>نظام العمل</h4>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">دوام كامل</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">دوام جزئي</label>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-secondary flex-fill">الغاء</button>
                                <button type="submit" class="btn main-btn-2 flex-fill">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex flex-column flex-lg-row custom-border">
            <div class="col-lg-3 mb-lg-0 mb-5">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-about-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about"
                            aria-selected="true">
                        <i class="bi bi-person-fill"></i>نبذة عني</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                        <i class="bi bi-person-workspace"></i>المعلومات الشخصية</button>
                    <button class="nav-link" id="v-pills-experience-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-experience" type="button" role="tab" aria-controls="v-pills-experience"
                            aria-selected="false">
                        <i class="bi bi-briefcase-fill"></i>الخبرة العملية</button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education"
                            aria-selected="false">
                        <i class="bi bi-mortarboard-fill"></i>التعليم و الدبلومات</button>
                    <button class="nav-link" id="v-pills-certificate-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-certificate" type="button" role="tab"
                            aria-controls="v-pills-certificate" aria-selected="false">
                        <i class="bi bi-file-text"></i>الشهادات</button>
                    <button class="nav-link" id="v-pills-skills-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-skills" type="button" role="tab" aria-controls="v-pills-skills"
                            aria-selected="false">
                        <i class="bi bi-gear-fill"></i>التخصصات والمهارات</button>

                    <button class="nav-link" id="v-pills-languages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-languages" type="button" role="tab" aria-controls="v-pills-languages"
                            aria-selected="false">
                        <i class="bi bi-translate"></i>اللغات</button>
                    <button class="nav-link" id="v-pills-cv-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cv"
                            type="button" role="tab" aria-controls="v-pills-cv" aria-selected="false">
                        <i class="bi bi-file-earmark-person"></i>السيرة الذاتية</button>
                </div>
            </div>

            <div class="col-lg-9 tab-content mt-3" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel"
                     aria-labelledby="v-pills-about-tab" tabindex="0">
                    <h3 class="tab-title">نبذة عني</h3>
                    <div id="about_me" class="ms-4 mt-4">
                        <div class="edit-hover pe-0 pe-md-5 py-0 py-md-3">
                            <p class="tab-content">
                                لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم
                                في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس
                                عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب
                                بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى
                                صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا
                                القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر
                                مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker)
                                والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.
                            </p>
                            <button onclick="editAboutMe()" class="btn btn-edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </div>
                    </div>
                    <div id="edit_about_me" class="p-4" style="display: none; background-color: #e7eaf680;">
                        <form>
                            <div class="row mb-4">
                                <div class="col-sm-11">
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="submit" class="btn btn-secondary px-3">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                     tabindex="0">
                    <h3 class="tab-title">المعلومات الشخصية</h3>
                    <div class="ms-4 mt-4">
                        <div class="edit-hover">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th class="tab-title" scope="row">الاسم</th>
                                    <td>
                                        {{ $employee->first_name . $employee->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">تاريخ الميلاد</th>
                                    <td>24/10/1990</td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنس</th>
                                    <td>أنثى</td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنسية</th>
                                    <td>قطرية</td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">بلد الإقامة</th>
                                    <td>قطر</td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الحالة الاجتماعية</th>
                                    <td>عزباء</td>
                                </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أخبرنا عن نفسك</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                            <div class="col-sm-3 mb-4">
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الجنس</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
                                                    <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
                                                    <label class="form-check-label" for="inlineRadio2">انثى</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الحنسية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>قطرية</option>
                                                    <option value="1">الامارات</option>
                                                    <option value="2">مصر</option>
                                                    <option value="3">السعودية</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">بلد الاقامة</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>قطرية</option>
                                                    <option value="1">الامارات</option>
                                                    <option value="2">مصر</option>
                                                    <option value="3">السعودية</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الحالة الاجتماعية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>اعزب</option>
                                                    <option value="3">متزوج</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-experience" role="tabpanel"
                     aria-labelledby="v-pills-experience-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الخبرة العملية</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#experModal">أضف خيرة</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <img class="border rounded-circle border-success border-2" src="images/company.png"
                                     width="50" alt="">
                                <div>
                                    <span class="d-block">اسم الشركة</span>
                                    <small>المسمى الوظيفي</small>
                                </div>
                            </div>
                            <div>
                                تاريخ بدء العمل - تاريخ ترك العمل - مكان الوظيفة
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                        <button type="button" class="btn btn-sm">التخصص 2</button>
                        <button type="button" class="btn btn-sm">التخصص 3</button>
                        <button type="button" class="btn btn-sm">التخصص 4</button>
                        <button type="button" class="btn btn-sm">التخصص 5</button>
                        <button type="button" class="btn btn-sm">التخصص 6</button>
                        <button type="button" class="btn btn-sm">التخصص 7</button>
                        <button type="button" class="btn btn-sm">التخصص 8</button>
                        <button type="button" class="btn btn-sm">التخصص 9</button>
                    </div>
                    <div class="mt-3">
                        <p class="tab-content">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                            وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص
                            الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها
                            من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                            النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير
                            في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا
                            النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر"
                            (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>
                    </div>
                    <div class="modal fade" id="experModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف خبرتك العملية</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-4 row">
                                            <label for="Job-title" class="col-sm-3 col-form-label">المسمى الوظيفي</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="Job-title">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="spc" class="col-sm-3 col-form-label">التخصص</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="spc">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="compa" class="col-sm-3 col-form-label">اسم الشركة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="compa">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">مكان التوظيف</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>قطر</option>
                                                    <option value="1">الامارات</option>
                                                    <option value="2">مصر</option>
                                                    <option value="3">السعودية</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف الوظيفي</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" id="Textarea" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                     aria-labelledby="v-pills-education-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التعليم و الدبلومات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#educationModal">أضف دبلوم</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <img class="border rounded-circle border-success border-2" src="images/company.png"
                                     width="50" alt="">
                                <div>
                                    <span class="d-block">اسم المؤسسة التربوية</span>
                                    <small>اسم الدبلوم</small>
                                </div>
                            </div>
                            <div>
                                تاريخ البدء - تاريخ الانتهاء
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                        <button type="button" class="btn btn-sm">التخصص 2</button>
                        <button type="button" class="btn btn-sm">التخصص 3</button>
                        <button type="button" class="btn btn-sm">التخصص 4</button>
                        <button type="button" class="btn btn-sm">التخصص 5</button>
                        <button type="button" class="btn btn-sm">التخصص 6</button>
                        <button type="button" class="btn btn-sm">التخصص 7</button>
                        <button type="button" class="btn btn-sm">التخصص 8</button>
                        <button type="button" class="btn btn-sm">التخصص 9</button>
                    </div>
                    <div class="mt-3">
                        <p class="tab-content">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                            وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص
                            الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها
                            من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                            النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير
                            في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا
                            النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر"
                            (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>
                    </div>
                    <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف معلومات التعليم</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-4 row">
                                            <label for="edu-name" class="col-sm-3 col-form-label">اسم المؤسسة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="edu-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="deploma" class="col-sm-3 col-form-label">اسم الدبلوم</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="deploma">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="sp" class="col-sm-3 col-form-label">مجال التخصص</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sp">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" id="Textarea" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cert">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">ملف الشهادة</label>
                                            <div class="col-sm-8">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" id="upload" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="upload">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-certificate" role="tabpanel"
                     aria-labelledby="v-pills-certificate-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الشهادات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#certificateModal">أضف شهادة</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <img class="border rounded-circle border-success border-2" src="images/company.png"
                                     width="50" alt="">
                                <div>
                                    <span class="d-block">اسم الشهادة</span>
                                    <small>اسم المركز</small>
                                </div>
                            </div>
                            <div>
                                تاريخ الإصدار - تاريخ الانتهاء
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                        <button type="button" class="btn btn-sm">التخصص 2</button>
                        <button type="button" class="btn btn-sm">التخصص 3</button>
                        <button type="button" class="btn btn-sm">التخصص 4</button>
                        <button type="button" class="btn btn-sm">التخصص 5</button>
                        <button type="button" class="btn btn-sm">التخصص 6</button>
                        <button type="button" class="btn btn-sm">التخصص 7</button>
                        <button type="button" class="btn btn-sm">التخصص 8</button>
                        <button type="button" class="btn btn-sm">التخصص 9</button>
                    </div>
                    <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أدرج الشهادات التي تحصلت عليها</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-4 row">
                                            <label for="certif-name" class="col-sm-3 col-form-label">اسم الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="certif-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="center-name" class="col-sm-3 col-form-label">اسم المركز</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="center-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="major" class="col-sm-3 col-form-label">مجال التخصص</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="major">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ الإصدار</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ الانتهاء</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>الشهر</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>السنة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1">هذه الشهادة لا تملك تايخ إنتهاء</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cer-link" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cer-link">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="cert">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">ملف الشهادة</label>
                                            <div class="col-sm-8">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" id="upload" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="upload">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-skills" role="tabpanel" aria-labelledby="v-pills-skills-tab"
                     tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">التخصصات والمهارات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#skillsModal">أضف تخصص</button>
                    </div>
                    <div class="ms-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <img class="ounded-circle" src="images/skills.png" width="50" alt="">
                                <h4>فن و تصميم</h4>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button type="button" class="btn btn-sm">التخصص 1</button>
                        <button type="button" class="btn btn-sm">التخصص 2</button>
                        <button type="button" class="btn btn-sm">التخصص 3</button>
                        <button type="button" class="btn btn-sm">التخصص 4</button>
                        <button type="button" class="btn btn-sm">التخصص 5</button>
                        <button type="button" class="btn btn-sm">التخصص 6</button>
                        <button type="button" class="btn btn-sm">التخصص 7</button>
                        <button type="button" class="btn btn-sm">التخصص 8</button>
                        <button type="button" class="btn btn-sm">التخصص 9</button>
                    </div>
                    <div class="mt-3 ms-4">
                        <p class="tab-content">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                            وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص
                            الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها
                            من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                            النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير
                            في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا
                            النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر"
                            (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>
                    </div>

                    <div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف مجال تخصصك</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-4 row">
                                            <label for="certif-name" class="col-sm-3 col-form-label">المجال</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>اختر مجال تخصصك</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="major-name" class="col-sm-3 col-form-label"> التخصص</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="major-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" id="Textarea" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-languages" role="tabpanel"
                     aria-labelledby="v-pills-languages-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">اللغات</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#languagesModal">أضف لغة</button>
                    </div>
                    <div class="container ms-4">
                        العربي : متوسط
                    </div>
                    <div class="modal fade" id="languagesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف مجال تخصصك</h3>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-4 row">
                                            <div class="col-sm-6">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>اختر لغة</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>اختر  المستوى </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="submit" class="btn btn-secondary px-3" data-bs-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab"
                     tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">السيرة الذاتية</h3>
                        <input type="file" id="upload" hidden />
                        <label class="btn main-btn-2" for="upload">أرفق السيرة الذاتية</label>
                    </div>
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
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
@endsection
