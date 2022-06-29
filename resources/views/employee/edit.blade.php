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

                    {{-- Edit Personal Info --}}
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
                    {{-- End Edit Personal Info --}}

                    {{-- Edit Salary --}}
                    <div id="edit_salary_info" class="py-4 px-3" style="display: none;">
                        <form action="{{ route('employee.dashboard.editSalary', ['id' => $employee->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label for="monthly-salary" class="col-sm-3 col-form-label">الراتب الشهري</label>
                                <div class="col-sm-4 mb-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $employee->salary }}">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        @error('salary')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="exper-years" class="col-sm-3 col-form-label">سنوات الخبرة</label>
                                <div class="col-sm-8">
                                    <input type="radio" class="btn-check" value="0-2 سنوات" name="years_of_experience" id="option1" autocomplete="off" @if($employee->years_of_experience == '2-0 سنوات') checked @endif>
                                    <label class="btn btn-outline-secondary" for="option1">0 - 2 سنوات</label>

                                    <input type="radio" class="btn-check" value="2-5 سنوات" name="years_of_experience" id="option2" autocomplete="off" @if($employee->years_of_experience == '5-2 سنوات') checked @endif>
                                    <label class="btn btn-outline-secondary" for="option2">2 -5 سنوات</label>

                                    <input type="radio" class="btn-check" value="5-10 سنوات" name="years_of_experience" id="option3" autocomplete="off" @if($employee->years_of_experience == '10-5 سنوات') checked @endif>
                                    <label class="btn btn-outline-secondary" for="option3">5 -10 سنوات</label>

                                    <input type="radio" class="btn-check" value="+10 سنوات" name="years_of_experience" id="option4" autocomplete="off" @if($employee->years_of_experience == '+10 سنوات') checked @endif>
                                    <label class="btn btn-outline-secondary" for="option4">+10 سنوات</label>
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary px-3" id="edit_salary_cancel">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
                    </div>
                    {{-- End Edit Salary --}}

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
                            <form action="{{ route('employee.dashboard.editAvailability', ['id' => $employee->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" value="Available" name="availability" id="btnradio1" autocomplete="off" @if($employee->availability == 'Available') checked @endif>
                                    <label class="btn btn-outline-primary" for="btnradio1" style="border-bottom-right-radius: 20px;
                                    border-top-right-radius: 20px;">متاح</label>

                                    <input type="radio" class="btn-check" value="Unavailable" name="availability" id="btnradio2" autocomplete="off" @if($employee->availability == 'Unavailable') checked @endif>
                                    <label class="btn btn-outline-primary" for="btnradio2" style="border-bottom-left-radius: 20px;
                                    border-top-left-radius: 20px;">غير متاح</label>
                                </div>
                                <div class="mt-4">
                                    <h4>نظام العمل</h4>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="job_type" id="inlineCheckbox1" value="دوام كامل" @if($employee->job_type == 'دوام كامل') checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">دوام كامل</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="job_type" id="inlineCheckbox2" value="دوام جزئي" @if($employee->job_type == 'دوام جزئي') checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">دوام جزئي</label>
                                    </div>
                                </div>
                                <div class="col-sm-11 d-flex gap-2 mt-4">
                                    <button type="reset" class="btn btn-secondary flex-fill" id="edit_availability_cancel">الغاء</button>
                                    <button type="submit" class="btn main-btn-2 flex-fill">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex flex-column flex-lg-row custom-border">
            <div class="col-lg-3 mb-lg-0 mb-5">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-about-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="true">
                        <i class="fa-solid fa-circle-user"></i>
                        نبذة عني
                    </button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa-solid fa-id-card"></i>
                        المعلومات الشخصية
                    </button>
                    <button class="nav-link" id="v-pills-experience-tab" data-bs-toggle="pill" data-bs-target="#v-pills-experience" type="button" role="tab" aria-controls="v-pills-experience" aria-selected="false">
                        <i class="fa-solid fa-briefcase"></i>
                        الخبرة العملية
                    </button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill" data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education" aria-selected="false">
                        <i class="fa-solid fa-graduation-cap"></i>
                        التعليم و الدبلومات
                    </button>
                    <button class="nav-link" id="v-pills-certificate-tab" data-bs-toggle="pill" data-bs-target="#v-pills-certificate" type="button" role="tab" aria-controls="v-pills-certificate" aria-selected="false">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        الشهادات
                    </button>
                    <button class="nav-link" id="v-pills-skills-tab" data-bs-toggle="pill" data-bs-target="#v-pills-skills" type="button" role="tab" aria-controls="v-pills-skills" aria-selected="false">
                        <i class="fa-solid fa-gear"></i>
                        التخصصات والمهارات
                    </button>

                    <button class="nav-link" id="v-pills-languages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-languages" type="button" role="tab" aria-controls="v-pills-languages" aria-selected="false">
                        <i class="fa-solid fa-language"></i>
                        اللغات
                    </button>
                    <button class="nav-link" id="v-pills-cv-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cv" type="button" role="tab" aria-controls="v-pills-cv" aria-selected="false">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        السيرة الذاتية
                    </button>
                </div>
            </div>

            <div class="col-lg-9 tab-content mt-3" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel"
                     aria-labelledby="v-pills-about-tab" tabindex="0">
                    <h3 class="tab-title">نبذة عني</h3>
                    <div id="about_me" class="ms-4 mt-4">
                        <div class="edit-hover pe-0 pe-md-5 py-0 py-md-3">
                            <p class="tab-content">
                                {{ $employee->bio }}
                            </p>
                            <button onclick="editAboutMe()" class="btn btn-edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>
                    <div id="edit_about_me" class="p-4" style="display: none; background-color: #e7eaf680;">
                        <form action="{{ route('employee.dashboard.editBio', ['id' => $employee->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5">
                                        {{ $employee->bio }}
                                    </textarea>
                                    @error('bio')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-11 d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary px-3" id="bio_cancel">الغاء</button>
                                <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Personal Info --}}
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
                                        {{ $employee->user->first_name . ' ' . $employee->user->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">تاريخ الميلاد</th>
                                    <td>
                                        {{ $employee->date_of_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنس</th>
                                    <td>
                                        @if( $employee->gender == 'Male' )
                                            ذكر
                                        @else
                                            أنثى
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الجنسية</th>
                                    <td>
                                        @if($employee->nationalit_id)
                                            {{ $employee->nationality->name }}
                                        @else
                                            {{ $employee->country->country_name . 'ي' }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">بلد الإقامة</th>
                                    <td>
                                        {{ $employee->country->country_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tab-title" scope="row">الحالة الاجتماعية</th>
                                    <td>
                                        {{ $employee->marital_status }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="fa-regular fa-pen-to-square"></i>
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
                                    {{-- Personal Info Edit Modal --}}
                                    <form action="{{ route('employee.dashboard.personalTap', ['id' => $employee->id]) }}" method="POST" id="personal-tap">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" id="employee_id" value="{{ $employee->id }}">


                                        <div class="tap-personal-errors">

                                        </div>

                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" class="form-control" id="tap-first" name="first_name" value="{{ $employee->user->first_name }}">
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <input type="text" name="last_name" id="tap-last" value="{{ $employee->user->last_name }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="name" class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="day" name="day">
                                                    @for( $i = 1; $i <= 31; $i++ )
                                                        <option @if( $day->format('d') == $i ) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="month" name="month">
                                                    @for( $i = 1; $i <= 12; $i++ )
                                                        <option @if( $day->format('m') == $i ) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor

                                                </select>
                                            </div>
                                            <div class="col-sm-3 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="year" name="year">
                                                    @for( $i = 1970; $i <= 2022; $i++ )
                                                        <option @if( $day->format('Y') == $i ) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الجنس</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline" style="display:inline-block;">
                                                    <input class="form-check-input" type="radio" name="gender" id="male-gender" value="Male" @if( $employee->gender == 'Male') checked @endif>
                                                    <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="display:inline-block;">
                                                    <input class="form-check-input" type="radio" name="gender" id="female-gender" value="Female" @if( $employee->gender == 'Female') checked @endif>
                                                    <label class="form-check-label" for="inlineRadio2">انثى</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الجنسية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="nationality" name="nationality">
                                                    @foreach($nationalities as $national)
                                                        <option @if($employee->nationality_id == $national->id) selected @endif value="{{ $national->id }}">
                                                            {{ $national->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">بلد الاقامة</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="country" name="country_id">
                                                    @foreach($countries as $country)
                                                        <option @if($employee->country_id == $country->id) selected @endif value="{{ $country->id }}">
                                                            {{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">الحالة الاجتماعية</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" aria-label="Default select example" id="marital_status" name="marital_status">
                                                    <option value="عزابي" @if( $employee->marital_status == 'عزابي') selected @endif>اعزب</option>
                                                    <option value="متزوج" @if( $employee->marital_status == 'متزوج') selected @endif>متزوج</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="about-me">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Practical Exps. --}}
                <div class="tab-pane fade" id="v-pills-experience" role="tabpanel" aria-labelledby="v-pills-experience-tab" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tab-title">الخبرة العملية</h3>
                        <button class="btn main-btn-2" data-bs-toggle="modal" data-bs-target="#experModal">أضف خبرة</button>
                    </div>
                    @if ($practical_experiences)
                        @foreach( $practical_experiences as $practical)
                        <div class="ms-4 mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <img class="border rounded-circle border-success border-2" src="{{ asset('Front_Assets/img/ss.png') }}"
                                         width="50" alt="">
                                    <div>
                                        <span class="d-block">{{ $practical->company_name }}</span>
                                        <small>{{ $practical->job_title }}</small>
                                    </div>
                                </div>
                                <div>
                                    {{ $practical->start_date }} -
                                    @if( $practical->end_date == '/')
                                        {{ 'حتى الآن' }}
                                    @else
                                        {{ $practical->end_date }}
                                    @endif  -
                                    {{ $practical->country->country_name }}
                                </div>
                            </div>
                        </div>

                        <div class="container mt-3">
                            @foreach($practical->specializations as $special)
                                <button type="button" class="btn btn-sm">
                                    {{ $special }}
                                </button>
                            @endforeach
                        </div>
                        <div class="mt-3" style="margin-right: 30px;">
                            <p class="tab-content">
                                {{ $practical->description }}
                            </p>
                        </div>
                    @endforeach
                    @endif
                    <div class="modal fade" id="experModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف خبرتك العملية</h3>
                                </div>
                                <div class="experience-error">

                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('employee.dashboard.practicalExperience') }}" method="POST" id="experience">
                                        @csrf

                                        <div class="mb-4 row">
                                            <label for="Job-title" class="col-sm-3 col-form-label">المسمى الوظيفي</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="job_title" class="form-control" id="experience-Job-title">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="spc" class="col-sm-3 col-form-label">التخصص</label>
                                            <div class="col-sm-8">
                                                <select id="personal_special" class="special" name="special[]" multiple>
                                                    @foreach( $specializations as $specialization)
                                                        <option value="{{ $specialization->specialization_name }}">
                                                            {{$specialization->specialization_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="compa" class="col-sm-3 col-form-label">اسم الشركة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="company_name" id="experience-company">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label">مكان التوظيف</label>
                                            <div class="col-sm-8">
                                                <select id="experience-country" class="form-select" aria-label="Default select example" name="country_id">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="start_month" aria-label="Default select example" id="start-month">
                                                    <option selected>الشهر</option>
                                                    @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4" >
                                                <select class="form-select mb-3" name="start_year" aria-label="Default select example" id="start-year">
                                                    <option selected>السنة</option>
                                                    @for($i = 1980; $i <= 2022; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>

                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_month" aria-label="Default select example" id="end_date_month">
                                                    <option >الشهر</option>
                                                    @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" name="end_year" aria-label="Default select example" id="end_date_year">
                                                    <option>السنة</option>
                                                    @for($i = 1980; $i <= 2022; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="still" value="option1" >
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1" style="margin-right: 25px;">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف الوظيفي</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="experModalButton">الغاء</button>
                                            <button type="submit" class="btn main-btn-2 px-3">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Educations --}}
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
                    {{-- Education Modal --}}
                    <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content px-0 px-sm-5">
                                <div class="modal-header mt-5">
                                    <h3 class="modal-title" id="exampleModalLabel">أضف معلومات التعليم</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('employee.dashboard.education') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-4 row">
                                            <label for="edu-name" class="col-sm-3 col-form-label">اسم المؤسسة</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="enterprise_name" class="form-control" id="edu-name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="deploma" class="col-sm-3 col-form-label">اسم الدبلوم</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="diploma_name" class="form-control" id="diploma">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ بدء العمل</label>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="edu_start_month" name="edu_start_month">
                                                    <option selected>الشهر</option>
                                                    @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-4">
                                                <select class="form-select" aria-label="Default select example" id="edu_start_year" name="edu_start_year">
                                                    <option selected>السنة</option>
                                                    @for($i = 1980; $i <= 2022; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">تاريخ ترك العمل</label>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example" id="edu_end_month" name="edu_end_month">
                                                    <option selected>الشهر</option>
                                                    @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-select mb-3" aria-label="Default select example" id="edu_end_year" name="edu_end_year">
                                                    <option selected>السنة</option>
                                                    @for($i = 1980; $i <= 2022; $i++)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <small class="form-check-label text-muted" for="inlineCheckbox1" id="edu_still">مازلت اعمل</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="sp" class="col-sm-3 col-form-label">مجال التخصص</label>
                                            <div class="col-sm-8">
                                                <select id="edu_special" class="special" name="special[]" multiple>
                                                    @foreach( $specializations as $specialization)
                                                        <option value="{{ $specialization->specialization_name }}">
                                                            {{$specialization->specialization_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="Textarea" class="col-sm-3 col-form-label">الوصف</label>
                                            <div class="col-sm-8">
                                                <div>
                                                    <textarea class="form-control" name="description" id="edu-description" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">رابط الشهادة</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="cert-url" id="edu-url">
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="cert" class="col-sm-3 col-form-label">ملف الشهادة</label>
                                            <div class="col-sm-8">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input type="file" name="cert-file" id="cert-file" hidden />
                                                    <label class="btn btn-upload p-3 w-100" for="cert-file">
                                                        <i class="bi bi-cloud-upload"></i>
                                                        <span style="color: var(--secondary-color)">Browse</span> file to upload
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 d-flex gap-2 justify-content-end mb-5 mt-4">
                                            <button type="reset" class="btn btn-secondary px-3" data-bs-dismiss="modal" id="edu-cancel">الغاء</button>
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
