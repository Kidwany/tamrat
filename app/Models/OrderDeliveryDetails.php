<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $item_id
 * @property integer $id
 * @property string $mosque
 * @property string $city
 * @property string $mosque_lat
 * @property string $mosque_long
 * @property string $name
 * @property string $phone
 * @property string $notes
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property OrderItem $orderItem
 */
class OrderDeliveryDetails extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_delivery_details';

    /**
     * @var array
     */
    protected $fillable = ['item_id', 'id', 'mosque', 'city', 'mosque_lat', 'mosque_long', 'name', 'phone', 'notes', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderItem()
    {
        return $this->belongsTo('App\OrderItem', 'item_id');
    }
}
