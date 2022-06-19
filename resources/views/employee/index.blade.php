@extends('layouts.front_layout')

@section('page_title', 'الملف الشخصي')

@section('content')
    <div class="profile staffProfile">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="cardRight1 text-center">

                        <div>
                            <img class="personalPhoto" src="{{ $employee->image }}" alt="">
                        </div>
                        <h4>
                            {{ $employee->user->first_name . ' ' . $employee->user->last_name }}
                        </h4>
                        <p>
                            {{ $employee->job_title }}
                        </p>
                        <hr>
                        <a href="">تعديل ملفي الشخصي</a>

                    </div>
                    <div class="cardRight2 mt-4">
                        <h4>احصائياتي</h4>
                        <hr>
                        <div class="d-flex" style="justify-content:space-between ;">
                            <div><img src="{{ asset('Front_Assets/img/Group 1795.png') }}" alt="">
                                <span>الظهور في نتائج البحث</span>
                            </div>
                            <div><span>10</span></div>

                        </div>
                        <hr>
                        <div class="d-flex" style="justify-content:space-between ;">
                            <div><img src="{{ asset('Front_Assets/img/Group 1796.png') }}" alt="">
                                <span>مشاهدة الملف الشخصي</span>
                            </div>
                            <div><span>20</span></div>

                        </div>
                        <hr>
                        <div class="d-flex" style="justify-content:space-between ;">
                            <div><img src="{{ asset('Front_Assets/img/Group 1798.png') }}" alt="">
                                <span>الرسائل الواردة</span>
                            </div>
                            <div><span>30</span></div>

                        </div>
                        <hr>
                        <div class="d-flex" style="justify-content:space-between ;">
                            <div><img src="{{ asset('Front_Assets/img/Path 2046.png') }}" alt="">
                                <span>الإضافة إلى المفضلة</span>
                            </div>
                            <div><span>150</span></div>

                        </div>
                        <hr>
                        <div class="d-flex" style="justify-content:space-between ;">
                            <div><img src="{{ asset('Front_Assets/img/Group 1799.png') }}" alt="">
                                <span>الوظائف المقترحة</span>
                            </div>
                            <div><span>20</span></div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card1 d-flex">
                        <div class="off">
                            <p>عزّز فرصك في البحث عن عمل مع حساب بريميوم</p>
                            <ul>
                                <li><i class="fas fa-check-circle"></i>
                                    الظهور في نتائج البحث</li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    ضع سيرتك على رأس لائحة طلبات المرشحين
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    اكتشف من شاهد سيرتك الذاتية غير محدود
                                </li>
                            </ul>
                            <button>
                                اشترك الآن
                            </button>
                        </div>
                        <div>
                            <img src="{{ asset('Front_Assets/img/Group 1792.png') }}" alt="">
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
                                <a class="nav-link active" aria-current="page" href="#"> <img
                                        src="{{ asset('Front_Assets/img/Ellipse 306.png') }}" alt=""> المفتوحة</a>
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
                    <div class="recent">
                        <div class="title">
                            <span>وظائفي</span>
                            <a href="">جميع الوظائف</a>
                        </div>
                        <hr>
                        <ul>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>

                            </li>
                            <hr>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>
                            </li>
                            <hr>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>
                            </li>
                            <hr>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>
                            </li>
                            <hr>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>
                            </li>
                            <hr>
                            <li>
                                <span>Graphic Designer</span>
                                <div class="d-flex gap-3">
                                    <div>
                                        <i class="fas fa-clock"></i>
                                        منذ 4 أيام
                                    </div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        70مترشح
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card3">
                        <div class="d-flex title">
                            <span>كيف سيساعدك كوادر.كوم في البحث عن أفضل فرص العمل في الشرق الأوسط
                                وشمال إفريقيا</span>
                            <a href="">اقرأ المزيد</a>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3 text-center">
                                <img src="{{ asset('Front_Assets/img/Group 412.png') }}" alt="">
                                <p>أنشئ حساب كادر</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 431.png') }}" alt="">
                                <p>التَّقدم لوظيفة</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 432.png') }}" alt="">
                                <p>التفاوض مع صاحب العمل</p>
                            </div>
                            <div class="col-3  text-center">
                                <img src="{{ asset('Front_Assets/img/Group 384.png') }}" alt="">
                                <p>وقّع العقد</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>
@endsection
