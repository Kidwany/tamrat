<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property PromoCode[] $promoCodes
 */
class PromoCodeType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'promo_code_type';

    /**
     * @var array
     */
    protected $fillable = ['type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promoCodes()
    {
        return $this->hasMany('App\PromoCode', 'type_id');
    }
}
