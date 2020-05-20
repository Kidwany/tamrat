<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class ProductController
 * @package App\Http\Controllers\Dashboard
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        try
        {
            if (isset($request->image))
            {
                $image = new Upload($request, 'image', 'products', 'image', Image::class);
                $uploadedImageId = $image->publicUpload();
                //$doctor->image_id = $uploadedImageId;
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Upload Your Profile Image, Please Try Again');
            return redirect()->back()->withInput();
        }

        try
        {
            $product = new Product();
            $product->title_ar = $request->name_ar;
            $product->desc_ar = $request->desc_ar;
            $product->price = $request->price;
            $product->weight = $request->weight;
            if (isset($request->active))
            {
                $product->status_id = 1;
            }
            else
            {
                $product->status_id = 2;
            }
            $product->image_id = $uploadedImageId;
            $product->save();

            return redirect(adminUrl('product'))->with('create', 'تم اضافة المنتج بنجاح');

        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'خطأ في حفظ البيانات');
            return redirect()->back()->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('image')->find($id);
        return view('dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::with('image')->find($id);
        $request->validate([
            'name_ar'   =>  'required',
            /*'name_en'   =>  'required',*/
            'desc_ar'   =>  'required',
            /*'desc_en'   =>  'required',*/
            'price'     =>  'required',
            'weight'    =>  'required',
            'active'    =>  'int',
        ], [] , [
            'name_ar'   =>  'Name in Arabic',
            'name_en'   =>  'Name in English',
            'desc_ar'   =>  'Description in Arabic',
            'desc_en'   =>  'Description in English',
        ]);


        try
        {
            $product->title_ar = \request('name_ar');
            /*$product->title_en = \request('name_en');*/
            $product->desc_ar = \request('desc_ar');
            /*$product->desc_en = \request('desc_en');*/
            $product->price = \request('price');
            $product->weight = \request('weight');
            if (isset($request->active))
            {
                $product->status_id = 1;
            }
            else
            {
                $product->status_id = 2;
            }
            if (isset($request->image))
            {
                $image = new Upload($request, 'image', 'products', 'image', Image::class);
                $uploadedImageId = $image->publicUpload();
                $product->image_id = $uploadedImageId;
            }
            $product->save();

            return redirect(adminUrl('product'))->with('update', 'تم تعديل المنتج بنجاح');
        }

        catch (\Exception $e)
        {
            Session::flash('exception', 'خطأ في حفظ البيانات');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with('image')->find($id);
        $product->delete();

        return redirect(adminUrl('product'))->with('delete', 'تم حذف المنتج بنجاح');
    }
}
