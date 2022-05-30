@extends('layouts.front_layout')

@section('page_title', 'كوادر')

@section('content')
    <div class="inp">
        <input type="text" placeholder="ابحث عن">
    </div>

    <div class="heroSection">
        <div class="heroSection-content">
            <h1>
                وظِّف أفضل كوادر الشرق الأوسط وشمال إفريقيا
            </h1>
            <p>
                أعلن عن وظائفك الشاغرة و عيِّن عن بعد أكفأ الخبرات التي تحتاجها للعمل
            </p>
            <div>
                <button class="add-button">
                    أضف وظيفة مقابل 50$
                </button>
                <button type="button" class="btn sign-button" data-bs-toggle="modal" data-bs-target="#staticBackdropSign">
                    أنشئ حسابك الآن
                </button>
            </div>
        </div>

    </div>

    <section class="search-job">
        <div class="container">
            <div class="d-flex more" style="">
                <h2>ابحث عن أحدث الوظائف في مجالك</h2>

                <button class="morebut" style="">اطّلع
                    المزيد</button>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 266.png') }}" alt="">
                        <h6>تكنولوجيا المعلومات</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 256.png') }}" alt="">
                        <h6>برمجة و تطوير</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 257.png') }}" alt="">
                        <h6>هندسة و علوم</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 255.png') }}" alt="">
                        <h6>تسويق و مبيعات</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 262.png') }}" alt="">
                        <h6>فن و تصميم</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 253.png') }}" alt="">
                        <h6>كتابة و ترجمة</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 251.png') }}" alt="">
                        <h6>دعم فني</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('Front_Assets/img/Group 259.png') }}" alt="">
                        <h6>محاسبة و مالية</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start how-work section -->
    <section class="how-work">
        <div class="container">
            <div class="d-flex more">
                <h2>كيف يعمل كوادر.كوم؟</h2>

                <button class="morebut" style="border-radius: 5px;">اطّلع
                    المزيد</button>
            </div>

            <div class="row text-center">
                <div class="col-lg-4 card">
                    <img src="{{ asset('Front_Assets/img/Group 383.png')}}" alt="">
                    <span>أضف إعلانك</span>
                    <p>أضف تفاصيل العمل والمهارات المطلوبة لإنجازه وابدأ باستقبال عروض الكوادر</p>
                </div>
                <div class="col-lg-4 card">
                    <img src="{{ asset('Front_Assets/img/Group 381.png') }}" alt="">
                    <span>اختر الكادر المناسب</span>
                    <p>من بين العروض المقدمة أو من خلال بحثك الفردي داخل الموقع، اختر العرض المناسب لمتطلبات الوظيفة
                        المطلوبة</p>
                </div>
                <div class="col-lg-4 card">
                    <img src="{{ asset('Front_Assets/img/Group 384.png') }}" alt="">
                    <span>وقّع العقد</span>
                    <p>بعد الاتفاق على الراتب ومكان العمل، يوقّع كلا الطرفين على العقد الخاص بالموقع ومن ثم يتمّ دفع
                        الراتب المتفق عليه</p>
                </div>
            </div>
        </div>
    </section>

    <!-- card-membership -->
    <section class="card-membership ">
        <div class="container">
            <h2>بطاقات العضوية</h2>
            <p>قم باختيار أيٍ من برامج العضوية المتوفرة لدينا وتمتع بتخفيضات حصرية وهدايا قيمة</p>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <span>العضوية المهنية</span>
                        <h5>$46</h5>
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                            شراء البطاقة
                        </button>
                        <ul>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                تمتع بإعلان مدفوع

                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                وَفِّر 4$
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                فُز بهدايا قيمة

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <span>العضوية الفضية</span>
                        <h5>$91</h5>
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                            شراء البطاقة
                        </button>
                        <ul>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                تمتع بإعلانين مدفوعين

                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                وَفِّر 9$
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                فُز بهدايا قيمة

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <span>العضوية الذهبية</span>
                        <h5>$182</h5>
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                            شراء البطاقة
                        </button>
                        <ul>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                تمتع ب4 اعلانات مدفوعة مع امكانية البحث الفردي داخل الموقع

                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                وَفِّر 18$
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                فُز بهدايا قيمة

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <span>العضوية الذهبية</span>
                        <h5>$365</h5>
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#payment">
                            شراء البطاقة
                        </button>
                        <ul>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                تمتع ب4 اعلانات مدفوعة مع امكانية البحث الفردي داخل الموقع

                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                وَفِّر 35$
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                فُز بهدايا قيمة

                            </li>
                        </ul>
                    </div>
                </div>
                <div style="width:100% ; padding:0;" class="modal fade" id="payment" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content text-center">

                            <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                aria-label="Close"></button>


                            <div class="row" style="width:100% ;">
                                <div class="col-4">
                                    <div class="right">
                                        <div class="card">
                                            <span>مجموع الدفع</span>
                                            <h5>$46</h5>
                                        </div>
                                        <p>كيف تريد أن تدفع</p>
                                    </div>

                                </div>
                                <div class="col-4 center">
                                    <h5>تفاصيل الدفع الخاصة بك</h5>
                                    <form>
                                        <div class="mb-3 d-flex gap-2" style="flex-direction:column ;">
                                            <label for="#name">اسمك كما في البطاقة الائتمانية</label>
                                            <input type="text" class="form-control" id="name"
                                                aria-describedby="emailHelp">

                                        </div>
                                        <div class="mb-3">
                                            <label for="#numb">رقم البطاقة</label>

                                            <input type="text" class="form-control" placeholder="البريد الالكتروني"
                                                id="numb" aria-describedby="emailHelp">

                                        </div>
                                        <div class="mb-3 d-flex gap-2">
                                            <div><label for="#date">تاريخ انتهاء الصلاحية </label>

                                                <input type="date" placeholder="كلمة المرور" class="form-control"
                                                    id="date">
                                            </div>
                                            <div>
                                                <label for="#cvv">CVV</label>

                                                <input type="text" placeholder="كلمة المرور" class="form-control"
                                                    id="cvv">
                                            </div>

                                        </div>

                                        <div class="mb-3 form-check ">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">احفظ البطاقة لتسهيل
                                                الدفع في المستقبل</label>
                                        </div>

                                        <button type="button" class="btn click" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropOption">
                                            ادفع الان</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <img style="width: 100%;" class="w-100%" src="./img/Group 734.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search job -->
    <section class="search-job search-job-bb ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <h2 class="mb-3">هل تبحث عن وظيفة</h2>
                    <p>سجّل مجاناً، وستصلك آخر الإعلانات عن الوظائف الشاغرة في الشرق الأوسط وشمال إفريقيا
                    </p>
                    <ul class="mt-5">
                        <li>وظائف عن بعد في مختلف المجالات</li>
                        <li>عقود عمل بثلاثة أشهر بدوام كامل أو جزئي</li>
                        <li>خدمة بسيطة وآمنة: إدارة أفضل للوقت والمجهود وضمان
                            للدفع عند توقيع العقد</li>
                    </ul>
                    <div>
                        <button class="add-button">أنشئ حسابك الان</button>
                        <button>اقرأ المزيد</button>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image">
                        <img src="{{ asset('Front_Assets/img/Group 832.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

