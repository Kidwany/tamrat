<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use App\Classes\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class OrderFinanceDetailsResource extends Resource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->order_id,
            'sub_total' => $this->sub_total,
            'discount' => $this->discount,
            'delivery' => $this->delivery,
            'tax' => $this->tax,
            'payment_method' => $this->payment_method,
            'total' => $this->total,
        ];
    }
}
