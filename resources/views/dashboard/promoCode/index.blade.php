@extends('dashboard.layouts.layouts')
@section('title', ' الرموز الترويجية ')
@section('customizedStyle')
@endsection

@section('customizedScript')



@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>الإشعارات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرات </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> الرموز الترويجية </a></li>
                        <li class="breadcrumb-item active">  الرموز الترويجية </li>
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
                            <h2><strong>قائمة </strong>  الرموز الترويجية  </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                @include('dashboard.layouts.messages')
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الكود</th>
                                        <th> تاريخ الإنتهاء </th>
                                        <th> الخصم </th>
                                        <th> التوصيل </th>
                                        <th> تم الإنشاء في </th>
                                        <th> تعديل </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الكود</th>
                                        <th> تاريخ الإنتهاء </th>
                                        <th> الخصم </th>
                                        <th> التوصيل </th>
                                        <th> تم الإنشاء في </th>
                                        <th> تعديل </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($codes)
                                        @foreach($codes as $code)
                                            <tr>
                                                <td>{{$code->id}}</td>
                                                <td>{{$code->code}}</td>
                                                <td>{{$code->expire_date->format('M d Y')}}</td>
                                                <td>{{$code->amount}} ر.س </td>
                                                <td>{{$code->delivery}} ر.س </td>
                                                <td>{{$code->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{adminUrl('promo-code/' . $code->id . '/edit')}}" class="btn btn-primary"><i class="zmdi zmdi-edit"></i> </a>
                                                    <a href="{{adminUrl('promo-code/'. $code->id . '/delete')}}" class="btn bg-red waves-effect" data-toggle="modal" data-target="#delete{{$code->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
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


    @if($codes)
        @foreach($codes as $code)
            <div class="modal fade" id="delete{{$code->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">حذف الرمز الترويجي</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف الرمز الترويجي <strong> {{$code->name}} </strong></div>
                        <form id="deleteUser{{$code->id}}" style="display: none" action="{{route('promo-code.destroy', $code->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$code->id}}">حذف</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
