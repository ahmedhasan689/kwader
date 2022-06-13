@extends('layouts.master')
@section('css')
    <link href="{{ asset('Dashboard_Assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet">

    <link href="{{ asset('Dashboard_Assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard_Assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard_Assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('Dashboard_Assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    تعديل كادر
                </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / لوحة التحكم
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    تعديل كادر
                </div>
                <p class="mg-b-20">
                    يرجى التعديل على البيانات المطلوبة هنا
                </p>
                <form action="{{ route('admin.employee.update', ['id' => $user->id]) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row row-sm">

                        {{-- First Name --}}
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">
                                    الأسم الأول
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="أدخل الأسم الأول" type="text" value="{{ $user->first_name }}">
                                @error('first_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">
                                    الأسم الأخير
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="أدخل الأسم الأخير" type="text" value="{{ $user->last_name }}">
                                @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    البريد الإلكتروني
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="أدخل البريد الإلكتروني" type="email" value="{{ $user->email }}">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    كلمة المرور
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="أدخل كلمة المرور" type="password">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    تأكيد كلمة المرور
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="تأكيد كلمة المرور" type="password">
                                @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone_Number --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    رقم الجوال
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="أدخل رقم الجوال" type="text" value="{{ $user->phone_number }}">
                                @error('phone_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Country --}}
                        <div class="col-4">
                            <div class="form-group">
                                <p class="mg-b-10">
                                    الدولة
                                </p>
                                <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                                    <option label="أختر واحد"></option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if( $country->id == $user->employee->country_id) selected @endif>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- Languages --}}
                        <div class="col-4">
                            <div class="form-group">
                                <p class="mg-b-10">
                                    اللغة
                                </p>
                                <select class="form-control @error('language_id') is-invalid @enderror" name="language_id">
                                    <option label="أختر واحد"></option>

                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}" @if( $language->id == $user->employee->language_id) selected @endif>
                                            {{ $language->language_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('language_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    الجنس
                                    <span class="tx-danger">*</span>
                                </label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option label="أختر واحد"></option>

                                    <option value="Male" @if( $user->employee->gender == 'Male') selected @endif>
                                        ذكر
                                    </option>
                                    <option value="Female" @if( $user->employee->gender == 'Female') selected @endif>
                                        أنثى
                                    </option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Date Of Birth --}}
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    تاريخ الميلاد
                                </label>
                                <input class="form-control fc-datepicker" name="date_of_birth" placeholder="MM/DD/YYYY" type="text" value="{{ $user->employee->date_of_birth }}">
                            </div>
                        </div>

                        {{-- Avatar --}}
                        <div class="col-sm-7 col-md-6 col-lg-4">
                            <label class="form-label">
                                الصورة الشخصية
                            </label>
                            <div class="custom-file" >
                                <label class="custom-file-label" for="customFile">أختر ملفاً</label>
                                <input class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar" type="file">
                            </div>
                            @error('avatar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="col-12">
                            <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">
                                حفظ البيانات
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('Dashboard_Assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('Dashboard_Assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('Dashboard_Assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ asset('Dashboard_Assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ asset('Dashboard_Assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ asset('Dashboard_Assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ asset('Dashboard_Assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ asset('Dashboard_Assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ asset('Dashboard_Assets/js/form-elements.js') }}"></script>


@endsection
