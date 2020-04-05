@extends('dashboard.layouts.layouts')
@section('title', 'العروض')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>العروض</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">العروض </a></li>
                        <li class="breadcrumb-item active"> عرض جديد </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @include('dashboard.layouts.messages')
            <!-- Vertical Layout -->
            <form action="{{route('offer.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>اضف بيانات العرض  </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address">اسم العرض</label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{old('name')}}" id="email_address" class="form-control" placeholder="ادخل اسم العرض">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address">نسبة الخصم</label>
                                        <div class="form-group">
                                            <input type="number" name="percentage" value="{{old('percentage')}}" step="any" id="email_address" class="form-control" placeholder="ادخل النسبة المؤوية للخصم مثال: 10">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address"> قيمة التوصيل  </label>
                                        <div class="form-group">
                                            <input type="number" name="delivery" value="{{old('delivery')}}" id="email_address" class="form-control" placeholder="ادخل قيمة التوصيل اثناء الخصم">
                                            <p class="help-inline">ان لم تقم بإدخال اي قيمة فسوف يتم اعتماد القيمة المدخلة في اعدادات الدفع تلقائيا </p>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address">
                                            تاريخ بدئ العرض
                                        </label>
                                        <div class="form-group">
                                            <input type="date" name="start" value="{{old('start')}}" id="email_address" class="form-control" placeholder="ادخل قيمة الضريبة اثناء الخصم">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address">
                                            تاريخ انتهاء العرض
                                        </label>
                                        <div class="form-group">
                                            <input type="date" name="end" value="{{old('end')}}" id="email_address" class="form-control" placeholder="ادخل قيمة الضريبة اثناء الخصم">
                                        </div>
                                    </div>



                                    {{--<div class="col-sm-12">
                                        <div class="checkbox">
                                            <input id="remember_me" name="active" type="checkbox" value="1">
                                            <label for="remember_me">
                                                اظهر المنتج على التطبيق
                                            </label>
                                        </div>
                                    </div>--}}

                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
