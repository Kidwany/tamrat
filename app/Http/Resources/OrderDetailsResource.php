<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use App\Classes\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class OrderDetailsResource extends Resource
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
            'title' => $this->{'title_' . UserSetting::userLanguage()},
            'description' => $this->{'desc_' . UserSetting::userLanguage()},
            'image' => url($this->image->path),
            'price' => $this->price,
            'weight' => $this->weight,
        ];
    }
}
