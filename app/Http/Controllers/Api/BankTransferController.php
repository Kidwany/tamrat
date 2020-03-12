<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BankTransfer;
use App\Models\Order;
use Illuminate\Http\Request;

class BankTransferController extends Controller
{

    /**
     * * ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'order_id' => integer
     * 'bank_name' => string
     * 'owner_name' => 'string'
     * 'account_number' => 'string'
     * 'amount' => 'double'
     * 'image_url' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => Order ID is Required
     * 403 => Bank Name is Required
     * 404 => Order Not Found
     * 405 => Owner Name is Required
     * 406 => Account Number is Required
     * 407 => Account Number is Required
     * 408 => Image Url is Required
     * 200 =>  Successfully
    */
    public function store(Request $request)
    {
        if (empty($request->order_id))
        {
            return response()->json(['status' => 402, 'message' => 'Order ID is Required'], 402);
        }
        elseif (empty($request->bank_name))
        {
            return response()->json(['status' => 403, 'message' => 'Bank Name is Required'], 403);
        }
        elseif (empty($request->owner_name))
        {
            return response()->json(['status' => 405, 'message' => 'Owner Name is Required'], 405);
        }
        elseif (empty($request->account_number))
        {
            return response()->json(['status' => 406, 'message' => 'Account Number is Required'], 406);
        }
        elseif (empty($request->amount))
        {
            return response()->json(['status' => 407, 'message' => 'Account Number is Required'], 407);
        }
        elseif (empty($request->image_url))
        {
            return response()->json(['status' => 408, 'message' => ' Image Url is Required'], 408);
        }

        $order = Order::with('orderFinance')->find($request->order_id);
        if (!$order)
        {
            return response()->json(['status' => 404, 'message' => 'Order Not Found'], 404);
        }

        $bankTransfer = new BankTransfer();
        $bankTransfer->order_id = $order->id;
        $bankTransfer->bank_name = $request->bank_name;
        $bankTransfer->owner_name = $request->owner_name;
        $bankTransfer->account_number = $request->account_number;
        $bankTransfer->amount = $request->amount;
        $bankTransfer->image_url = $request->image_url;
        $bankTransfer->save();


        return response()->json(['status' => 200, 'message' => 'Transfer Has Been Created Successfully'], 200);
    }
}
