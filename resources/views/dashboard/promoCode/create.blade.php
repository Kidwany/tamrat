@extends('dashboard.layouts.layouts')
@section('title', ' الرموز الترويجية')
@section('customizedStyle')
    {{--<style>
        .discount-input
        {
            display: none;
        }
    </style>--}}
@endsection

@section('customizedScript')

    {{--<script>
        $(document).ready(function () {

            $('input[type = "radio"]').click(function () {
                var inputValue = $(this).attr("value");
                var targetInput = $("." + inputValue);

                $(".discount-input").not(targetInput).hide();
                $(targetInput).show();
            })

        })
    </script>--}}

@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> الرموز الترويجية</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرات </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> الرموز الترويجية </a></li>
                        <li class="breadcrumb-item active"> رمز جديد </li>
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
            <form action="{{route('promo-code.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>اضف بيانات الرمز  </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address"> الكود </label>
                                        <div class="form-group">
                                            <input type="text" name="code" value="{{old('code')}}" id="email_address" class="form-control" placeholder="ادخل الكود الترويجي" required >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-3">
                                        <label for="email_address">تاريخ الإنتهاء</label>
                                        <div class="form-group">
                                            <input type="date" name="expire" value="{{old('expire')}}" step="any" id="email_address" class="form-control" placeholder="ادخل وصف الإشعار" required >
                                        </div>
                                    </div>

                                    {{--<div class="form-group">
                                        <div class="radio m-r-20">
                                            <input type="radio" name="discount" id="logged" class="with-gap" value="amount" >
                                            <label for="logged">خصم قيمة من اجمالي الطلب</label>
                                        </div>
                                        <div class="radio m-r-20">
                                            <input type="radio" name="discount" id="guest" class="with-gap" value="percentage" >
                                            <label for="guest">خصم نسبة من إجمالي الطلب</label>
                                        </div>
                                        <div class="radio m-r-20">
                                            <input type="radio" name="discount" id="all" class="with-gap" value="delivery" >
                                            <label for="all">خصم قيمة التوصيل</label>
                                        </div>
                                    </div>--}}
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-3 amount discount-input">
                                        <label for="email_address">قيمة الخصم</label>
                                        <div class="form-group">
                                            <input type="number" name="amount" value="{{old('amount')}}" step="any" id="email_address" class="form-control" placeholder="ادخل قيمة الخصم من اجمالي قيمة الطلب مثال: 50 ريال " >
                                        </div>
                                    </div>

                                    {{--<div class="col-lg-6 col-md-12 col-sm-3 percentage discount-input">
                                        <label for="email_address">نسبة الخصم</label>
                                        <div class="form-group">
                                            <input type="number" name="percentage" value="{{old('percentage')}}" step="any" id="email_address" class="form-control" placeholder="ادخل النسبة المؤوية للخصم مثال: 10" >
                                        </div>
                                    </div>--}}

                                    <div class="col-lg-6 col-md-12 col-sm-3 delivery discount-input">
                                        <label for="email_address"> قيمة التوصيل  </label>
                                        <div class="form-group">
                                            <input type="number" name="delivery" value="{{old('delivery')}}" id="email_address" class="form-control" placeholder="ادخل قيمة التوصيل اثناء الخصم" >
                                            <p class="help-inline">ان لم تقم بإدخال اي قيمة فسوف يتم اعتماد القيمة المدخلة في اعدادات الدفع تلقائيا </p>
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
    </div>

@endsection
