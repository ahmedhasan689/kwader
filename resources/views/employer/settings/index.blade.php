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
                {{-- Personal Info Tap --}}
                <div class="tab-pane fade show active" id="v-pills-information" role="tabpanel"
                     aria-labelledby="v-pills-information-tab" tabindex="0">
                    <div class="row info-page">
                        <div class="col-lg-6">
                            <form action="{{ route('employer.settings.setNames') }}" method="POST" style="height:300px ;">
                                @csrf
                                @method('PUT')
                                <h4>المعلومات الشخصية</h4>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">الاسم</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employer->user->first_name }}">
                                    @error('first_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">اسم العائلة</label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="exampleInputPassword1" value="{{ $employer->user->last_name }}">
                                    @error('last_name')
                                        <span>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="submit-button">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('employer.settings.setAvatar') }}" method="POST" style="height:300px ;" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <h4>
                                    صورتي
                                </h4>
                                <a href="#" style="display: flex; align-items:center; margin-top: 50px;">
                                    <div class="image mb-5">
                                        <img src="{{ $employer->image }}" alt="" id="output">
                                        <div class="image-upload">
                                            <label for="file-input" id="cam">
                                                <i class="fas fa-camera"></i>
                                            </label>
                                            <input id="file-input" name="avatar" type="file" onchange="changePicSettings(event)"  />
                                        </div>

                                        <div class="background">
                                        </div>
                                        <div class="submit-button" id="pic_settings" style="margin-top: -35px; display: flex; justify-content: center; visibility:hidden">
                                            <button type="submit" class="btn btn-primary" id="pic_settings_btn">
                                                حفظ الصورة
                                            </button>
                                        </div>
                                    </div>
                                </a>

                            </form>
                        </div>
                    </div>
                    <div class="row info-page mt-3">

                        <form action="{{ route('employer.settings.setInfo') }}" method="POST" class="info-page2">
                            @csrf
                            @method('PUT')

                            <h4>
                                المعلومات العامة
                            </h4>
                            <div class="d-flex">
                                <div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">تاريخ الميلاد</label>
                                        <input type="date" name="date_of_birth" class="form-control" value="{{ $employer->date_of_birth }}" id="date" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="country" class="form-label">الدولة</label>
                                        <select class="form-select" aria-label="Default select" name="country_id">
                                            @foreach($countries as $country)
                                                <option @if($country->id == $employer->country->id) selected @endif value="{{ $country->id }}">
                                                    {{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 ">
                                        <label for="sex" class="form-label">الجنس</label>

                                        <select class="form-select" aria-label="Default select" name="gender">
                                            <option @if($employer->gender == 'Male') selected @endif value="Male">ذكر</option>
                                            <option @if($employer->gender == 'Female') selected @endif value="Female">أنثى</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="language" class="form-label">اللغة</label>

                                        <select class="form-select" aria-label="Default select language" name="language_id">
                                            @foreach($languages as $language)
                                                <option @if($language->id == $employer->language->id) selected @endif value="{{ $language->id }}">
                                                    {{ $language->language_name }}
                                                </option>
                                            @endforeach
                                        </select>
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

                {{-- Email Tap --}}
                <div class="tab-pane fade" id="v-pills-gmail" role="tabpanel" aria-labelledby="v-pills-gmail-tab"
                     tabindex="0">
                    <div class="row info-page ">
                        <form action="{{ route('employer.settings.setEmail') }}" method="POST" class="info-page2">
                            @csrf
                            @method('PUT')

                            <h4>
                                البريد الإلكتروني
                            </h4>
                            <div class="d-flex">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employer->user->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                                    @error('password')
                                    <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
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

                {{-- Reset Password --}}
                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
                    <div class="row info-page">
                        <form action="{{ route('employer.settings.resetPassword') }}" method="POST" class="mb-2">
                            @csrf
                            @method('PUT')

                            <h4>
                                تغيير كلمة المرور
                            </h4>
                            <div class="info-page2">
                                <div class="d-flex">
                                    <div class="mb-3" style="width: 50%;">
                                        <label for="exampleInputPassword5" class="form-label">
                                            كلمة المرور الحالية
                                        </label>
                                        <input type="password" name="old_password" class="form-control" id="exampleInputPassword5">
                                    </div>
                                </div>
                            </div>

                            <div class="info-page2">
                                <div class="d-flex">

                                    <div class="mb-3">
                                        <label for="exampleInputPassword6" class="form-label">
                                            كلمة المرور الجديدة
                                        </label>
                                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword6">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword7" class="form-label">
                                            تأكيد كلمة المرور الجديدة
                                        </label>
                                        <input type="password" name="repeat_password" class="form-control" id="exampleInputPassword7">
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


                {{-- Phone Number --}}
                <div class="tab-pane fade " id="v-pills-phone" role="tabpanel" aria-labelledby="v-pills-phone-tab"
                     tabindex="0">
                    <div class="row info-page">
                        <form action="{{ route('employer.settings.setPhoneNumber') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4>
                                رقم الجوال
                            </h4>
                            <div class="info-page2">
                                <div class="d-flex align-items-center">
                                    <div class="mb-3">
                                        <label for="phoneenumber" class="form-label">رقم الجوال</label>
                                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $employer->user->phone_number }}" id="phone-number">
                                        @error('phone_number')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="submit-button" style="display: flex; justify-content: flex-start; margin-top: 18px;">


                                        <a href="{{ route('verification.notice')  }}" type="button" class="btn btn-primary mx-2" style="height:40px; width: 150px; background-color: #002C7F; border:none">
                                            تأكيد رقم الجوال
                                        </a>

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

                {{-- Notification System --}}
                <div class="tab-pane fade" id="v-pills-notification" role="tabpanel"
                     aria-labelledby="v-pills-notification-tab" tabindex="0">
                    <div class="row info-page">
                        <form action="{{ route('employer.settings.notificationSystem') }}" method="POST">
                            @csrf

                            <h4>
                                الاشعارات البريدية
                            </h4>

                            @foreach( $notifications as $notification )
                                <div class="form-check" style="margin-right: 15px;">
                                    <input class="form-check-input" type="checkbox" name="{{ $notification->notification_name }}" value="{{ $notification->id }}" id="flexCheckDefault"

{{--                                        @if( Illuminate\Support\Facades\DB::table('notification_user')->where('notifications_id', $notification->id)->get() )--}}
{{--                                            checked--}}
{{--                                        @endif--}}
                                    >
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $notification->notification_name }}
                                    </label>
                                </div>
                            @endforeach
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Deletion Reasons --}}
                <div class="tab-pane fade mb-2" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab"
                     tabindex="0">
                    <div class="row info-page">
                        <form action="{{ route('employer.settings.deleteAccount') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <h4>
                                احذف حسابي
                            </h4>
                            <div class="sec1">
                                <p>
                                    نحن اسفون على مغادرتك موقعنا
                                </p>
                                <p>
                                    الرجاء مساعدتنا في تقييم خدماتنا حتى نتمكن من تطوير موقعنا
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="reason_one" value="أتلقى الكثير من رسائل البريد الالكتروني من موقعكم" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        أتلقى الكثير من رسائل البريد الالكتروني من موقعكم
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="reason_two" value="لم أجد وظيفة مناسبة عبر موقعكم" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        لم أجد وظيفة مناسبة عبر موقعكم
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="reason_three" value="لم أستوعب كيفية استخدام الموقع" id="flexCheckChecked1">
                                    <label class="form-check-label" for="flexCheckChecked1">
                                        لم أستوعب كيفية استخدام الموقع
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" name="reason_four" value="أسباب أخرى" id="flexCheckChecked2">
                                    <label class="form-check-label" for="flexCheckChecked2">
                                        أسباب أخرى
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="sec2">
                                <h6 style="font-size:22px;">يمكنك أن تشرح لنا أكثر</h6>
                                <textarea style="width:80%; border-color: rgba(128, 128, 128, 0.46);" name="explain" id="" cols="30" rows="10">

                                </textarea>
                                <div class="form-check" style="margin-right: 4px;">
                                    <input class="form-check-input" type="checkbox" name="contact" value="True" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        حدد هذه الخانة إذا كنت لا ترغب في الاتصال بك لإعطاء مزيد من التفاصيل حول أسباب مغادرتك موقع كوادر.كوم
                                    </label>
                                </div>
                            </div>
                            <br> <br>
                            <div class="sec3">
                                <h5>
                                    كيف سيتم حذف حسابك؟
                                </h5>
                                <p>
                                    أولاً، سنقوم بالتأكد من استيفائك لكافة معاملاتك المالية على موقعنا
                                </p>
                                <p>
                                    ثانياً، سنحذف حسابك من قاعدة بيانات موقع كوادر.كوم ، إلى جانب بيانات التعريف وسجل التصفح الخاص بك وإذا لزم الأمر، سنحذف التعليقات والآراء التي تركتها أو استلمتها على موقعنا
                                </p>
                                <p>
                                    أخيراً، سيتم حذف حسابك نهائيًا. لذا لن تتمكن بعد الآن من الوصول إلى العقود الخاصة بك، فيرجى تنزيلها مسبقاً من حسابك قبل إلغائه ( لقد استلمتها أيضًا عن طريق البريد الالكتروني )
                                </p>
                            </div>
                            <div style="display: flex; justify-content: left; margin-left: 5px;" class="mt-3">
                                <button type="submit" class="btn btn-success" style="background-color: #00B398; border: 1px solid #00B398; padding: 8px 25px;">
                                    حذف حسابي
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
