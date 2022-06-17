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
                        <h4 class="card-title mg-b-0">قائمة المحذوفات</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-14 tx-gray-500 mb-2">
                        هنا كافة الكوادر الذين تم حذفهم ، يمكنك إستعادتهم أو حذفهم بشكل نهائي
                    </p>
                    <div class="col-sm-6 col-md-3 mg-t-10" style="margin-right: -12px">
                        <form action="{{ route('admin.employer.restore')}}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button href="{{ route('admin.employer.trash') }}" class="btn btn-info">
                                إستعادة الكل
                            </button>
                        </form>
                        <form action="{{ route('admin.employee.force-delete')}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                حذف الكل
                            </button>
                        </form>
                        {{--                        <a href="{{ route('admin.employee.trash') }}" class="btn btn-danger"></a>--}}
                    </div>
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
                                            تاريخ الحذف
                                        </span>
                                </th>
                                <th class="wd-lg-20p">
                                        <span>
                                            متبقي للحذف النهائي
                                        </span>
                                </th>

                                <th class="wd-lg-20p">
                                        <span>
                                            البريد الإلكتروني
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
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{ asset('Front_assets/img/deleted_avatar.webp') }}">
                                    </td>
                                    <td>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->deleted_at->diffForHumans() }}
                                    </td>
                                    <td class="text-danger">
                                        {{ $user->remaining_days }} يوم
                                    </td>

                                    <td>
                                        <a href="#">{{ $user->email }}</a>
                                    </td>


                                    <td>
                                        <form action="{{ route('admin.employee.restore', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method( 'PUT' )
                                            <button type="submit" class="btn btn-sm btn-info" style="padding: 5px 13px;">
                                                <i class="icon ion-ios-share-alt" style="margin-right: 1px"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.employee.force-delete', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method( 'DELETE' )
                                            <button type="submit" class="btn btn-sm btn-danger" style="padding: 5px 13px;">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>

                                {{-- Delete Modal --}}
                                <div class="modal" id="delete-{{ $user->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content tx-size-sm">
                                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                <h4 class="tx-danger mg-b-20">
                                                    Error: Cannot process your entry!
                                                </h4>
                                                <p class="mg-b-20 mg-x-20">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                </p>
                                                <form action="{{ route( 'admin.employee.delete', ['id' => $user->id] ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn ripple btn-danger pd-x-25">
                                                        Continue
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>



@endsection
@section('js')
@endsection
