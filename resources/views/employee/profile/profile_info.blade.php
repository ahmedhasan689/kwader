@extends('layouts.front_layout')

@section('page_title', 'إنشاء الحساب')

@section('content')
    <div class="staffOption ">


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
                            <input type="text" placeholder="مثال: مبرمج،مصمم جرافيك، مدير تسويقي ">
                        </div>
                        <div class="three">
                            <h5>البلد</h5>
                            <div>
                                <span id="flag">
                                    <img src="{{ asset('flags/QA.png') }}">
                                </span>
                                <select class="form-select" name="country" aria-label="Default select example" style="border-radius: 0;">
                                    <option selected>الرجاء إختيار الدولة</option>
                                    @foreach( $countries as $country )
                                        <option value="{{ $country->id  }}">
                                            {{ $country->country_name  }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class="four">
                            <h5>سنوات الخبرة</h5>
                            <div class="group mt-3">
{{--                                <select>--}}
{{--                                    --}}
{{--                                </select>--}}
                                <span>
                                    2-0سنوات
                                </span>
                                <span>5-2سنوات</span>
                                <span>10-5سنوات</span>
                                <span>+10سنوات</span>

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
                            <div><span class="spanFive"> 2-0سنوات <i class="fas fa-times-circle"></i></span></div>
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
                                <input type="number" placeholder="0">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </div>

                        </div>
                        <div class="seven">
                            <h5>رقم الهاتف
                            </h5>
                            <p>لن يظهر رقم هاتفك في ملفك الشخصي ولن تتم مشاركته إلّا مع أصحاب الأعمال المتعاقد معهم</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1"></option>

                            </select>
                        </div>
                        <div class="sub d-flex gap-2">
                            <button class="back">رجوع</button>
                            <button class="save">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 leftOp d-none d-lg-block">
                <img style="position:fixed; width: 30%; left:20%; top: 200px;" src="{{ asset('Front_Assets/img/Group 862.png') }}" alt="">
            </div>


        </div>








        <script src="js/main.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
            integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
            crossorigin="anonymous"></script> -->
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
            integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
            crossorigin="anonymous"></script> -->

        <script src="https://kit.fontawesome.com/5427831588.js" crossorigin="anonymous"></script>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            -->
@endsection
