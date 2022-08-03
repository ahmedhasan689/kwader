@extends('layouts.front_layout')

@section('page_title', 'كيف يعمل كوادر')

@section('content')
    <div class="suggest mb-3">
        <h2>
            تواصل معنا
        </h2>
        <div class="content">
            <div class="row">
                <div class="col-lg-5">
                    <form action="{{ route('admin.contact_us.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nameJob" class="form-label">الأسم بالكامل</label>
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="nameJob" placeholder="الأسم ثلاثي">
                            @error('full_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="range" class="form-label">الإيميل</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="range" placeholder="يرجى كتابة إيميلك للتواصل معك فيما بعد">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 gap-2">
                            <div>
                                <label for="salaryJob" class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="salaryJob" placeholder="ضع رقم هاتفك">
                                @error('phone_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 gap-2">
                            <div>
                                <label for="salaryJob" class="form-label">أترك رسالتك</label>
                                <textarea type="text" name="message" cols="5" rows="4" class="form-control @error('message') is-invalid @enderror" placeholder="أترك رسالتك هنا"></textarea>
                                @error('message')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="d-flex mt-5" style="justify-content: center">
                            <button type="submit" class="btn btn-primary sent" style="padding: 10px 30px">أرسل</button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-7">
                    <img src="{{ asset('Front_Assets/img/Group%20832.png') }}" alt="" style="height: 380px; width: 380px; margin-top: 20px;">
                </div>
            </div>
        </div>
    </div>
@endsection
