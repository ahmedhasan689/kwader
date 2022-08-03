<!doctype html>
<html lang="en">

    <x-head />

    <body>

        @guest
            <x-navbar />
        @endguest

        @auth
            <x-auth-nav />
        @endauth

        @yield('content')






    </body>
    <footer>
        <div class="container">
            <div class="row pt-5 pb-2 text-center text-sm-start">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>كوادر.كوم</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="{{ route('page.whom') }}">عن كوادر.كوم</a>
                        <a class="nav-link" href="{{ route('page.terms') }}">إرشادات الاستخدام</a>
                        <a class="nav-link" href="#">بيان الخصوصية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>الكادر</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">انضمَّ إلينا</a>
                        <a class="nav-link" href="#">ابحث عن وظيفة</a>
                        <a class="nav-link" href="#">كوادر بريميوم</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>صاحب العمل</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">أنشئ حسابك الآن</a>
                        <a class="nav-link" href="#">أعلن عن وظيفة</a>
                        <a class="nav-link" href="{{ route('page.subscriptions') }}">بطاقات العضوية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>تابعنا على</h5>
                    <div
                        class="social-icon d-flex align-items-center justify-content-center justify-content-sm-start mt-3 gap-4">
                        <a href="#" style="text-decoration: none;">
                            <span>
                                <i class="fa-brands fa-twitter"></i>
                            </span>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <span>
                                <i class="fa-brands fa-linkedin-in"></i>
                            </span>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <span>
                                <i class="fa-brands fa-facebook-f"></i>
                            </span>
                        </a>
                    </div>
                    <div class="mt-3">
                        <nav class="nav flex-column align-items-center align-items-sm-start" style="margin-top: 35px;">
                            <a class="nav-link" href="{{ route('page.contactUs') }}">
                                تواصل معنا
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="last-footer py-4">
            © 2022 كوادر.كوم جميع الحقوق محفوظة
        </div>
    </footer>
    <x-footer-script />

</html>
