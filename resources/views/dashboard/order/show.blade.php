@extends('dashboard.layouts.layouts')
@section('title', 'المستخدمين')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>الطلبات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">الطلبات </a></li>
                        <li class="breadcrumb-item active"> تفاصيل الطلب  </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="body_scroll">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body">
                                    <h5><strong>كود الطلب: </strong> {{$order->code}}</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <address>
                                                <strong>{{$order->user->name}}.</strong><br>
                                                {{$order->user->email}}<br>
                                                <abbr title="Phone">جوال:</abbr> {{$order->user->phone}}
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <p class="mb-0"><strong>تاريخ الطلب: </strong> {{$order->created_at->format('d M Y')}}</p>
                                            <p class="mb-0"><strong>حالة الطلب: </strong> <span class="badge badge-success"> {{$order->status->title_ar}} </span></p>
                                            <p class="mb-0"><strong>طريقة الدفع: </strong> <span class="badge badge-primary">  {{$order->orderFinance->payment_method}} </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover c_table theme-color">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>المنتج</th>
                                                    <th class="hidden-sm-down">المسجد</th>
                                                    <th>الكمية</th>
                                                    <th class="hidden-sm-down">سعر الوحدة</th>
                                                    <th>الإجمالي</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($orderItems)
                                                    @foreach($orderItems as $item)
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td><img src="{{assetPath($item->product->image->path)}}" width="40" alt="Product img"></td>
                                                            <td> {{$item->product->title_ar}} </td>
                                                            <td class="hidden-sm-down">
                                                                {{$item->orderDeliveryDetails->city}} - {{$item->orderDeliveryDetails->mosque}}
                                                                <br>
                                                                <strong>اسم المستلم: </strong>{{$item->orderDeliveryDetails->name}}
                                                                <br>
                                                                <strong>جوال المستلم: </strong> {{$item->orderDeliveryDetails->phone}}
                                                            </td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td class="hidden-sm-down">{{$item->product->price}} ر.س</td>
                                                            <td>{{($item->quantity) * $item->product->price}} ر.س</td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>تفاصيل التوصيل</h5>
                                        </div>
                                        <div class="col-lg-9">
                                            @include('dashboard.layouts.messages')
                                            <form action="{{route('order.update', $order->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card">
                                                            <div class="header">
                                                                <h2><strong>ادخل حالة الطلب التي ستظهر للمستخدم في التطبيق</strong></h2>
                                                            </div>
                                                            <div class="body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <div class="radio inlineblock m-r-20">
                                                                                <input type="radio" name="status" id="received" class="with-gap" value="3" {{$order->status_id ==3 ? 'checked' : ''}}>
                                                                                <label for="received">تم استلام الطلب</label>
                                                                            </div>
                                                                            <div class="radio inlineblock">
                                                                                <input type="radio" name="status" id="shipped" class="with-gap" value="4" {{$order->status_id ==4 ? 'checked' : ''}}>
                                                                                <label for="shipped">تم شحن الطلب</label>
                                                                            </div>
                                                                            <div class="radio inlineblock">
                                                                                <input type="radio" name="status" id="delivered" class="with-gap" value="5" {{$order->status_id ==5 ? 'checked' : ''}}>
                                                                                <label for="delivered">تم تسليم الطلب</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">حفظ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-md-3 text-right">
                                            <ul class="list-unstyled">
                                                <li><strong>الإجمالي:-</strong> {{$order->orderFinance->sub_total}}</li>
                                                <li class="text-danger"><strong>الخصم:-</strong>  {{$order->orderFinance->discount}}%</li>
                                                <li><strong>الضريبة:-</strong>  {{$order->orderFinance->tax}}%</li>
                                                <li><strong>التوصيل:-</strong>  {{$order->orderFinance->delivery}} ر.س</li>
                                            </ul>
                                            <h3 class="mb-0 text-success">ر.س {{$order->orderFinance->total}}</h3>
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
