<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property string $discount_type
 * @property double $percentage
 * @property double $amount
 * @property double $name
 * @property double $delivery
 * @property string $date_start
 * @property string $date_end
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
        'date_start',
        'date_end',
        'status_id'
    ];

    public $timestamps = true;

    protected $dates = ['date_start'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
