@extends('dashboard.layouts.layouts')
@section('title', 'العروض')
@section('customizedStyle')
@endsection

@section('customizedScript')



@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>العروض</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> تمرة </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">العروض </a></li>
                        <li class="breadcrumb-item active"> جميع العروض </li>
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>قائمة </strong> العروض </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>تاريخ العرض</th>
                                        <th> نسبة الخصم </th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>تاريخ العرض</th>
                                        <th> نسبة الخصم </th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($offers)
                                        @foreach($offers as $offer)
                                            <tr>
                                                <td>{{$offer->id}}</td>
                                                <td>{{$offer->name}}</td>
                                                <td>{{$offer->date_start->format('d M Y')}}</td>
                                                <td>{{$offer->percentage * 100 . '%'}}</td>
                                                <td>{{$offer->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{adminUrl('offer/'. $offer->id .'/edit')}}" class="btn btn-primary"><i class="zmdi zmdi-edit"></i> </a>
                                                    <a href="#" class="btn bg-red waves-effect" data-toggle="modal" data-target="#delete{{$offer->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
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

    @if($offers)
        @foreach($offers as $offer)
            <div class="modal fade" id="delete{{$offer->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">حذف العرض</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف العرض <strong> {{$offer->title_ar}} </strong></div>
                        <form id="deleteProduct{{$offer->id}}" style="display: none" action="{{route('offer.destroy', $offer->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteProduct{{$offer->id}}">حذف</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@endsection
