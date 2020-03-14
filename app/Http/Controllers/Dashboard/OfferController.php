<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Discount::all();
        return view('dashboard.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offer.create');
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
            'name'          =>  'required',
            'start'         =>  'required|date',
            'end'           =>  'required|date',
        ], [] , [
        ]);

        $offer = new Discount();
        $offer->date_start = $request->start;
        $offer->date_end = $request->end;
        $offer->name = $request->name;
        if (isset($request->percentage))
        {
            $offer->percentage = $request->percentage / 100;
        }
        if (isset($request->delivery))
        {
            $offer->delivery = $request->delivery;
        }
        $offer->save();

        return redirect(adminUrl('offer'))->with('create', 'تم اضافة العرض بنجاح');
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
        $offer = Discount::find($id);
        return view('dashboard.offer.edit', compact('offer'));
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
        $offer = Discount::find($id);
        $request->validate([
            'name'          =>  'required',
            'start'         =>  'required|date',
            'end'           =>  'required|date',
        ], [] , [
        ]);

        $offer->date_start = $request->start;
        $offer->date_end = $request->end;
        $offer->name = $request->name;
        if (isset($request->percentage))
        {
            $offer->percentage = $request->percentage /100 ;
        }
        if (isset($request->delivery))
        {
            $offer->delivery = $request->delivery;
        }
        $offer->save();

        return redirect(adminUrl('offer'))->with('update', 'تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Discount::find($id);
        $offer->delete();

        return redirect(adminUrl('offer'))->with('update', 'تم حذف العرض بنجاح');
    }
}
