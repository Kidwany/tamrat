<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use App\Classes\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class MyOrdersResource extends Resource
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
            'id' => $this->id,
            'code' => $this->code,
            'price' => $this->orderFinance->total,
            'date' => $this->created_at,
        ];
    }
}
