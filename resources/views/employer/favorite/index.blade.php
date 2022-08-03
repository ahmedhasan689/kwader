@extends('layouts.front_layout')

@section('css')
    <style>
        .top-row {
            border-bottom: 0.25px solid #CBCFE9;
            height: 75px;
        }
        .add_list_btn{
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .add_list_btn button{
            background-color: #00B398;
            border: 1px solid #00B398;
            height: 45px;
            width: 165px;
        }
        .add_list_btn button:hover{
            background-color: #00B398;
            border: 1px solid #00B398;
        }
        .add_list_btn button:focus{
            background-color: #00B398;
            border: 1px solid #00B398;
        }
        .parent-top-row {
            width: 80px;
            margin-right: -12px;
            border-top-left-radius: 0;
            border-top: none;
            margin-left: 5px;
            border-right: none;
        }
        .taps_btn {
            border-top-left-radius: unset !important;
            border-top-right-radius: unset !important;
            border-top: none !important;
            color: #898EA3;
            height: 75px;

        }
        .taps_btn:hover {
            color: #898EA3;
            border-right: 0.25px solid #CBCFE9;
            border-left: none;
        }
        .taps_btn:focus {
            border-bottom: 2px solid #080 !important;
        }
        .kwader-card {
            border: 1px solid #898EA3;
            border-radius: 3px;
            padding: 40px 25px;
            text-align: center;
            margin-bottom: 15px;
            height: 280px;
        }
        .kwader-card:hover {
            border: 2px solid #00B398;
        }
        .kwader-count {
            background-color: #CBCFE9;
            border: none;
            color: #1F2836 !important;
            width: 85px;
            height: 42px;
        }

        .kwader-count:hover {
            background-color: #CBCFE9;
        }

        .kwader-count:disabled {
            background-color: #CBCFE9;
            margin-bottom: -85px;
        }

        .kwader-img {
            border: 2px solid #00B5AD;
            border-radius: 35px;
            margin-top: 10px !important;
        }
        .kwader-link {
            text-decoration: none;
        }
        .kwader-link:hover {
            border-color: #0b2e13;
        }
    </style>
@endsection

@section('page_title', 'مفضلتي')

@section('content')
    <body style="background-color: #E7EAF6">
        <div class="container my-2" style="background-color: #ffffff; border: 0.2px solid #707070">
            <div class="row top-row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="border:none">
                        <li class="nav-item parent-top-row" role="presentation">
                            <button class="nav-link active taps_btn" name="kwader_tap" value="kawader" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">الكوادر</button>
                        </li>
                        <li class="nav-item parent-top-row" role="presentation">
                            <button class="nav-link taps_btn" id="profile-tab" name="jobs_tap" value="job" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">الإعلانات</button>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 add_list_btn">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        أضف قائمة جديدة
                    </button>
                </div>
            </div>
            <div class="row" style="padding: 25px 10px">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active kwader-tap" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            @foreach( $existings as $existing )
                                @if($existing->type == 'kawader')
                                    <div class="col-md-4">
                                        <a href="{{ route('employer.existing.show', ['id' => $existing->id]) }}" class="kwader-link">
                                            <div class="kwader-card">
                                                <h5 style="color: #3A3F50; font-weight: 700; margin-top: -10px;">
                                                    {{ $existing->existing_name }}
                                                </h5>
                                                <br>
                                                <img src="{{ asset('Front_Assets/img/ss.png') }}" class="mb-4 kwader-img" width="50" height="50">
                                                <br>

                                                <button class="btn btn-success kwader-count" disabled>
                                                    {{ $favorites }} كوادر
                                                </button>

                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            @foreach( $existings as $existing )
                                @if($existing->type == 'job')
                                    <div class="col-md-4">
                                        <a href="{{ route('employer.existing.show', ['id' => $existing->id]) }}" class="kwader-link">
                                            <div class="kwader-card">
                                                <h5 style="color: #3A3F50; font-weight: 700; margin-top: -10px;">
                                                    {{ $existing->existing_name }}
                                                </h5>
                                                <br>
                                                <img src="{{ asset('Front_Assets/img/ss.png') }}" class="mb-4 kwader-img" width="50" height="50">
                                                <br>

                                                <button class="btn btn-success kwader-count" disabled>
                                                    {{ $favorites }} كوادر
                                                </button>

                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="height: 200px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="padding-top: 30px;margin-right: 130px;">
                                إنشاء قائمة جديدة
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px; margin-left: -25px; display: block; margin-top: -25px"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.existing.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <input type="text" class="form-control" name="list_name" id="exampleFormControlInput1" placeholder="قائمة جديدة" style="width: 80%; display: inline;margin-left: 10px;" required>
                                    <input type="hidden" class="form-control" name="list_type" value="job" style="width: 85%; display: inline">
                                    <button type="submit" class="btn btn-success" style="background-color: #00B5AD; border: none; width: 17%;height: 40px;margin-right: 0px;">
                                        سجّل
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection
