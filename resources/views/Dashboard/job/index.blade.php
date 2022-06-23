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
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p">
                                    <span>
                                        المسمى الوظيفي
                                    </span>
                                </th>
                                <th class="wd-lg-20p">
                                    <span>
                                        صاحب العمل
                                    </span>
                                </th>
                                @if( $status == 'Under-Review')
                                    <th class="wd-lg-20p">
                                        <span>
                                            الوصف
                                        </span>
                                    </th>
                                @elseif( $status == 'Opened' )
                                    <th class="wd-lg-20p">
                                        <span>
                                            عدد المتقدمون
                                        </span>
                                    </th>
                                @endif
                                <th class="wd-lg-20p">
                                    <span>
                                        السعر
                                    </span>
                                </th>

                                <th class="wd-lg-20p">
                                    <span>
                                        نظام العمل
                                    </span>
                                </th>

                                <th class="wd-lg-20p">
                                    عمليات
                                </th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach( $jobs as $job )
                                <tr>
                                    <td>
                                        {{ $job->job_title }}
                                    </td>
                                    <td>
                                        {{ $job->employer->user->first_name }}
                                    </td>
                                    @if( $status == 'Under-Review')
                                        <td class="wd-lg-20p">
                                            <span>
                                                {{ $job->description }}
                                            </span>
                                        </td>
                                    @elseif( $status == 'Opened' )
                                        <td class="wd-lg-20p">
                                            @if($job->employee_applicants)
                                                <span>
                                                    {{ count($job->employee_applicants) }}
                                                </span>
                                            @else
                                                <span>
                                                    0
                                                </span>
                                            @endif
                                        </td>
                                    @endif

                                    <td>
                                        <span>
                                            {{ $job->salary }}
                                        </span>
                                    </td>

                                    <td>
                                        <span>
                                            {{ $job->job_system }}
                                        </span>
                                    </td>

                                    @if($status == 'Under-Review')
                                        <td>
                                            <form action="{{ route('admin.job.accept', ['id' => $job->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method( 'PUT' )
                                                <button type="submit" class="btn btn-sm btn-success" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="#" method="POST" style="display: inline;">
                                                @csrf
                                                @method( 'DELETE' )
                                                <button type="submit" class="btn btn-sm btn-danger" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-x"></i>
                                                </button>
                                            </form>
                                            <form action="#" method="POST" style="display: inline;">
                                                @csrf
                                                @method( 'PUT' )
                                                <button type="submit" class="btn btn-sm btn-warning" style="padding: 5px 13px;">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @elseif($status == 'Opened')
                                        <td>
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                @method( 'PUT' )
                                                <button type="submit" class="btn btn-sm btn-info" style="padding: 5px 13px;">
                                                    <i class="icon ion-ios-share-alt" style="margin-right: 1px"></i>
                                                </button>
                                            </form>
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                @method( 'DELETE' )
                                                <button type="submit" class="btn btn-sm btn-danger" style="padding: 5px 13px;">
                                                    <i class="las la-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>

                                {{-- Delete Modal --}}
{{--                                <div class="modal" id="delete-{{ $user->id }}">--}}
{{--                                    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                        <div class="modal-content tx-size-sm">--}}
{{--                                            <div class="modal-body tx-center pd-y-20 pd-x-20">--}}
{{--                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                                <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>--}}
{{--                                                <h4 class="tx-danger mg-b-20">--}}
{{--                                                    Error: Cannot process your entry!--}}
{{--                                                </h4>--}}
{{--                                                <p class="mg-b-20 mg-x-20">--}}
{{--                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.--}}
{{--                                                </p>--}}
{{--                                                <form action="{{ route( 'admin.employee.delete', ['id' => $user->id] ) }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn ripple btn-danger pd-x-25">--}}
{{--                                                        Continue--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>



@endsection
@section('js')
@endsection

