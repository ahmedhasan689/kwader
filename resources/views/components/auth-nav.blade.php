<nav class="navbar navbar-expand-lg navbar-light t">
    <div class="container">
        <a class="navbar-brand" href="#"> <img src="./img/logo.png" alt="logo"> </a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav mu-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">الصفحة الشخصية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ابحث عن كوادر</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الوظائف</a>
                </li>
                <li>
                    <button id="addJob">أضف وظيفة</button>
                </li>
            </ul>

        </div>
        <form class="d-flex ">
            <!-- Button trigger modal -->
            <i style="color:#fff ;" class="fas fa-search white"></i>
            <a href="favourite.html"><i class="far fa-heart"></i></a>
            <a href="messageOwner.html"><i class="far fa-envelope"></i></a>
            <x-front-notification />
            <span style="margin-left:10px; color: #fff;">|</span>



            <div class="dropdown option">

                <i class="fas fa-ellipsis-v " style="color:#fff; font-size: large;" id="dropdownMenuButton1"
                   data-bs-toggle="dropdown" aria-expanded="false"></i>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">مساعدة</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">اعدادات الحساب</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">تعديل نوع الحساب</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">language/اللغة</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">تسجيل خروج</a></li>

                </ul>
            </div>
        </form>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

    </div>
</nav>
