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
                        <h2>{{$users}} <small class="info">مستخدم نشط</small></h2>
                        <small>عدد المسخدمين النشطين  </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>الطلبات</h6>
                        <h2>{{$ordersCount}}<small class="info"> طلب </small></h2>
                        <small>عدد الطلبات التي تمت </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>المنتجات</h6>
                        <h2>{{$products}} <small class="info">منتج</small></h2>
                        <small>عدد المنتجات المضافة</small>
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
                        <h2> {{$sales}} <small class="info"> ريال سعودي </small></h2>
                        <small>حجم المبيعات من التطبيق</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>أحدث </strong> الطلبات  </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>الكود</th>
                                    <th> قيمة الطلب </th>
                                    <th> حالة الطلب </th>
                                    <th> تم الطلب </th>
                                    <th>تعديل</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>م</th>
                                    <th>الكود</th>
                                    <th> قيمة الطلب </th>
                                    <th> حالة الطلب </th>
                                    <th> تم الطلب </th>
                                    <th>تعديل</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($orders)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->code}}</td>
                                            <td>{{$order->orderFinance->total}} ر.س</td>
                                            <td><span class="badge badge-info">{{$order->status->title_ar}}</span></td>
                                            <td>{{$order->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{adminUrl('order/'.$order->id)}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-eye"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
