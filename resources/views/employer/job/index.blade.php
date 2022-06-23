@extends('layouts.front_layout')

@section('page_title', 'إضافة وظيفة')

@section('content')
    <form action="{{ route('job.store', ['step' => 2]) }}" method="POST" id="add_job">
        @csrf
        <div class="addJob">
            <h2>أضف وظيفة جديدة</h2>
            <div class="steps container">
                <ul class="d-flex">
                    <li class="d-flex one-steps">
                        @if( $step == 1)
                            <div>1</div>
                            <h5>ادخال البيانات</h5>
                        @else
                            <div style="background-color: #00B398; color: #fff; border-color: #00B398">1</div>
                            <h5 style="color: #00B398">ادخال البيانات</h5>
                        @endif

                    </li>
                    <li class="d-flex two-steps">
                        <div>2</div>
                        <h5>معاينة الوظيفة</h5>
                    </li>
                    <li class="d-flex three-steps">
                        <div>3</div>
                        <h5>دفع الرسوم</h5>
                    </li>
                </ul>

                {{-- Step One ( Job Information ) --}}
                @if( $step == 1 )
                <div class="first-step" style="display:block;">
                @else
                <div class="first-step" style="display:none;">
                @endif
                        <div class="row d-flex gap-2">
                            <div class="col-lg-4" style="border: 1px solid #898EA3; border-radius:5px; padding-bottom: 30px;">
                                <div class="mb-3 px-4 mt-4">
                                    <label for="jobName" class="form-label">
                                        المسمى الوظيفي
                                    </label>
                                    <input type="text" name="job_title" placeholder="مثال: مبرمج،مصمم جرافيك، مدير تسويقي" class="form-control @error('job_title') is-invalid @enderror" id="jobName" aria-describedby="company">
                                    @error('job_title')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 px-4 mt-4">
                                    <label for="field" class="form-label">
                                        المجال
                                    </label>
                                    <input type="text" placeholder="ابحث عن المجال" class="form-control" id="field" aria-describedby="company">
                                    <div class="over">
                                        @foreach( $fields as $field )
                                            <div class="form-check" style="margin-right: 4px">
                                                <input class="form-check-input @error('job_field') is-invalid @enderror" type="radio" name="job_field" value="{{ $field->id }}" id="{{ $field->id }}">
                                                <label class="form-check-label" for="{{ $field->id }}">
                                                   {{ $field->field_name }}
                                                </label>
                                            </div>
                                            @error('job_field')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        @endforeach
                                    </div>

                                </div>
                                <div class="specialize px-4 mt-4">
                                    <label for="specialized" class="form-label">
                                        الاختصاص
                                    </label>
                                    <input type="text" placeholder="ابحث عن الاختصاص" class="form-control" id="specialized" aria-describedby="company">
                                    <div class="over special">
                                        <span style="margin-right: 100px">
                                            سيكون الأختصاص هنا !
                                        </span>

                                        @error('special')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="years px-4 mt-4">
                                    <h5>سنوات الخبرة</h5>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field @error('years_of_experience') is-invalid @enderror" type="radio" name="years_of_experience" value="0-2 سنوات" id="exper1">
                                        <label class="form-check-label" for="exper1">
                                            0-2 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field @error('years_of_experience') is-invalid @enderror" type="radio" name="years_of_experience" value="5-2 سنوات" id="exper2">
                                        <label class="form-check-label" for="exper2">
                                            5-2 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field @error('years_of_experience') is-invalid @enderror" type="radio" name="years_of_experience" value="10-5 سنوات" id="exper3">
                                        <label class="form-check-label" for="exper3">
                                            10-5 سنوات
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-right: 4px">
                                        <input class="form-check-input job_field @error('years_of_experience') is-invalid @enderror" type="radio" name="years_of_experience" value="+10 سنوات" id="exper4">
                                        <label class="form-check-label" for="exper4">
                                            +10 سنوات
                                        </label>
                                    </div>
                                </div>
                                @error('years_of_experience')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-8" style="border: 1px solid #898EA3; border-radius:5px;">

                                <div class="d-flex gap-2  px-4 mt-4">
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="sallary" class="form-label">الراتب الشهري</label>
                                        <input style="width:100% ;" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" id="sallary">
                                        @error('salary')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label" style="display: block">نظام العمل</label>

                                        <div style="display:inline; margin-left: 25px;">
                                            <input type="radio" id="system5" class="form-check-input @error('job_system') is-invalid @enderror" name="job_system" value="دوام كامل">
                                            <label class="form-check-label" for="system5" style="">
                                                دوام كامل
                                            </label>
                                        </div>
                                        <div style="display:inline;">
                                            <input type="radio" id="system6" class="form-check-input @error('job_system') is-invalid @enderror" name="job_system" value="دوام جزئي">
                                            <label class="form-check-label" for="system6">
                                                دوام جزئي
                                            </label>
                                        </div>
                                        @error('job_system')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex gap-2  px-4">
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="country" class="form-label">الدولة</label>
                                        <select class="form-select @error('country_id') is-invalid @enderror" aria-label="Default select example" name="country_id">
                                            <option >الرجاء إختيار الدولة من هنا</option>
                                            @foreach( $countries as $country )
                                                <option value="{{ $country->id }}">
                                                    {{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3" style="width:50% ;">
                                        <label for="language" class="form-label">اللغات</label>
                                        <select id="languages" class="form-select @error('languages') is-invalid @enderror" aria-label="Default select example" multiple name="languages[]" style="height: 20px">
                                            @foreach( $languages as $language )
                                                <option value="{{ $language->language_name }}">
                                                    {{ $language->language_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('languages')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex gap-2  px-4 mt-4">
                                    <div class="mb-3" style="width:100% ;">
{{--                                            <label for="job_description" class="form-label">--}}
{{--                                                وصف الوظيفة--}}
{{--                                            </label>--}}
                                        <br>
                                        <div class="form-outline">
                                            <label class="form-label" for="textAreaExample2">وصف الوطيفة</label>
                                            <textarea class="form-control @error('job_description') is-invalid @enderror" name="job_description" id="textAreaExample2" rows="12"></textarea>
                                            @error('job_description')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                {{-- Step Two ( Administrator's approval ) --}}
                @if ( $step == 2 )
                <div class="job-preview" style="display:block;">
                @else
                <div class="job-preview" style="display:none;">
                @endif
                    <div>
                        <img src="{{ asset('Front_Assets/img/Group 613.png') }}" alt="">
                        <p id="threeStep">
                            جاري معالجة طلبكم, ترقب ردَّنا قريبا
                        </p>
                    </div>
                </div>

                {{-- Step Three ( Job Posting Cost ) --}}
                @if( $step == 3 )
                <div class="payment-fees" style="display:block;">
                @else
                <div class="payment-fees" style="display:none;">
                @endif
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="right">
                                <div class="card">
                                    <span>مجموع الدفع</span>
                                    <h5>$46</h5>
                                </div>
                                <p>كيف تريد أن تدفع</p>

                                    <div class="d-flex ss">
                                        <div><input type="checkbox" name="" id=""> <span>بطاقة الائتمانية</span></div>
                                        <div class="image d-flex">
                                            <img src="{{ asset('Front_Assets/img/mastercard.png') }}" alt="">
                                            <img src="{{ asset('Front_Assets/img/visa.png') }}'" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex ss">
                                        <div><input type="checkbox" name="" id=""> <span>Paypal</span></div>
                                        <div class="image d-flex ">
                                            <img src="{{ asset('Front_Assets/img/paypal.png') }}" alt="">

                                        </div>
                                    </div>
                                    <div class="d-flex ss">
                                        <div>
                                            <input type="checkbox" name="" id="">
                                            <span>
                                                بطاقة عضوية
                                            </span>
                                        </div>
                                        <div class="image d-flex">
                                            <img src="{{ asset('Front_Assets/img/Group 620.png') }}" alt="">
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-lg-4 text-center center mt-4">
                            <h5>تفاصيل الدفع الخاصة بك</h5>
{{--                                <div class="mb-3 d-flex gap-2" style="flex-direction:column ;">--}}
{{--                                    <label for="#name">اسمك كما في البطاقة الائتمانية</label>--}}
{{--                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">--}}

{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="#numb">رقم البطاقة</label>--}}

{{--                                    <input type="number" class="form-control" id="numb" aria-describedby="emailHelp">--}}

{{--                                </div>--}}
{{--                                <div class="mb-3 d-flex gap-2">--}}
{{--                                    <div><label for="#date">تاريخ انتهاء الصلاحية </label>--}}

{{--                                        <input type="date" placeholder="كلمة المرور" class="form-control" id="date">--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label for="#cvv">CVV</label>--}}

{{--                                        <input type="number" placeholder="522" class="form-control" id="cvv">--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="mb-3 form-check ">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                    <label class="form-check-label" for="exampleCheck1">احفظ البطاقة لتسهيل--}}
{{--                                        الدفع في المستقبل</label>--}}
{{--                                </div>--}}

                                <button type="button" class="btn click">
                                    ادفع الان
                                </button>

                        </div>
                        <div class="col-lg-4 mt-5">
                            <img src="{{ asset('Front_Assets/img/Group 734.png') }}" alt="">
                        </div>
                    </div>
                </div>

                {{-- Step Four ( Job Advertisement ) --}}
                <div class="final" style="display:none;">
                    <div>
                        <img src="{{ asset('Front_Assets/img/Group 613.png') }}" alt="">
                        <p id="threeStep">
                            مبروك ، لقد تم إعلان الوظيفة
                        </p>
                    </div>
                </div>

                <div class="px-4 mt-4" style="float:left ; ">
                    <button type="submit" style="background-color: #00B398; border: none; padding: 10px 20px; font-size: large;"  class="btn btn-primary">
                        معاينة الوظيفة
                    </button>
                </div>
            </div>
        </div>
    </form>
    <br> <br> <br><br> <br> <br>
    <script>

        // $(".moved-step").on("click", function () {
        //     $(this).css("display", "none");
        //     $(".first-step").css("display", "none");
        //     $(".one-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".one-steps h5").css({ "color": "#00B398" });
        //     $(".two-steps div").css({ "color": "#3A3F50", "border-color": "#3A3F50" });
        //     $(".two-steps h5").css({ "color": "#3A3F50" });
        //     $(".job-preview").css("display", "block");
        // });
        // $("#threeStep").on("click", function () {
        //     $(this).css("display", "none");
        //
        //     $(".one-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".one-steps h5").css({ "color": "#00B398" });
        //     $(".two-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".two-steps h5").css({ "color": "#00B398" });
        //     $(".three-steps div").css({ "color": "#3A3F50", "border-color": "#3A3F50" });
        //     $(".three-steps h5").css({ "color": "#3A3F50" });
        //     $(".job-preview").css("display", "none");
        //     $(".payment-fees").css("display", "block");
        //
        // });
        // $(".payment-fees .center button").on("click", function () {
        //     $(this).css("display", "none");
        //
        //     $(".one-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".one-steps h5").css({ "color": "#00B398" });
        //     $(".two-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".two-steps h5").css({ "color": "#00B398" });
        //     $(".three-steps div").css({ "background-color": "#00B398", "color": "#fff", "border-color": "#00B398" });
        //     $(".three-steps h5").css({ "color": "#00B398" });
        //
        //     $(".payment-fees").css("display", "none");
        //     $(".final").css("display", "block");
        // });
    </script>
@endsection
