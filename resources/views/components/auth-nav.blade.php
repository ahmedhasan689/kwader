<nav class="navbar navbar-expand-lg navbar-light t">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('Front_Assets/img/logo.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mu-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('job.create', ['step' => 1]) }}">
                        اضف وظيفة
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ابحث في الوظائف</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="howWork.html">كيف يعمل؟</a>
                </li>
            </ul>
            <form class="d-flex ">
                <!-- Button trigger modal -->
                <i style="color:#fff ;" class="fas fa-search white"></i>

                <button type="button" class="btn  login-button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdropLogin">
                    دخول
                </button>
                <button type="button" class="btn sign-button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdropSign">
                    تسجيل
                </button>
                <span>العربية</span>


                <!-- Modal -->
                <div class="modal fade" id="staticBackdropLogin" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            <h5 class="modal-title mt-5" id="staticBackdropLabel">تسجيل الدخول</h5>
                            <span style="color:#000 ;">ليس لديك حساب؟ <a href="">اشترك الان</a></span>
                            <div class="modal-body">
                                <div class="social">
                                    <button class="facebook"><a href="">الدخول عن طريق فيسبوك</a></button>

                                    <button class="google"><a href="">الدخول عن طريق جوجل</a></button>
                                </div>
                                <hr>
                                <form>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="البريد الالكتروني"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="mb-3">
                                        <input type="password" placeholder="كلمة المرور" class="form-control"
                                               id="exampleInputPassword1">
                                    </div>

                                    <a class="btn loss" data-bs-toggle="modal" data-bs-target="#return"
                                       href="#">فقدت
                                        كلمة المرور؟</a>
                                    <div class="mb-3 form-check ">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary click">دخول</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdropSign" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            <h5 class="modal-title mt-5" id="staticBackdropLabel">إنشاء حساب جديد</h5>
                            <span style="color:#000 ;">لديك حساب على كوادر.كوم <a href="">تسجيل الدخول</a></span>
                            <div class="modal-body">
                                <div class="social">
                                    <button class="facebook"><a href=""> <i
                                                class="fab fa-facebook-square"></i>الدخول عن
                                            طريق
                                            فيسبوك</a></button>

                                    <button class="google"><a href=""> <i class="fab fa-google"></i>الدخول عن طريق
                                            جوجل</a></button>
                                </div>
                                <hr>
                                <form>
                                    <div class="mb-3 d-flex gap-2">
                                        <input type="text" class="form-control" placeholder="الاسم"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <input type="text" class="form-control" placeholder="اسم العائلة"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="البريد الالكتروني"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="mb-3">
                                        <input type="password" placeholder="كلمة المرور" class="form-control"
                                               id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" placeholder="تأكيد كلمة المرور" class="form-control"
                                               id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check ">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">قرأت شروط استخدام
                                            كوادر.كوم و بيان الخصوصية</label>
                                    </div>

                                    <button type="button" class="btn click" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropOption" onclick="hidden">
                                        سجل الان </button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdropOption" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">

                            <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            <img class="mt-5" style="width:70px; height: 70px; margin: 0 auto;"
                                 src="./img//Group 404.png" alt="">
                            <h5 class="modal-title" id="staticBackdropLabel">اختر نوع الحساب</h5>
                            <div class="modal-body">

                                <button class="owner"><a href="">صاحب عمل (أبحث عن كوادر لتوظيفها)</a></button>
                                <br>
                                <button class="staff"><a href="">كادر (أبحث عن عروض توظيف)</a></button>


                            </div>


                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="return" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">

                            <button type="button" class="btn-close close " data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            <div class="modal-body mt-5">
                                <h3>إعادة تعيين كلمة المرور الخاصة بك</h3>
                                <p>أدخل عنوان البريد الإلكتروني المرتبط بحسابك ، وسنرسل لك عبر البريد الإلكتروني
                                    رابطًا
                                    لإعادة تعيين كلمة المرور الخاصة بك</p>
                                <input type="text" placeholder="البريد الالكتروني">
                                <button type="button" class="btn click" data-bs-toggle="modal"data-bs-target="#staticBackdropOption" onclick="hidden">
                                    سجل الان
                                </button>

                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
