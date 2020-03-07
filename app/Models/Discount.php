<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property string $discount_type
 * @property double $percentage
 * @property double $amount
 * @property double $delivery
 * @property integer $status_id
*/


class Discount extends Model
{

    protected $table = 'discount';

    protected $fillable = [
        'name',
        'discount_type',
        'percentage',
        'amount',
        'delivery',
        'status_id'
    ];

    public $timestamps = true;

    protected $dates = ['date'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
