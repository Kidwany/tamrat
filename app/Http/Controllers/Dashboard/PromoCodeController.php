<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = PromoCode::all();
        return view('dashboard.promoCode.index', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.promoCode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'              =>  'required|max:50',
            'expire'            =>  'required|date',
        ]);


        $promo_code = new PromoCode();
        $promo_code->code = $request->code;
        $promo_code->expire_date = $request->expire;
        if (isset($request->amount))
        {
            $promo_code->amount = $request->amount;
        }
        if (isset($request->delivery))
        {
            $promo_code->delivery = $request->delivery;
        }
        $promo_code->save();


        return redirect(adminUrl('promo-code'))->with('create', 'تم انشاء الكود بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $code = PromoCode::find($id);
        return view('dashboard.promoCode.edit', compact('code'));
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
        $code = PromoCode::find($id);

        $request->validate([
            'code'              =>  'required|max:50',
            'expire'            =>  'required|date',
        ]);

        $code->code = $request->code;
        $code->expire_date = $request->expire;
        if (isset($request->amount))
        {
            $code->amount = $request->amount;
        }
        if (isset($request->delivery))
        {
            $code->delivery = $request->delivery;
        }
        $code->save();

        return redirect(adminUrl('promo-code'))->with('create', 'تم تعديل الكود بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = PromoCode::find($id);
        $code->delete();

        return redirect()->back()->with('create', 'تم مسح الكود بنجاح');
    }
}
