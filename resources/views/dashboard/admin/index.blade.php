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
                    <h2>المديرين</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">المديرين </a></li>
                        <li class="breadcrumb-item active"> جميع المديرين </li>
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
                            <h2><strong>قائمة </strong> مديري التطبيق </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الجوال</th>
                                        <th> الوضع </th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الجوال</th>
                                        <th> الوضع </th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>حسام الدين مصطفى</td>
                                        <td>a.metery@gmail.com</td>
                                        <td>+96642569845</td>
                                        <td> <span class="badge badge-success">نشط</span> </td>
                                        <td>منذ 3 اسبوع</td>
                                        <td>
                                            <a href="{{adminUrl('admin/5/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                            <a href="{{adminUrl('admin/5/delete')}}" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>احمد محمود جاد </td>
                                        <td>a.metery@gmail.com</td>
                                        <td>+96642569845</td>
                                        <td> <span class="badge badge-danger">معطل</span> </td>
                                        <td>منذ 3 اسبوع</td>
                                        <td>
                                            <a href="{{adminUrl('admin/5/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                            <a href="{{adminUrl('admin/5/delete')}}" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                        </td>
                                    </tr>
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
                <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف المدير <strong> حسام الدين مصطفى </strong></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect text-light">حذف</button>
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                </div>
            </div>
        </div>
    </div>

@endsection
