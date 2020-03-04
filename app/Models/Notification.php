<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $notifiable_id
 * @property integer $sent_from
 * @property string $type
 * @property string $notifiable_type
 * @property string $title
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 */
class Notification extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notifications';

    /**
     * @var array
     */
    protected $fillable = ['notifiable_id', 'sent_from', 'type', 'notifiable_type', 'title', 'data', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sentTo()
    {
        return $this->belongsTo('App\User', 'notifiable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sentFrom()
    {
        return $this->belongsTo('App\User', 'sent_from');
    }
}
