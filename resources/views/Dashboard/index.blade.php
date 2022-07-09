@extends('layouts.master')
@section('css')
    {{-- Owl-carousel css --}}
    <link href="{{ asset('Dashboard_Assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    {{-- Maps css --}}
    <link href="{{ asset('Dashboard_Assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard_Assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا, {{ Auth::user()->first_name }}</h2>
                <p class="mg-b-0">
                    لوحة تحكم موقع كوادر للتوظيف
                </p>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-users tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">الكوادر</span>
                                <h2 class="text-white mb-0">{{ $employees->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fa-solid fa-people-group tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">أصحاب العمل</span>
                                <h2 class="text-white mb-0">{{ $employers->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-warning-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-pie-chart tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Taxes</span>
                                <h2 class="text-white mb-0">876</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fa-solid fa-briefcase tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">الوظائف</span>
                                <h2 class="text-white mb-0">{{ $jobs->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">--}}
{{--            <div class="card overflow-hidden sales-card bg-danger-gradient">--}}
{{--                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                    <div class="">--}}
{{--                        <h6 class="mb-3 tx-12 text-white">TODAY EARNINGS</h6>--}}
{{--                    </div>--}}
{{--                    <div class="pb-0 mt-0">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="tx-20 font-weight-bold mb-1 text-white">$1,230.17</h4>--}}
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
{{--                            </div>--}}
{{--                            <span class="float-right my-auto mr-auto">--}}
{{--											<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--											<span class="text-white op-7"> -23.09%</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">--}}
{{--            <div class="card overflow-hidden sales-card bg-success-gradient">--}}
{{--                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                    <div class="">--}}
{{--                        <h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6>--}}
{{--                    </div>--}}
{{--                    <div class="pb-0 mt-0">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="tx-20 font-weight-bold mb-1 text-white">$7,125.70</h4>--}}
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
{{--                            </div>--}}
{{--                            <span class="float-right my-auto mr-auto">--}}
{{--											<i class="fas fa-arrow-circle-up text-white"></i>--}}
{{--											<span class="text-white op-7"> 52.09%</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">--}}
{{--            <div class="card overflow-hidden sales-card bg-warning-gradient">--}}
{{--                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                    <div class="">--}}
{{--                        <h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>--}}
{{--                    </div>--}}
{{--                    <div class="pb-0 mt-0">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="">--}}
{{--                                <h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>--}}
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
{{--                            </div>--}}
{{--                            <span class="float-right my-auto mr-auto">--}}
{{--											<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--											<span class="text-white op-7"> -152.3</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- row closed -->

    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">
                        آخر الكوادر المسجلة
                    </h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">
                    هنا تجد آخر الكوادر المسجلة وبياناتهم
                </span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">الأسم</th>
                            <th class="wd-lg-25p tx-right">الإيميل</th>
                            <th class="wd-lg-25p tx-right">رقم الجوال</th>
                            <th class="wd-lg-25p tx-right">تأكيد الحساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $last_employees as $employee )
                            <tr>
                                <td>
                                    {{ $employee->user->first_name . ' ' . $employee->user->last_name }}
                                </td>
                                <td class="tx-right tx-medium tx-inverse">
                                    {{ $employee->user->email }}
                                </td>
                                @if( $employee->user->phone_number )
                                    <td class="tx-right tx-medium tx-inverse">
                                        {{ $employee->user->phone_number }}
                                    </td>
                                @else
                                    <td class="tx-right tx-medium tx-danger">
                                        لم يضف رقم جوال
                                    </td>
                                @endif
                                @if ( $employee->user->email_verified_at )
                                    <td class="tx-right tx-medium tx-success">نعم</td>
                                @else
                                    <td class="tx-right tx-medium tx-danger">لا</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="card mg-b-md-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            التقسيم للكوادر
                        </div>
                        <p class="mg-b-20">
                            التقسيم حسب الجنس للكوادر
                        </p>
                        <div class="morris-donut-wrapper-demo" id="users"></div>
                    </div>
                </div>
            </div><!-- col-6 -->

        <input type="hidden" value="{{ $female_employees }}" id="female_employee">
        <input type="hidden" value="{{ $male_employees }}" id="male_employee">
    </div>

    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">
                        آخر الكوادر المسجلة
                    </h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">
                    هنا تجد آخر الكوادر المسجلة وبياناتهم
                </span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">الأسم</th>
                            <th class="wd-lg-25p tx-right">الإيميل</th>
                            <th class="wd-lg-25p tx-right">رقم الجوال</th>
                            <th class="wd-lg-25p tx-right">تأكيد الحساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $last_employers as $employer )
                            <tr>
                                <td>
                                    {{ $employer->user->first_name . ' ' . $employer->user->last_name }}
                                </td>
                                <td class="tx-right tx-medium tx-inverse">
                                    {{ $employer->user->email }}
                                </td>
                                @if( $employer->user->phone_number )
                                    <td class="tx-right tx-medium tx-inverse">
                                        {{ $employer->user->phone_number }}
                                    </td>
                                @else
                                    <td class="tx-right tx-medium tx-danger">
                                        لم يضف رقم جوال
                                    </td>
                                @endif
                                @if ( $employer->user->email_verified_at )
                                    <td class="tx-right tx-medium tx-success">نعم</td>
                                @else
                                    <td class="tx-right tx-medium tx-danger">لا</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mg-b-md-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        التقسيم للكوادر
                    </div>
                    <p class="mg-b-20">
                        التقسيم حسب الجنس للكوادر
                    </p>
                    <div class="morris-donut-wrapper-demo" id="employer"></div>
                </div>
            </div>
        </div><!-- col-6 -->

        <input type="hidden" value="{{ $female_employers }}" id="female_employers">
        <input type="hidden" value="{{ $male_employers }}" id="male_employers">
    </div>

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">Order status</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number.</p>
                </div>
                <div class="card-body">
                    <div class="total-revenue">
                        <div>
                            <h4>120,750</h4>
                            <label><span class="bg-primary"></span>success</label>
                        </div>
                        <div>
                            <h4>56,108</h4>
                            <label><span class="bg-danger"></span>Pending</label>
                        </div>
                        <div>
                            <h4>32,895</h4>
                            <label><span class="bg-warning"></span>Failed</label>
                        </div>
                    </div>
                    <div id="bar" class="sales-bar mt-4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">Sales Revenue by Customers in USA</label>
                <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
                <div class="">
                    <div class="vmap-wrapper ht-180" id="vmap2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Sales Activity</h3>
                    <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
                </div>
                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
                            <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                        </li>
                        <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
                            <p class="mb-0 text-muted tx-12">1k New Sales</p>
                        </li>
                        <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
                            <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                        </li>
                        <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
                            <p class="mb-0 text-muted tx-12">3k New profit</p>
                        </li>
                        <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">15% increased</p>
                        </li>
                        <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h3 class="card-title mb-2">Recent Orders</h3>
                    <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
                </div>
                <div class="card-body sales-info ot-0 pt-0 pb-0">
                    <div id="chart" class="ht-150"></div>
                    <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
                            <h3 class="mb-1">5238</h3>
                            <div class="d-flex">
                                <p class="text-muted ">Last 6 months</p>
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
                            <h3 class="mb-1">3467</h3>
                            <div class="d-flex">
                                <p class="text-muted">Last 6 months</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">Total Sales</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">$7,590</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">Active Users</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">$5,460</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
                <div class="list-group">
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>United States</p><span>$1,671.10</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                        <p>Netherlands</p><span>$1,064.75</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                        <p>United Kingdom</p><span>$1,055.98</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                        <p>Canada</p><span>$1,045.49</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                        <p>India</p><span>$1,930.12</span>
                    </div>
                    <div class="list-group-item border-bottom-0 mb-0">
                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                        <p>Australia</p><span>$1,042.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th class="wd-lg-25p">Date</th>
                            <th class="wd-lg-25p tx-right">Sales Count</th>
                            <th class="wd-lg-25p tx-right">Earnings</th>
                            <th class="wd-lg-25p tx-right">Tax Witheld</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$658.20</td>
                            <td class="tx-right tx-medium tx-danger">-$45.10</td>
                        </tr>
                        <tr>
                            <td>06 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">26</td>
                            <td class="tx-right tx-medium tx-inverse">$453.25</td>
                            <td class="tx-right tx-medium tx-danger">-$15.02</td>
                        </tr>
                        <tr>
                            <td>07 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$653.12</td>
                            <td class="tx-right tx-medium tx-danger">-$13.45</td>
                        </tr>
                        <tr>
                            <td>08 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">45</td>
                            <td class="tx-right tx-medium tx-inverse">$546.47</td>
                            <td class="tx-right tx-medium tx-danger">-$24.22</td>
                        </tr>
                        <tr>
                            <td>09 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">31</td>
                            <td class="tx-right tx-medium tx-inverse">$425.72</td>
                            <td class="tx-right tx-medium tx-danger">-$25.01</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('Dashboard_Assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ asset('Dashboard_Assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ asset('Dashboard_Assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ asset('Dashboard_Assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ asset('Dashboard_Assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ asset('Dashboard_Assets/js/index.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/jquery.vmap.sampledata.js') }}"></script><!--Internal  Datepicker js -->

    <script src="{{ asset('Dashboard_Assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ asset('Dashboard_Assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Morris js -->
    <script src="{{ asset('Dashboard_Assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/plugins/morris.js/morris.min.js') }}"></script>
    <!--Internal Chart Morris js -->
    <script src="{{ asset('Dashboard_Assets/js/chart.morris.js') }}"></script>
@endsection
