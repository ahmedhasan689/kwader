@extends('layouts.front_layout')

@section('page_title', 'شركاتي')

@section('content')

<div class="information">
    <div class="container">
        <h2>
            معلومات عن شركتك

        </h2>
        <div class="informationContent">
            <p>هذه المعلومات ضرورية لاضافة وظائف و تحرير العقود. لن تظهر في ملفك الشخصي</p>
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row d-flex gap-2 mx-2">

                    <div class="col-lg-6  mb-5 bb">

                        <div class="header">
                            المعلومات القانونية
                        </div>

                        {{-- Company_name --}}
                        <div class="mb-3 px-4 mt-4">
                            <label for="companyName" class="form-label">اسم الشركة</label>
                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="companyName" aria-describedby="company">
                            @error('company_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>


                        {{-- legal Status --}}
                        <div class="mb-3  px-4">
                            <label for="state" class="form-label">الحالة القانونية</label>
                            <select style="width:100% ;" id="country" class="form-select" name="legal_status">
                                <option value="registered">مسجل</option>
                                <option value="unregistered">غير مسجل</option>
                            </select>
                        </div>

                        {{-- Registration Number --}}
                        <div class="mb-3 px-4">
                            <label for="numberSign" class="form-label">رقم التسجيل</label>
                            <input type="text" name="registration_number" class="form-control @error('registration_number') is-invalid @enderror" id="numberSign">
                            @error('registration_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>



                        {{-- Address --}}
                        <div class="mb-3  px-4">
                            <label for="title" class="form-label">العنوان</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="title">
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>



                        {{-- Country ID --}}
                        <div class="d-flex gap-2  px-4">
                            <div class="mb-3" style="width:50% ;">
                                <label for="country" class="form-label">الدولة</label>
                                <select style="width:100% ;" aria-placeholder="لدولة" id="country" class="form-select" name="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Postal --}}
                            <div class="mb-3" style="width:50% ;">
                                <label for="postNumber" class="form-label">الرقم البريدي</label>
                                <input style="width:100% ;" name="postal" type="text" class="form-control @error('postal') is-invalid @enderror" id="postNumber">
                                @error('postal')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        {{-- Submit --}}
                        <div class="px-4">
                            <button type="submit" class="btn btn-primary">
                                حفظ
                            </button>
                        </div>

                    </div>

                    {{-- Company Visual Identity --}}
                    <div class="col-lg-6 mb-5 ">
                        <div class="logo">
                            <div class="header">
                                شعار الشركة
                            </div>
                            <div>
                                <img class="personalPhoto" src="{{ asset('Front_Assets/img/ss.png') }}" alt="">

                                <label for="file-input">
                                    <img class="camera" src="{{ asset('Front_Assets/img/photo-camera (1).png') }}" alt="">
                                </label>

                                <input id="file-input" name="visual_identity" type="file" />
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row" style="width: 85%; margin-right: 0px;">

                <form action="{{ route('contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="header">
                        معلومات الاتصال
                    </div>
                    <div class="d-flex gap-2  px-4 mt-4">

                        {{-- Company_email --}}
                        <div class="mb-3" style="width:50% ;">
                            <label for="emailEx" class="form-label">البريد الالكتروني</label>
                            <input style="width:100% ;" name="company_email" type="email" class="form-control" id="emailEx">
                        </div>

                        {{-- Company Website --}}
                        <div class="mb-3" style="width:50% ;">
                            <label for="location" class="form-label">الموقع الإلكتروني</label>
                            <input style="width:100% ;" name="company_website" type="text" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="d-flex gap-2  px-4">

                        {{-- company_phone --}}
                        <div class="mb-3" style="width:50% ;">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input style="width:100% ;" name="company_phone" type="number" class="form-control" id="phone">
                        </div>

                        {{-- company_fax --}}
                        <div class="mb-3" style="width:50% ;">
                            <label for="fax" class="form-label">رقم الفاكس</label>
                            <input style="width:100% ;" name="company_fax" type="number" class="form-control" id="fax">
                        </div>
                    </div>
                    <div class="px-4">
                        <button type="submit" class="btn btn-primary">
                            حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br>
</div>

@endsection
