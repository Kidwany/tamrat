<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property Product $product
 * @property OrderDeliveryDetail[] $orderDeliveryDetails
 */
class OrderItems extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_items';


    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'quantity', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderDeliveryDetails()
    {
        return $this->hasOne('App\Models\OrderDeliveryDetails', 'item_id');
    }
}
