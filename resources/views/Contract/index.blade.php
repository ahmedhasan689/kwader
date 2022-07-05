@extends('layouts.front_layout')

@section('page_title', 'العقود والمعاملات المالية')

@section('content')
    <div class="contract">
        <div class="container">
            <div class="contractTop d-flex">
                <ul class="nav">
                    <li class="nav-item one" style="margin-top: -1px">
                        <a class="nav-link active" aria-current="page" href="#">العقود</a>
                    </li>
                    <li class="nav-item two" style="margin-top: -1px; width: 155px;">
                        <a class="nav-link" href="#">المعاملات المالية</a>
                    </li>

                </ul>

                <div><i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="ادخل رقم العقد">
                </div>
            </div>


            <table class="tableOne">
                <tr class="title">
                    <th>
                        رقم العقد
                    </th>
                    <th>
                        الحالة
                    </th>
                    <th>
                        تاريخ الابرام
                    </th>
                    <th>
                        اسم الشركة
                    </th>
                    <th>
                        قيمة العقد
                    </th>
                    <th>
                        العقد
                    </th>
                </tr>
                <tr class="image pt-5">
                    <td>
                        <img src="{{ asset('Front_Assets/img/Group 384.png') }}" alt="">
                    </td>
                </tr>
                <tr class="pt-5">
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            </table>

            <table class="tableTwo">
                <tr class="title">
                    <th>
                        رقم المعاملة
                    </th>
                    <th>
                        التاريخ
                    </th>
                    <th>
                        المبلغ المدفوع
                    </th>
                </tr>
                @if($transactions)
                    @foreach($transactions as $transaction)
                        <tr class="pt-5" style="border-bottom: 1px solid #ddd">
                            <td>
                                {{ $transaction->transaction_number }}
                            </td>
                            <td>
                                {{ $transaction->created_at->format('Y-m-d') }}
                            </td>
                            <td>
                                {{ $transaction->amount }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="image pt-5">
                        <td>
                            <img src="{{ asset('Front_Assets/img/Group 384.png') }}" alt="">
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row pt-5 pb-2 text-center text-sm-start">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>كوادر.كوم</h5>
                    <nav class="nav flex-column align-items-center align-items-sm-start">
                        <a class="nav-link" href="#">عن كوادر.كوم</a>
                        <a class="nav-link" href="#">إرشادات الاستخدام</a>
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
                        <a class="nav-link" href="#">بطاقات العضوية</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5">
                    <h5>تابعنا على</h5>
                    <div
                        class="social-icon d-flex align-items-center justify-content-center justify-content-sm-start mt-3 gap-4">
                        <a href="#">
                            <span>
                                <i class="bi bi-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-linkedin"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span>
                                <i class="bi bi-facebook"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="last-footer py-4">
            © 2022 كوادر.كوم جميع الحقوق محفوظة
        </div>
    </footer>
@endsection
