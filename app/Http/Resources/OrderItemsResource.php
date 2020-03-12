<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use App\Classes\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class OrderItemsResource extends Resource
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
            'image' => url($this->product->image->path),
            'title' => $this->product->{'title_' . UserSetting::userLanguage()},
            'quantity' => $this->quantity,
            'mosque' => $this->orderDeliveryDetails->mosque,
        ];
    }
}
