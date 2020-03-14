@extends('dashboard.layouts.layouts')
@section('title', 'التحويلات البنكية')
@section('customizedStyle')
@endsection

@section('customizedScript')



@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>التحويلات البنكية</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> التحويلات البنكية </a></li>
                        <li class="breadcrumb-item active"> جميع التحويلات </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong> قائمة </strong> التحويلات البنكية </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الصورة</th>
                                        <th>كود الطلب</th>
                                        <th>مبلغ التحويل</th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الصورة</th>
                                        <th>كود الطلب</th>
                                        <th>مبلغ التحويل</th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($transfers)
                                        @foreach($transfers as $transfer)
                                            <tr>
                                                <td>{{$transfer->id}}</td>
                                                <td><img src="{{$transfer->image_url}}" style="width: 50px; height: 50px; object-fit: cover"></td>
                                                <td>{{$transfer->order->code}} </td>
                                                <td>{{$transfer->amount}} ر.س</td>
                                                <td> {{$transfer->created_at->diffForHumans()}} </td>
                                                <td>
                                                    <a href="{{adminUrl('bank-transfer/' . $transfer->id)}}" class="btn btn-primary"><i class="zmdi zmdi-eye"></i> </a>
{{--
                                                    <a href="{{adminUrl('bank-transfer/5/delete')}}" class="btn bg-red waves-effect" data-toggle="modal" data-target="#delete" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
--}}
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
    </div>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-red">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">حذف المستخدم</h4>
                </div>
                <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف المستخدم <strong> عبد الله المطيري </strong></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect text-light">حذف</button>
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                </div>
            </div>
        </div>
    </div>

@endsection
