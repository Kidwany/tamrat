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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">التحويلات البنكية </a></li>
                        <li class="breadcrumb-item active"> التحويلات البنكية  </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="preview preview-pic tab-content">
                                        <div class="tab-pane active" id="product_1"><img src="{{$transfer->image_url}}" class="img-fluid" alt="" /></div>
                                        {{--<div class="tab-pane" id="product_2"><img src="assets/images/ecommerce/2.png" class="img-fluid" alt=""/></div>
                                        <div class="tab-pane" id="product_3"><img src="assets/images/ecommerce/3.png" class="img-fluid" alt=""/></div>
                                        <div class="tab-pane" id="product_4"><img src="assets/images/ecommerce/4.png" class="img-fluid" alt=""/></div>--}}
                                    </div>
                                    {{--<ul class="preview thumbnail nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product_1"><img src="assets/images/ecommerce/1.png" alt=""/></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_2"><img src="assets/images/ecommerce/2.png" alt=""/></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_3"><img src="assets/images/ecommerce/3.png" alt=""/></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_4"><img src="assets/images/ecommerce/4.png" alt=""/></a></li>
                                    </ul>--}}
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-12">
                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{$transfer->owner_name}}</h3>
                                        <h5 class="price mt-0">مبلغ التحويل: <span class="col-amber">3200 ر.س</span></h5>
                                        <hr>
                                        <h5 class="sizes"><strong> كود الطلب: </strong>
                                            <span class="size" title="small">#{{$transfer->order->code}}</span>
                                        </h5>
                                        <h5 class="sizes"><strong>رقم حساب المحول:</strong>
                                            <span class="size" title="small">{{$transfer->account_number}}</span>
                                        </h5>
                                        <h5 class="colors"><strong>البنك: </strong>
                                            <span class="size" title="small">{{$transfer->bank_name}}</span>
                                        </h5>
                                        <div class="action">
                                            <a href="{{adminUrl('order/' . $transfer->order_id)}}" class="btn btn-primary waves-effect" type="button">شاهد تفاصيل الطلب</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
