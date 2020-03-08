@extends('dashboard.layouts.layouts')

@section('title', 'لوحة التحكم')

@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')




    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>لوحة التحكم</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                    <li class="breadcrumb-item active"> لوحة التحكم </li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-left"></i></button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{--Statistics--}}

        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>المستخدمين</h6>
                        <h2>20 <small class="info">مستخدم نشط</small></h2>
                        <small>45% اكثر من الشهر السابق</small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>الطلبات</h6>
                        <h2>58<small class="info"> طلب </small></h2>
                        <small>6% اعلى من الشهر السابق</small>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>المنتجات</h6>
                        <h2>45 <small class="info">منتج</small></h2>
                        <small>اجمالي عدد المنتجات النشطة</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon domains">
                    <div class="body">
                        <h6>المبيعات</h6>
                        <h2> 12.000 <small class="info"> ريال سعودي </small></h2>
                        <small>اعلى 89% من الشهر السابق</small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
