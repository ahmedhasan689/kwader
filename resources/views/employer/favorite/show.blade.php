@extends('layouts.front_layout')

@section('css')
    <style>

        .top-row {
            border-bottom: 0.25px solid #CBCFE9;
            height: 75px;
        }

        .add_list_btn {
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .add_list_btn button {
            background-color: #00B398;
            border: 1px solid #00B398;
            height: 45px;
            width: 165px;
        }

        .add_list_btn button:hover {
            background-color: #00B398;
            border: 1px solid #00B398;
        }

        .add_list_btn button:focus {
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
                    @if($existing->type == 'kawader')
                        <li class="nav-item parent-top-row" role="presentation">
                            <button class="nav-link active taps_btn" name="kwader_tap" value="kawader" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="home" aria-selected="true">الكوادر
                            </button>
                        </li>
                    @else
                        <li class="nav-item parent-top-row" role="presentation">
                            <button class="nav-link taps_btn" id="profile-tab" name="jobs_tap" value="job"
                                    data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">الإعلانات
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-4 add_list_btn">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    الرجوع لصفحة القوائم
                </button>
            </div>
        </div>
        <div class="row" style="padding: 25px 10px">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active kwader-tap" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <h4>
                            {{ $existing->existing_name }}
                        </h4>
                        <div class="search searchStaff">
                            <div class="row">
                                @foreach( $favorites as $favorite )
                                    @foreach( \App\Models\Employee::where(['id' => $favorite->favoriteable_id])->get() as $employee)
                                        <div class="col-md-4">
                                            <div class="card" style="height: 360px; width: 100%">
                                                <div class="image" style="border-radius: 0; width: 100%">
                                                    <img src="{{ $employee->image }}" alt="avatar" style="object-fit: cover;" >
                                                </div>
                                                <div class="title">
                                                    <div class="avail">
                                                        @if( $employee->availability == 'Available' )
                                                            <span class="available" style="left: 330px">
                                                                متاح
                                                            </span>
                                                            <span class="dot" style="background-color: #080; left: 380px;"></span>
                                                        @elseif( $employee->availability == 'Unavailable' )
                                                            <span class="available" style="width: 84px;font-size: 15px; left: 310px">
                                                                غير متاح
                                                            </span>
                                                            <span class="dot" style="background-color: red; left: 380px"></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="name" style="width: 180px; top: 130px; left: 200px;">
                                                    <a href="{{ route('employee.dashboard.show', ['id' => $employee->id]) }}" style="cursor: pointer; text-decoration: none">
                                                        <h4 style="font-size: 20px">{{ $employee->user->first_name . ' ' . $employee->user->last_name }}</h4>
                                                    </a>
                                                    <img src="{{ asset('flags') . '/' . $employee->country->code . '.png' }}" >
                                                    <span style="font-size: 12px">
                                                        {{ $employee->country->country_name }}
                                                    </span>
                                                </div>
                                                <div class="foo" style="z-index: 2">
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
                                                    @if ( $employee->skills )
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
                                        </div>
                                    @endforeach
                                @endforeach

                        </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
