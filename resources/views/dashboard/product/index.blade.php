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
                        <li class="breadcrumb-item active"> جميع المنتجات </li>
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
                            <h2><strong>قائمة </strong> المنتجات </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الصورة</th>
                                        <th>الإسم</th>
                                        <th>السعر</th>
                                        <th>وزن الكرتونة</th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الصورة</th>
                                        <th>الإسم</th>
                                        <th>السعر</th>
                                        <th>وزن الكرتونة</th>
                                        <th> تمت الإضافة </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($products)
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td><img src="{{assetPath($product->image->path)}}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover"></td>
                                                <td>{{$product->title_ar}}</td>
                                                <td>{{$product->price}} ر.س</td>
                                                <td>{{$product->weight}} كجم</td>
                                                <td>{{$product->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{adminUrl('product/'. $product->id .'/edit')}}" class="btn btn-primary"><i class="zmdi zmdi-edit"></i> </a>
                                                    <a href="#" class="btn bg-red waves-effect" data-toggle="modal" data-target="#delete{{$product->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
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

    @if($products)
        @foreach($products as $product)
            <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">حذف المنتج</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف المنتج <strong> {{$product->title_ar}} </strong></div>
                        <form id="deleteProduct{{$product->id}}" style="display: none" action="{{route('product.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteProduct{{$product->id}}">حذف</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@endsection
