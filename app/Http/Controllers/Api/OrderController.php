<?php

namespace App\Http\Controllers\Api;

use App\Classes\UserSetting;
use App\Http\Controllers\Controller;
use App\Http\Resources\MyOrderDetailsResource;
use App\Http\Resources\MyOrdersResource;
use App\Http\Resources\OrderFinanceDetailsResource;
use App\Http\Resources\OrderItemsResource;
use App\Models\Order;
use App\Models\OrderFinance;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     *
     ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'sub_total' => double
     * 'tax' => double
     * 'discount' => double
     * 'delivery' => double
     * 'total' => double
     * 'order_id' => integer
     * 'payment_method' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     * Token  => Bearer
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => Sub Total is Required
     * 403 => Tax is Required
     * 404 => Order Not Found
     * 405 => Delivery is Required
     * 406 => Discount is Required
     * 407 => Total is Required
     * 408 => Order ID is Required
     * 409 => Payment Method is Required
     * 200 =>  Successfully
     *
     */
    public function saveOrderFinance(Request $request)
    {

        if (empty($request->sub_total))
        {
            return response()->json(['status' => 402, 'message' => 'Sub Total is Required'], 402);
        }
        elseif (empty($request->tax))
        {
            return response()->json(['status' => 403, 'message' => 'Tax is Required'], 403);
        }
        elseif (empty($request->delivery))
        {
            return response()->json(['status' => 405, 'message' => 'Delivery is Required'], 405);
        }
        elseif (empty($request->discount))
        {
            return response()->json(['status' => 406, 'message' => 'Discount is Required'], 406);
        }
        elseif (empty($request->total))
        {
            return response()->json(['status' => 407, 'message' => 'Total is Required'], 407);
        }
        elseif (empty($request->order_id))
        {
            return response()->json(['status' => 408, 'message' => 'Order ID is Required'], 408);
        }
        elseif (empty($request->payment_method))
        {
            return response()->json(['status' => 409, 'message' => 'Payment Method is Required'], 409);
        }

        $order = Order::with('orderFinance')->find($request->order_id);
        if (!$order)
        {
            return response()->json(['status' => 404, 'message' => 'Order Not Found'], 404);
        }

        $order->user_id = Auth::user()->id;
        $order->status_id = 7;
        $order->save();


        $order->orderFinance()->update([
            'order_id' => $order->id,
            'sub_total' => $request->sub_total,
            'tax' => $request->tax,
            'delivery' => $request->delivery,
            'discount' => $request->discount,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
        ]);

        $orderItems = OrderItems::with('order', 'product')->where('order_id', $order->id)->get();
        $financeDetails = OrderFinance::where('order_id', $order->id)->first();


        return response()->json([
            'status' => 200,
            'message' => 'Order Finance Details Added Successfully and waiting Payment',
            'items' => OrderItemsResource::collection($orderItems),
            'financeDetails' => new OrderFinanceDetailsResource($financeDetails)
        ]);


    }

    /**
     *
     * ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'product_id' => integer
     * 'quantity' => integer
     * 'mosque' => 'string'
     * 'city' => 'string'
     * 'lat' => 'string'
     * 'long' => 'string'
     * 'address' => 'text'
     * 'name' => 'string'
     * 'phone' => 'string'
     * 'notes' => 'text'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 400 => Product ID in Index is Required
     * 402 => Items Can't Be Empty
     * 403 => Quantity in Index is Required
     * 405 => Mosque in Index is Required
     * 406 => City in Index is Required
     * 407 => Name in Index is Required
     * 408 => Phone in Index is Required
     * 409 => Lat in Index is Required
     * 410 => Long in Index is Required
     * 200 => registered Successfully
     *
    */
    public function myOrders()
    {
        $orders = Order::with('orderFinance')
            ->where('user_id', Auth::user()->id)
            ->where('status_id', '!=', 6)
            ->get();

        return response()->json(['status' => 200, 'orders' => MyOrdersResource::collection($orders)]);
    }


    public function myOrderDetails(Request $request)
    {
        $order = Order::with('orderFinance')->find($request->order_id);


        if (empty($request->order_id))
        {
            return response()->json(['status' => 402, 'message' => 'Order ID is Required'], 402);
        }

        elseif (!$order) {
            return response()->json(['status' => 404, 'message' => 'Order Not Found'], 404);
        }

        $orderItems = OrderItems::with('order', 'product')->where('order_id', $order->id)->get();
        $financeDetails = OrderFinance::where('order_id', $order->id)->first();


        return response()->json([
            'status' => 200,
            'orderStatus' => ['status_id' => $order->status_id, 'status_title' => $order->status->{'title_' . UserSetting::userLanguage()}],
            'items' => OrderItemsResource::collection($orderItems),
            'financeDetails' => new OrderFinanceDetailsResource($financeDetails)
        ], 200);



    }

}
