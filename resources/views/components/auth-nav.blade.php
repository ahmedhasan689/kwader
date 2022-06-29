
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container position-relative">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="order-lg-last">
            <div class="navbar-icons d-flex align-items-center gap-3 gap-md-4">
                <div class="search">
                    <input type="search" class="input" placeholder="ابحث...">
                    <a class="link-light srch-link">
                        <i style="color:#fff ;" class="fas fa-search white"></i>
                    </a>
                </div>

                <div>
                    <a class="link-light">
                        <i class="far fa-heart" style="color:#fff"></i>
                    </a>
                </div>

                <div>
                    <a class="link-light">
                        <i class="far fa-envelope" style="color:#fff"></i>
                    </a>
                </div>

                <x-front-notification />

                <div class="vr d-none d-lg-block" style="color:#fff"></div>

                <div class="btn-group d-none d-lg-block">
                    <a class="link-light" data-bs-toggle="dropdown" data-bs-display="static"
                       aria-expanded="false">
                        <i class="fas fa-ellipsis-v " style="color:#fff; font-size: large;" aria-expanded="false"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button class="dropdown-item" type="button">
                                <i class="fa-solid fa-circle-info"></i>
                                مساعدة
                            </button>
                        </li>
                        <li><button class="dropdown-item" type="button"><i class="fa-solid fa-gear"></i>اعدادات الحساب</button></li>
                        <li><button class="dropdown-item" type="button"><i class="fa-solid fa-globe"></i>language</button></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="dropdown-item" type="submit">
                                    <i class="fa-solid fa-power-off"></i>
                                    تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('Front_Assets/img/logo.png') }}" alt="logo">
        </a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
             aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header mt-3">
                <img class="offcanvas-title" src="images/logo.png" alt="WatinPlus" width="150">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close">&times;</button>
            </div>
            <ul class="offcanvas-body navbar-nav gap-3 me-lg-auto text-center mb-2 mb-lg-0">
{{--                <li class="nav-item">--}}
{{--                    @if(auth()->user()->user_type == 'Employer')--}}
{{--                        <a class="nav-link active" href="{{ route('employer.dashboard.index', ['id' => auth()->user()->id]) }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown"--}}
{{--                           aria-expanded="false">--}}
{{--                            الصفحة الشخصية--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <li><a class="dropdown-item" href="#">الملف الشخصي</a></li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li><a class="dropdown-item" href="#">العقود والمعاملات المالية</a></li>--}}
{{--                        </ul>--}}
{{--                    @else--}}
{{--                        <a class="nav-link active" href="{{ route('employee.dashboard.index', ['id' => auth()->user()->id]) }}">--}}
{{--                            الصفحة الشخصية--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <li><a class="dropdown-item" href="#">الملف الشخصي</a></li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li><a class="dropdown-item" href="#">العقود والمعاملات المالية</a></li>--}}
{{--                        </ul>--}}
{{--                    @endif--}}
{{--                </li>--}}
                @if(auth()->user()->user_type == 'Employer')
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        الصفحة الشخصية
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('employer.dashboard.index', ['id' => auth()->user()->id]) }}">الملف الشخصي</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">العقود والمعاملات المالية</a></li>
                    </ul>
                </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            الصفحة الشخصية
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('employee.dashboard.index', ['id' => auth()->user()->id]) }}">الملف الشخصي</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">العقود والمعاملات المالية</a></li>
                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    @if(auth()->user()->user_type == 'Employer')
                         <a class="nav-link" href="#">
                             أبحث عن كوادر
                         </a>
                    @else
                        <a class="nav-link" href="{{ route('job.index') }}">
                            البحث عن وظائف
                        </a>
                    @endif

                </li>
                <li class="nav-item">
                    @if(auth()->user()->user_type == 'Employer')
                        <a class="nav-link" href="{{ route('job.index') }}">
                            الوظائف
                        </a>
                    @else
                        <a class="nav-link" href="#">
                            طلبات التوظيف
                        </a>
                    @endif
                </li>
                @if(auth()->user()->user_type == 'Employer')
                    <a href="{{ route('job.create', ['step' => 1]) }}" class="btn main-btn">
                        أضف وظيفة
                    </a>
                @else
                    <button class="btn main-btn">
                        الترقية إلى بريميوم
                    </button>
                @endif
            </ul>

            <hr class="d-block d-lg-none">

            <ul class="last-nav d-block d-lg-none">
                <a class="nav-link" href="#">مساعدة</a>
                <a class="nav-link" href="#">اعدادات الحساب</a>
                <a class="nav-link" href="#">اللغة language</a>
                <a class="nav-link" href="#">
                    تسجيل الخروج
                </a>
            </ul>
        </div>
    </div>
</nav>
{{-- <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container position-relative">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="order-lg-last">
            <div class="navbar-icons d-flex align-items-center gap-3 gap-md-4">
                <div class="search">
                    <input type="search" class="input" placeholder="ابحث...">
                    <a class="link-light srch-link">
                        <i style="color:#fff ;" class="fas fa-search white"></i>
                    </a>
                </div>

                <div>
                    <a class="link-light">
                        <i class="far fa-heart" style="color:#fff"></i>
                    </a>
                </div>

                <div>
                    <a class="link-light position-relative">
                        <i class="far fa-envelope" style="color:#fff"></i>
                        <span class="badge rounded-pill bg-danger position-absolute start-0 translate-middle"
                              style="top:6px">7</span>
                    </a>
                </div>

                <x-front-notification />

                <div class="vr d-none d-lg-block" style="color:#fff"></div>

                <div class="btn-group d-none d-lg-block">
                    <a class="link-light" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class="fas fa-ellipsis-v " style="color:#fff" aria-expanded="false"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button class="dropdown-item" type="button">
                                <i class="fa-solid fa-circle-info"></i>
                                مساعدة
                            </button>
                        </li>
                        <li><button class="dropdown-item" type="button"><i class="fa-solid fa-gear"></i>اعدادات الحساب</button></li>
                        <li><button class="dropdown-item" type="button"><i class="fa-solid fa-globe"></i>language</button></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="dropdown-item" type="submit">
                                    <i class="fa-solid fa-power-off"></i>
                                    تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="navbar-brand" href="/">
            <img src="{{ asset('Front_Assets/img/logo.png') }}" alt="كوادر" width="120">
        </a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
             aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header mt-3">
                <img class="offcanvas-title" src="images/logo.png" alt="WatinPlus" width="150">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close">&times;</button>
            </div>
            <ul class="offcanvas-body navbar-nav gap-3 me-lg-auto text-center mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        الصفحة الشخصية
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">الملف الشخصي</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">العقود والمعاملات المالية</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if(auth()->user()->user_type == 'Employer')
                         <a class="nav-link" href="#">
                             أبحث عن كوادر
                         </a>
                    @else
                        <a class="nav-link" href="#">
                            البحث عن وظائف
                        </a>
                    @endif

                </li>
                <li class="nav-item">
                    @if(auth()->user()->user_type == 'Employer')
                        <a class="nav-link" href="{{ route('job.index') }}">
                            الوظائف
                        </a>
                    @else
                        <a class="nav-link" href="#">
                            طلبات التوظيف
                        </a>
                    @endif
                </li>
                @if(auth()->user()->user_type == 'Employer')
                    <a href="{{ route('job.create', ['step' => 1]) }}" class="btn main-btn">
                        أضف وظيفة
                    </a>
                @else
                    <button class="btn main-btn">
                        الترقية إلى بريميوم
                    </button>
                @endif

            </ul>

            <hr class="d-block d-lg-none">

            <ul class="last-nav d-block d-lg-none">
                <a class="nav-link" href="#">مساعدة</a>
                <a class="nav-link" href="#">اعدادات الحساب</a>
                <a class="nav-link" href="#">اللغة language</a>
                <a class="nav-link" href="#">تسجيل الخروج</a>
            </ul>
        </div>
    </div>
</nav> --}}
