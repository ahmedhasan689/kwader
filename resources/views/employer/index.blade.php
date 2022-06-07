@extends('layouts.front_layout')

@section('page_title', 'الملف الشخصي')

@section('content')
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="cardRight1 text-center">

                        <div>
                            <img class="personalPhoto" src="{{ asset('Front_Assets/img/Group 1940.png') }}" alt="">

                            <label for="file-input">
                                <img class="camera" src="{{ asset('Front_Assets/img/photo-camera (1).png') }}" alt="">
                            </label>

                            <input id="file-input" type="file" />
                        </div>
                        <h4>
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </h4>
                        <hr>
                        <a href="{{ route('company.index') }}">
                            تعديل صفحة شركتي
                        </a>

                    </div>
                    <div class="cardRight2 mt-4">
                        <h4>ابدأ التوظيف على كوادر</h4>
                        <hr>
                        <div class="d-flex">
                            <span>أضف صورة الملف الشخصي</span>
                            <div class="add">+</div>
                        </div>
                        <div class="d-flex">
                            <span>أضف رقم هاتف</span>
                            <div class="add">+</div>
                        </div>
                        <div class="d-flex">
                            <span>أكمل معلومات شركتي</span>
                            <div class="add">+</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card1 d-flex">
                        <div class="off">
                            <p>قم باختيار أي من برامج العضوية المتوفرة لدينا وتمتع بتخفيضات حصرية وهدايا قيمة</p>
                            <button>
                                اطّلع على عروضنا
                            </button>
                        </div>
                        <div>
                            <img src="{{ asset('Front_Assets/img/Group 1613.png') }}" alt="">
                        </div>
                    </div>
                    <div class="card2">
                        <div class="title">
                            <span>وظائفي</span>
                            <a href="">جميع الوظائف</a>
                        </div>
                        <hr>
                        <div class="d-flex cont">
                            <nav class="nav flex-column">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <img src="{{ asset('Front_Assets/img/Ellipse 306.png') }}" alt="">
                                    المفتوحة
                                </a>
                                <a class="nav-link" href="#">
                                    <img src="{{ asset('Front_Assets/img/Group 1507.png') }}" alt="">
                                    قيد المراجعة
                                </a>
                                <a class="nav-link" href="#">
                                    <img src="{{ asset('Front_Assets/img/Group 1506.png') }}" alt="">
                                    المكتملة
                                </a>
                                <a class="nav-link " href="#">
                                    <img src="{{ asset('Front_Assets/img/Group 1505.png') }}" alt="">
                                    الملغاة
                                </a>
                            </nav>
                            <div>

                                <img src="{{ asset('Front_Assets/img/Group 1508.png') }}" alt="">
                                <p>لا توجد أي وظيفة قيد المراجعة</p>
                            </div>
                        </div>
                    </div>
                    <div class="card3">
                        <div class="d-flex title">
                            <span>كيف سيساعدك كوادر.كوم في توظيف أفضل كوادر الشرق الأوسط
                                وشمال إفريقيا</span>
                            <a href="">اقرأ المزيد</a>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3 text-center">
                                <img src="{{ asset('Front_Assets/img/Group 1508.png') }}" alt="">
                                <p>أضف إعلانك</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 381.png') }}" alt="">
                                <p>اختر الكادر المناسب</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 426.png') }}" alt="">
                                <p>تواصل مع الكوادر</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 384.png') }}" alt="">
                                <p>وقّع العقد</p>
                            </div>
                        </div>

                    </div>
                    <section class="card-membership ">
                        <div class="card4">
                            <div class="d-flex title">
                                <span>
                                    اختر العضوية المناسبة
                                </span>
                                <a href="">اقرأ المزيد</a>
                            </div>


                            <div class="row text-center">
                                <div class="col-lg-3 col-md-6">
                                    <div class="card ">
                                        <span>العضوية المهنية</span>
                                        <h5>$46</h5>
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#payment">
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
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#payment">
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
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#payment">
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
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#payment">
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
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>
@endsection
