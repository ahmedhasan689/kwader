@extends('layouts.front_layout')

@section('page_title', 'الإعدادات')

@section('content')

    <div class="setting-page">
        <div class="d-flex align-items-start gap-3">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link active" id="v-pills-information-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-information" type="button" role="tab" aria-controls="v-pills-information"
                        aria-selected="true">
                    <i class="fa-solid fa-user" style="margin-left: 8px; font-size: 20px"></i>
                    المعلومات الشخصية
                </button>
                <button class="nav-link" id="v-pills-gmail-tab" data-bs-toggle="pill" data-bs-target="#v-pills-gmail"
                        type="button" role="tab" aria-controls="v-pills-gmail" aria-selected="false">
                    <i class="fa-solid fa-at" style="margin-left: 8px; font-size: 20px"></i>
                    البريد الالكتروني
                </button>

                <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">
                    <i class="fa-solid fa-lock" style="margin-left: 8px; font-size: 20px"></i>
                    كلمة المرور
                </button>
                <button class="nav-link" id="v-pills-phone-tab" data-bs-toggle="pill" data-bs-target="#v-pills-phone"
                        type="button" role="tab" aria-controls="v-pills-sphone" aria-selected="false">
                    <i class="fa-solid fa-mobile-screen" style="margin-left: 8px; font-size: 20px"></i>
                    رقم الجوال
                </button>
                <button class="nav-link" id="v-pills-notification-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-notification" type="button" role="tab" aria-controls="v-pills-notification"
                        aria-selected="false">
                    <i class="fa-solid fa-bell" style="margin-left: 8px; font-size: 20px"></i>
                    الاشعارات
                </button>
                <button class="nav-link" id="v-pills-delete-tab" data-bs-toggle="pill" data-bs-target="#v-pills-delete"
                        type="button" role="tab" aria-controls="v-pills-delete" aria-selected="false">
                    <i class="fa-solid fa-trash" style="margin-left: 8px; font-size: 20px"></i>
                    حذف الحساب
                </button>
            </div>
            <div class="tab-content pt-5" style="width:80%;" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-information" role="tabpanel"
                     aria-labelledby="v-pills-information-tab" tabindex="0">
                    <div class="row info-page">
                        <div class="col-lg-6">
                            <form style="height:300px ;">
                                <h4>المعلومات الشخصية</h4>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">الاسم</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">اسم العائلة</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="submit-button">
                                    <button type="submit" class="btn btn-primary">حفظ</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="" style="height:300px ;">
                                <h4>
                                    صورتي
                                </h4>
                                <a href="#" style="display: flex; align-items:center; margin-top: 50px;">
                                    <div class="image mb-5">
                                        <img src="{{ asset('Front_Assets/img/Group 1940.png') }}" alt="">
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <i class="fas fa-camera"></i>
                                            </label>

                                            <input id="file-input" type="file" />
                                        </div>


                                        <div class="background">
                                        </div>

                                    </div>
                                </a>

                            </form>
                        </div>
                    </div>
                    <div class="row info-page mt-3">

                        <form class="info-page2">
                            <h4>
                                المعلومات العامة
                            </h4>
                            <div class="d-flex">
                                <div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">تاريخ الميلاد</label>
                                        <input type="date" class="form-control" id="date" aria-describedby="emailHelp">

                                    </div>
                                    <div class="mb-3">
                                        <label for="country" class="form-label">الدولة</label>
                                        <input type="text" class="form-control" id="country">
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 ">
                                        <label for="sex" class="form-label">الجنس</label>

                                        <select class="form-select" aria-label="Default select sex">
                                            <option selected>ذكر</option>
                                            <option value="1">أنثى</option>

                                        </select>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="language" class="form-label">اللغة</label>

                                        <select class="form-select" aria-label="Default select language">
                                            <option selected>العربية</option>
                                            <option value="1">english</option>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="submit-button"><button type="submit" class="btn btn-primary">حفظ</button>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-gmail" role="tabpanel" aria-labelledby="v-pills-gmail-tab"
                     tabindex="0">
                    <div class="row info-page ">
                        <form class="info-page2">
                            <h4>
                                البريد الإلكتروني
                            </h4>
                            <div class="d-flex">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>

                            <div class="submit-button"><button type="submit" class="btn btn-primary">حفظ</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab"
                     tabindex="0">

                    <div class="row info-page">
                        <form class="mb-2">
                            <h4>
                                تغيير كلمة المرور
                            </h4>
                            <div class="info-page2">
                                <div class="d-flex">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword5" class="form-label">كلمة المرور
                                            الحالية</label>
                                        <input type="password" class="form-control" id="exampleInputPassword5">
                                    </div>
                                </div>
                            </div>

                            <div class="info-page2">
                                <div class="d-flex">

                                    <div class="mb-3">
                                        <label for="exampleInputPassword6" class="form-label">كلمة المرور
                                            الجديدة</label>
                                        <input type="password" class="form-control" id="exampleInputPassword6">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword7" class="form-label"> تأكيد كلمة المرور
                                            الجديدة</label>
                                        <input type="password" class="form-control" id="exampleInputPassword7">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="tab-pane fade " id="v-pills-phone" role="tabpanel" aria-labelledby="v-pills-phone-tab"
                     tabindex="0">
                    <div class="row info-page">
                        <form>
                            <h4>
                                تأكيد رقم الجوال</h4>
                            <div class="info-page2">
                                <div class="d-flex align-items-center">
                                    <div class="mb-3">
                                        <label for="phoneenumber" class="form-label">رقم الجوال</label>
                                        <input type="password" class="form-control" id="phoneenumber">
                                    </div>
                                    <div class="submit-button">
                                        <button type="submit" class="btn btn-primary" style="height:40px;">
                                            حفظ
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="info-page2">
                                <p style="margin-right:40px; width:40%; color:gray;">
                                    لتلقي إشعارات الرسائل عن طريق خدمة الإرساليات القصيرة لن يتم إفشاء رقم هاتفك للمستخدمين الآخرين الموقع
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-notification" role="tabpanel"
                     aria-labelledby="v-pills-notification-tab" tabindex="0">
                    <div class="row info-page">
                        <form>
                            <h4>
                                الاشعارات البريدية
                            </h4>

                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    الموافقة على وظيفة قيد المراجعة
                                </label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    استقبال طلبات جديدة للتوظيف
                                </label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1">
                                <label class="form-check-label" for="flexCheckChecked1">
                                    ملخص أسبوعي عن عملية التوظيف الجارية </label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                                <label class="form-check-label" for="flexCheckChecked2">
                                    توقيع الكادر على العقد </label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3">
                                <label class="form-check-label" for="flexCheckChecked3">
                                    موافقة الموقع على عقد قيد المراجعة</label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4">
                                <label class="form-check-label" for="flexCheckChecked4">
                                    إتمام المعاملات المالية</label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked5">
                                <label class="form-check-label" for="flexCheckChecked5">
                                    مصادقة الموقع على عقد العمل</label>
                            </div>
                            <div class="form-check" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4">
                                <label class="form-check-label" for="flexCheckChecked4">
                                    جديد الخصومات والعروض الخاصة بالموقع</label>
                            </div>
                            <div class="submit-button"><button type="submit" class="btn btn-primary">حفظ</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab"
                     tabindex="0">
                    <div class="row info-page">
                        <form action="">
                            <h4>
                                احذف حسابي
                            </h4>
                            <div class="sec1">
                                <p>نحن اسفون على مغادرتك موقعنا</p>
                                <p>
                                    الرجاء مساعدتنا في تقييم خدماتنا حتى نتمكن من تطوير موقعنا
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        أتلقى الكثير من رسائل البريد الالكتروني من موقعكم </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        لم أجد وظيفة مناسبة عبر موقعكم </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1">
                                    <label class="form-check-label" for="flexCheckChecked1">
                                        لم أستوعب كيفية استخدام الموقع</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                                    <label class="form-check-label" for="flexCheckChecked2">
                                        أسباب أخرى</label>
                                </div>
                            </div>
                            <hr>
                            <div class="sec2">
                                <h6 style="font-size:22px;">يمكنك أن تشرح لنا أكثر</h6>
                                <textarea style="width:80%; border-color: rgba(128, 128, 128, 0.46);" name="" id=""
                                          cols="30" rows="10"></textarea>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        حدد هذه الخانة إذا كنت لا ترغب في الاتصال بك لإعطاء مزيد من التفاصيل حول أسباب
                                        مغادرتك موقع كوادر.كوم</label>
                                </div>
                            </div>
                            <br> <br>
                            <div class="sec3">
                                <h5>كيف سيتم حذف حسابك؟
                                </h5>
                                <p>أولاً، سنقوم بالتأكد من استيفائك لكافة معاملاتك المالية على موقعنا
                                </p>
                                <p>ثانياً، سنحذف حسابك من قاعدة بيانات موقع كوادر.كوم ، إلى جانب بيانات التعريف وسجل
                                    التصفح الخاص بك
                                    وإذا لزم الأمر، سنحذف التعليقات والآراء التي تركتها أو استلمتها على موقعنا
                                </p>
                                <p>أخيراً، سيتم حذف حسابك نهائيًا. لذا لن تتمكن بعد الآن من الوصول إلى العقود الخاصة بك،
                                    فيرجى تنزيلها مسبقاً من حسابك قبل
                                    إلغائه (لقد استلمتها أيضًا عن طريق البريد الالكتروني)
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
