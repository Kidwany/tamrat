<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function check(Request $request)
    {
        if (empty($request->code))
        {
            return response()->json(['status' => 402, 'message' => 'Code is Required'], 402);
        }

        $code = PromoCode::where('code', $request->code)->where('expire_date', '>=', Carbon::today())->first();
        if (!$code)
        {
            return response()->json(['status' => 404, 'message' => 'Invalid Code'], 404);
        }

        $paymentInfo = PaymentSetting::first();

        if ($code->amount)
        {
            $discount = $code->amount;
        }
        else
        {
            $discount = 0;
        }


        if ($code->delivery || $code->delivery = 0)
        {
            $delivery = $code->delivery;
        }
        else
        {
            $delivery = $paymentInfo->delivery;
        }

        return response()->json(
            [
                'status' => 200,
                'data' => [
                    'discount' => floatval($discount) ,
                    'delivery' => floatval($delivery) ,
                    'tax' => floatval($paymentInfo->tax)
                ]
            ], 200);

    }
}
