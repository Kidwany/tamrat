<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property int $total_orders_count
 * @property float $total_orders_amount
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 */
class TotalUserOrders extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'total_user_orders';

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
    protected $fillable = ['user_id', 'total_orders_count', 'total_orders_amount', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\User');
    }
}
