<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $image_id
 * @property string $bank_name
 * @property string $owner_name
 * @property string $account_number
 * @property float $amount
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Image $image
 */
class BankTransfer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank_transfer';

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
    protected $fillable = ['image_id', 'bank_name', 'owner_name', 'account_number', 'amount', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
