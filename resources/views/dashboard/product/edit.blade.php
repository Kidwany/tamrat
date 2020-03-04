@extends('dashboard.layouts.layouts')
@section('title', 'المنتجات')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>المنتجات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">المنتجات </a></li>
                        <li class="breadcrumb-item active"> منتج جديد </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <form method="post" action="{{route('product.update', $product->id)}}"  enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>عدل بيانات المنتج باللغة العربية  <strong></strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">اسم المنتج</label>
                                        <div class="form-group">
                                            <input type="text" name="name_ar" value="{{$product->title_ar}}" id="email_address" class="form-control" placeholder="ادخل اسم المنتج">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">وصف المنتج</label>
                                        <div class="form-group">
                                            <input type="text" name="desc_ar" value="{{$product->desc_ar}}" id="email_address" class="form-control" placeholder="ادخل وصفا دقيقا للمنتج">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">السعر</label>
                                        <div class="form-group">
                                            <input type="number" name="price" value="{{$product->price}}" step="any" id="email_address" class="form-control" placeholder="ادخل سعر المنتج بالريال السعودي">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">وزن الكرتونة</label>
                                        <div class="form-group">
                                            <input type="number" name="weight" value="{{$product->weight}}" id="email_address" class="form-control" placeholder="ادخل وزن الكرتونة بالكيلو غرام">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">صورة المنتج</label>
                                        <div class="form-group">
                                            <input type="file" name="image" id="email_address" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <input id="remember_me" name="active" type="checkbox" value="1" {{$product->status_id == 1 ? 'checked' : ''}}>
                                            <label for="remember_me">
                                                اظهر المنتج على التطبيق
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">حفظ</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>عدل بيانات المنتج باللغة الإنجليزية</strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">اسم المنتج</label>
                                        <div class="form-group">
                                            <input type="text" name="name_en" value="{{$product->title_en}}" id="email_address" class="form-control" placeholder="ادخل اسم المنتج">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">وصف المنتج</label>
                                        <div class="form-group">
                                            <input type="text" name="desc_en" value="{{$product->desc_en}}" id="email_address" class="form-control" placeholder="ادخل وصفا دقيقا للمنتج">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
