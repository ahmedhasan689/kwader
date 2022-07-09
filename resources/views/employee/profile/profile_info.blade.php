@extends('layouts.front_layout')

@section('page_title', 'إنشاء الحساب')

@section('content')
    <div class="staffOption ">


        <form action="{{ route('profile.set-information') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-lg-7 mb-5">
                    <div class="container">
                        <div class="row mt-5">
                            <h2>
                                ملفك الشخصي

                            </h2>
                            <p>
                                اختر المجالات التي ترغب في العمل بها. سيتم اعتبار اختيارك الأول مجال عملك الرئيسي
                            </p>

                            <div class="one">
                                <h5>مجالاتك</h5>
                                <div class="d-flex oneinter">
                                    <div>
                                        <p>{{ $employee->field->field_name }}</p>
                                        <div class="group">
                                            @foreach($employee->specialization as $special)
                                                <span>
                                                    {{ $special }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two">
                                <h5>المسمى الوظيفي</h5>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" placeholder="مثال: مبرمج،مصمم جرافيك، مدير تسويقي">
                                @error('job_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="three">
                                <h5>البلد</h5>
                                <div style="height: 38px;">
                                    <span id="flag">
                                        <img src="{{ asset('flags/QA.png') }}" style="width: 20px; margin: 10px">
                                    </span>
                                    <select class="form-select @error('country') is-invalid @enderror" name="country" aria-label="Default select example" style="border: none; border-radius: 0;">
                                        <option >الرجاء إختيار الدولة</option>
                                        @foreach( $countries as $country )
                                            <option value="{{ $country->id  }}">
                                                {{ $country->country_name  }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>
                            <div class="four">
                                <h5>سنوات الخبرة</h5>
                                <div class="group mt-3">
                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="2-0سنوات" checked>
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            2-0 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="5-2 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            5-2 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="10-5 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            10-5 سنوات
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="years_of_experience" class="btn-check" value="+10 سنوات">
                                        <span class="btn btn-outline-secondary" style="padding: 8px 15px;">
                                            +10 سنوات
                                        </span>
                                    </label>

                                </div>

                            </div>
                            <div class="five">
                                <h5>المهارات</h5>
                                <p>يرجى الإشارة إلى جميع مهاراتك التي تعتقد أنها ذات صلة وأن العميل قد يبحث عن: البرمجيات /
                                    التقنيات التي تتقنها ، ومجالات
                                    تخصصك ، ومهاراتك الشخصية والإدارية ، وقطاعات العمل التي تكون خبيراً فيها ، إلخ
                                    أي شيء يمكن أن يثير اهتمام أصحاب الاعمال ويساعدهم في العثور على ملفك الشخصي
                                    يحق لك طرح ما يصل إلى 50 مهارة !! كن حذرًا ، يعد الترتيب أمرًا مهمًا: أول 7 مهاره رئيسية
                                    أهم من غيرها ، اخترها بعناية</p>

                                <select class="form-select form-select-lg mb-3 @error('skills') is-invalid @enderror" multiple id="skills" name="skills[]">
                                    @foreach($skills as $skill)
                                        <option>
                                            {{ $skill->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skills')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="six">
                                <h5>
                                    الراتب الشهري
                                </h5>
                                <p>ادخل الراتب التقريبي الذي ترغب في تقاضيه شهريا بدوام كامل ( 7ساعات يوميا/5 أيام في
                                    الأسبوع ). ملاحظة هذا المبلغ قابل
                                    للنقاش
                                    مع صاحب العمل حسب شروط العقد</p>
                                <div>
                                    <input type="number" class="@error('salary') is-invalid @enderror" placeholder="0" name="salary">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                </div>
                                @error('salary')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="seven">
                                <h5>
                                    رقم الهاتف
                                </h5>
                                <p>لن يظهر رقم هاتفك في ملفك الشخصي ولن تتم مشاركته إلّا مع أصحاب الأعمال المتعاقد معهم</p>
                                <div style="border: 1px solid #ccc">
                                    <input type="text" class="form-control phone_number" name="phone_number" style="width: 90%;display: inline;border: none;">
                                    <select name="" class="flag_select" style="height: 38px;border: none;width: 9%;">
                                        <option>
                                            One
                                        </option>
                                        <option>
                                            Two
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="sub d-flex gap-2">
                                <button class="btn btn-light" style="background-color: transparent; color:#ccc;">
                                    <a href="{{ route('profile.specialization') }}" class="back" style="padding: 5px 20px; border-radius: 7px;padding-right: 20px;margin-left: -22px; text-decoration: none">
                                            رجوع
                                    </a>
                                </button>
                                <button type="submit" class="save">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 leftOp d-none d-lg-block">
                    <img style="position:static; width: 50%; left:20%; top: 200px;" src="{{ asset('Front_Assets/img/Group 862.png') }}" alt="">
                </div>
            </div>
        </form>

@endsection
