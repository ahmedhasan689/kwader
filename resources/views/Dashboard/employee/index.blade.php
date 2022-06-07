@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    الكادر
                </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / لوحة التحكم
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">USERS TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p">
                                        <span>
                                            المستخدم
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span></span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            تاريخ التسجيل
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            الحالة
                                        </span>
                                    </th>
                                    <th class="wd-lg-20p">
                                        <span>
                                            البريد الإلكتروني
                                        </span>
                                    </th>

                                    <th class="wd-lg-20p">
                                        <span>
                                            تأكيد البريد الإلكتروني
                                        </span>
                                    </th>

                                    <th class="wd-lg-20p">
                                        عمليات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $users as $user )
                                <tr>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{ $user->employee->image }}">
                                    </td>
                                    <td>
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->created_at->diffForHumans() }}
                                    </td>

                                    <td class="text-center">
                                        @if( Cache::has('user-is-online' . $user->id) )
                                            <span class="label text-success d-flex">
                                            <div class="dot-label bg-success ml-1"></div>
                                            Active
                                        </span>
                                        @else
                                            <span class="label text-muted d-flex">
                                            <div class="dot-label bg-gray-300 ml-1"></div>
                                            Inactive
                                        </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#">{{ $user->email }}</a>
                                    </td>
                                    <td>
                                        @if( $user->email_verified_at )
                                            <span class="text-success">
                                                Yes
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                No
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-left">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

@endsection
@section('js')
@endsection
