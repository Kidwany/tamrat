@extends('dashboard.layouts.layouts')
@section('title', 'مديري التطبيق')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>مديري التطبيق</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">مديري التطبيق </a></li>
                        <li class="breadcrumb-item active"> مدير جديد </li>
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
            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> الإسم </label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{old('name')}}" id="email_address" class="form-control" placeholder="ادخل اسم المدير" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">البريد الإلكتروني</label>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{old('email')}}" id="email_address" class="form-control" placeholder="ادخل البريد الإلكتروني" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">الجوال</label>
                                        <div class="form-group">
                                            <input type="number" name="phone" value="{{old('phone')}}" step="any" id="email_address" class="form-control" placeholder="ادخل رقم الجوال ">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> كلمة السر </label>
                                        <div class="form-group">
                                            <input type="number" name="password" value="{{old('password')}}" id="email_address" class="form-control" placeholder="ادخل كلمة السر المكونة من 8 ارقام و حروف">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">تأكيد كلمة السر </label>
                                        <div class="form-group">
                                            <input type="number" name="password-confirmation" value="{{old('password-confirmation')}}" id="email_address" class="form-control" placeholder="اعد ادخال كلمة السر">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <input id="remember_me" name="active" type="checkbox">
                                            <label for="remember_me">
                                                مدير نشط
                                            </label>
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
