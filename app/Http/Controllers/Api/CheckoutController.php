<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderFinanceDetailsResource;
use App\Http\Resources\OrderItemsResource;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderFinance;
use App\Models\OrderItems;
use App\Models\PaymentSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function getPaymentSetting()
    {
        $todayDate = Carbon::today();
        $discount = Discount::where('date', $todayDate)->first();
        $paymentInfo = PaymentSetting::first();


        if ($discount)
        {
            return response()->json(
                [
                    'status' => 200,
                    'data' => [
                        'discount' => $discount->percentage,
                        'delivery' => $discount->delivery,
                        'tax' => $paymentInfo->tax
                    ]
                ], 200);
        }
        else
        {
            return response()->json(
                [
                    'status' => 200,
                    'data' => [
                        'discount' => 0,
                        'delivery' => $paymentInfo->delivery,
                        'tax' => $paymentInfo->tax
                    ]
                ]
                , 200);
        }

    }

    /**
     *
     ***********************************************************
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
    public function saveOrderItems(Request $request)
    {
        if (empty($request->items))
        {
            return response()->json(['status' => 402, 'message' => 'Items Can\'t Be Empty'], 402);
        }

        $order = new Order();
        $order->status_id = 6;
        $order->code = '#' . Str::random(6);
        $order->save();

        foreach ($request->items as $itemIndex => $value)
        {
            if (empty($value['product_id']))
            {
                return response()->json(['status' => 400, 'message' => 'Product ID in Index[' . $itemIndex . '] is Required'], 403);
            }
            elseif (empty($value['quantity']))
            {
                return response()->json(['status' => 403, 'message' => 'Quantity in Index[' . $itemIndex . '] is Required'], 403);
            }
            elseif (empty($value['mosque']))
            {
                return response()->json(['status' => 405, 'message' => 'Mosque in Index[' . $itemIndex . '] is Required'], 405);
            }
            elseif (empty($value['city']))
            {
                return response()->json(['status' => 406, 'message' => 'City in Index[' . $itemIndex . '] is Required'], 406);
            }
            elseif (empty($value['name']))
            {
                return response()->json(['status' => 407, 'message' => 'Name in Index[' . $itemIndex . '] is Required'], 407);
            }
            elseif (empty($value['phone']))
            {
                return response()->json(['status' => 408, 'message' => 'Phone in Index[' . $itemIndex . '] is Required'], 408);
            }
            elseif (empty($value['lat']))
            {
                return response()->json(['status' => 409, 'message' => 'Lat in Index[' . $itemIndex . '] is Required'], 407);
            }
            elseif (empty($value['long']))
            {
                return response()->json(['status' => 410, 'message' => 'Long in Index[' . $itemIndex . '] is Required'], 410);
            }

            $item = $order->orderItems()->create([
                'order_id' => $order->id,
                'product_id' => $value['product_id'],
                'quantity' => $value['quantity'],
            ]);

            $item->orderDeliveryDetails()->create([
                'item_id' => $item->id,
                'mosque' => $value['mosque'],
                'city' => $value['city'],
                'address' => $value['address'],
                'mosque_lat' => $value['lat'],
                'mosque_long' => $value['long'],
                'name' => $value['name'],
                'phone' => $value['phone'],
                'notes' => $value['notes'],
            ]);
        }

        return response()->json(['status' => 200, 'message' => 'Order Items Has Been Added Successfully', 'data' => ['order_id' => $order->id] ], 200);
    }

}
