<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = \request('status');
        if ($status == 'waiting')
        {
            $orders = Order::with('orderFinance')->where('status_id', 3)->get();
            return view('dashboard.order.index', compact('orders'));
        }
        elseif($status == 'shipped')
        {
            $orders = Order::with('orderFinance')->where('status_id', 4)->get();
            return view('dashboard.order.index', compact('orders'));
        }
        elseif ($status == 'delivered')
        {
            $orders = Order::with('orderFinance')->where('status_id', 5)->get();
            return view('dashboard.order.index', compact('orders'));
        }
        else
        {
            $orders = Order::with('orderFinance')->where('user_id', '!=', null)->get();
            return view('dashboard.order.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderItems')->find($id);
        $orderItems = OrderItems::with('product')->where('order_id', $id)->get();
        return view('dashboard.order.show', compact('order', 'orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $order = Order::with('orderItems')->find($id);
        $status = $request->status;

        $order->status_id = $status;
        $order->save();

        return redirect()->back()->with('update', 'تم تعديل حالة الطلب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
