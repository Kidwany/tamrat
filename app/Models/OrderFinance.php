<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_id
 * @property float $sub_total
 * @property float $discount
 * @property float $delivery
 * @property float $tax
 * @property float $total
 * @property string $notes
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 */
class OrderFinance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_finance';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'sub_total', 'discount', 'delivery', 'tax', 'total', 'notes', 'deleted_at', 'promo_code_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id')->withDefault();
    }
}
