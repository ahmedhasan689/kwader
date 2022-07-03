@extends('layouts.front_layout')

@section('page_title', 'البحث عن كوادر')

@section('content')
    <div class="search searchStaff">
        <div class="container">
            <div class="row">
                <div class="col-3 right">
                    <h5>البحث</h5>
                    <div class="gro">
                        <span>الحد الأدنى 100 <i class="fa-solid fa-circle-xmark"></i></span>
                        <span class="sed">اتكنولوجيا المعلومات <i class="fa-solid fa-circle-xmark"></i>
                        </span>
                        <span>1-2سنوات <i class="fa-solid fa-circle-xmark"></i></span>
                    </div>
                    <hr>

                    <h5>الراتب الشهري</h5>


                    <div class="slidecontainer">
                        <input type="range" min="100" max="10000" value="50" class="slider" id="myRange">
                        <div class="d-flex " style="justify-content:space-between;">
                            <span>100.00$</span>
                            <span id="demo"></span>
                        </div>

                    </div>
                    <hr>
                    <div class="country">
                        <h5>الدولة</h5>
                        <input type="text" placeholder="غير محدد">
                    </div>
                    <hr>
                    <div class="years">
                        <h5>سنوات الخبرة</h5>
                        <form>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="two">
                            <label for="vehicle1"> 0-2سنوات</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="five">
                            <label for="vehicle2"> 2-5سنوات</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="ten">
                            <label for="vehicle3"> 5-10سنوات</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="over">
                            <label for="vehicle4"> +10سنوات</label>
                        </form>
                    </div>
                    <hr>
                    <div class="field">
                        <h5>المجال</h5>
                        <input type="text" placeholder="ابحث عن مجالك">
                        <form>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="تكنولوجيا المعلومات">
                            <label for="vehicle1"> تكنولوجيا المعلومات
                            </label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="برمجة و تطوير">
                            <label for="vehicle2"> برمجة و تطوير</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="هندسة و علوم">
                            <label for="vehicle3"> هندسة و علوم</label>
                            <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="تسويق و مبيعات">
                            <label for="vehicle4"> تسويق و مبيعات</label>
                            <br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="فن و تصميم ">
                            <label for="vehicle5"> فن و تصميم</label>
                            <br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="كتابة و ترجمة  ">
                            <label for="vehicle6"> كتابة و ترجمة</label>
                            <br>
                            <input type="checkbox" id="vehicle7" name="vehicle7" value="دعم فني ">
                            <label for="vehicle7"> دعم فني</label>
                            <br>
                            <input type="checkbox" id="vehicle8" name="vehicle8" value="محاسبة و مالية ">
                            <label for="vehicle8"> محاسبة و مالية</label>
                        </form>
                        </form>
                    </div>
                    <hr>
                    <div class="specialize">
                        <h5>الاختصاص</h5>
                        <input type="text" placeholder="ابحث عن اختصاصك">
                        <form>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="special1">
                            <label for="vehicle1">الاختصاص1</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="special2">
                            <label for="vehicle2"> الاختصاص2</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="special3">
                            <label for="vehicle3"> الاختصاص3</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="special4">
                            <label for="vehicle4">الاختصاص4</label><br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="special5">
                            <label for="vehicle5"> الاختصاص5</label><br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="special6">
                            <label for="vehicle6"> الاختصاص6</label>
                        </form>
                    </div>
                    <hr>
                    <div class="skills">
                        <h5>المهارات</h5>
                        <input type="text">
                    </div>
                    <hr>
                    <div class="system ">
                        <h5>نظام العمل</h5>
                        <form>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="1">
                            <label for="vehicle1"> دوام كامل
                            </label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="2">
                            <label for="vehicle2"> دوام جزئي</label><br>

                        </form>
                    </div>
                    <hr>
                    <div class="language">
                        <h5>اللغات</h5>
                        <input type="text" placeholder="ابحث عن اللغة">
                        <form>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="arabic">
                            <label for="vehicle1"> العربية</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="english">
                            <label for="vehicle2"> الإنجليزية</label><br>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="french">
                            <label for="vehicle3"> الفرنسية</label> <br>
                            <input type="checkbox" id="vehicle4" name="vehicle4" value="spanich">
                            <label for="vehicle4"> الاسبانية</label><br>
                            <input type="checkbox" id="vehicle5" name="vehicle5" value="turkey">
                            <label for="vehicle5"> التركية</label><br>
                            <input type="checkbox" id="vehicle6" name="vehicle6" value="alman">
                            <label for="vehicle6">الالمانية</label>
                        </form>
                    </div>
                    <hr>

                </div>
                <div class="col-9 left d-flex mt-5 gap-2" style="">
                    @foreach( $employees as $employee )

                        <div class="card" style="height: 360px">
                        <div class="image">
                            <img src="{{ $employee->image }}" alt="">
                        </div>
                        <div class="title">

                         <div class="avail">
                             @if( $employee->availability == 'Available' )
                                 <span class="available">
                                    متاح
                                </span>
                                <span class="dot" style="background-color: #080;"></span>
                             @elseif( $employee->availability == 'Unavailable' )
                                 <span class="available" style="width: 84px;font-size: 15px; left: 202px">
                                    غير متاح
                                </span>
                                 <span class="dot" style="background-color: red;"></span>
                             @endif
                         </div>

                            <i data-bs-toggle="modal" data-bs-target="#favModal" class="fa-regular fa-heart"></i>

                            <!-- Modal -->
                            <div class="modal fade" id="favModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            <h5 class="modal-title mb-2" id="exampleModalLabel">
                                                أضف هذا الاعلان الى مفضلتي
                                            </h5>

                                            <form>
                                                <div class="mb-3">
                                                    <label for="listName" class="form-label">انقر على قائمة لإضافة
                                                        الإعلان</label>
                                                    <input type="text" value="اسم القائمة" class="form-control"
                                                           id="listName" aria-describedby="listName" readonly>

                                                </div>
                                                <div class="mb-3">

                                                    <input type="text" value="اسم القائمة" class="form-control"
                                                           id="listName" aria-describedby="listName" readonly>

                                                </div>
                                                <div class="mb-3" id="ans">

                                                    <!-- <input type="text" value="اسم القائمة" class="form-control"
                                                                            id="listName" aria-describedby="listName" readonly> -->

                                                </div>

                                                <button type="button" class="btnAdd btn-primary"
                                                        onclick="hideButton(this)"><span>+</span>انشاء
                                                    قائمة
                                                    جديدة</button>
                                                <div class="mb-3" id="div2">


                                                </div>
                                            </form>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="name" style="width: 180px; top: 130px; left: 124px;">
                            <a href="{{ route('employee.dashboard.show', ['id' => $employee->id]) }}" style="cursor: pointer; text-decoration: none">
                                <h4 style="font-size: 20px">{{ $employee->user->first_name . ' ' . $employee->user->last_name }}</h4>
                            </a>
                            <img src="{{ asset('flags') . '/' . $employee->country->code . '.png' }}" width="25" height="15">
                            <span style="font-size: 12px">
                                {{ $employee->country->country_name }}
                            </span>
                        </div>
                        <div class="foo">
                            <div class="d-flex price">
                                <h5>
                                    {{ $employee->salary }}
                                </h5> <span>/شهر</span>
                            </div>
                        </div>



                        <h5>
                           {{ $employee->job_title }}
                        </h5>
                        <div class="group mt-2">
                            @if ($employee->skills)
                                @php
                                    $array_one = array_slice( $employee->skills, 0, 4 );
                                    $full_array = $employee->skills;
                                    $remaining_array = array_diff($full_array, $array_one);
                                @endphp

                                @foreach($array_one as $skill)
                                    <span title="{{ $skill }}">
                                        {{ Str::limit($skill, 5) }}
                                    </span>
                                @endforeach
                                <span title="{{ implode(', ',  $remaining_array) }}">+ {{ count($remaining_array) }}</span>
                            @endif

                        </div>


                    </div>
                    @endforeach



                </div>
            </div>
            <nav aria-label="Page navigation example" class="navigation-search">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <br> <br>
        </div>

    </div>
@endsection
