<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $table = 'payment_setting';

    protected $fillable = ['delivery', 'tax'];

    public $timestamps = true;

}
