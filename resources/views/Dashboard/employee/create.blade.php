
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
    إضافة كادر
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
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    إضافة كادر جديد
                </div>
                <p class="mg-b-20">
                    يرجى إدخال البيانات المطلوبة هنا
                </p>
                <form action="#" data-parsley-validate="">
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">
                                    الأسم الأول
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="firstname" placeholder="أدخل الأسم الأول" required="" type="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">
                                    الأسم الأخير
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="أدخل الأسم الأخير" required="" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    البريد الإلكتروني
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="أدخل البريد الإلكتروني" type="email">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    كلمة المرور
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="أدخل كلمة المرور" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    تأكيد كلمة المرور
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="تأكيد كلمة المرور" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    رقم الجوال
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="تأكيد كلمة المرور" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                    <p class="mg-b-10">
                                        الدولة
                                    </p>
                                    <select class="form-control select2-no-search">
                                        <option label="Choose one">
                                        </option>
                                        <option value="Firefox">
                                            Firefox
                                        </option>
                                    </select>

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <p class="mg-b-10">
                                    اللغة
                                </p>
                                <select class="form-control select2-no-search">
                                    <option label="Choose one">
                                    </option>
                                    <option value="Firefox">
                                        Firefox
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    الجنس
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control" name="lastname" placeholder="تأكيد كلمة المرور" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">
                                    تاريخ الميلاد
                                    <span class="tx-danger">*</span>
                                </label>
                                <div class="input-group col-md-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">
                                Validate Form
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
