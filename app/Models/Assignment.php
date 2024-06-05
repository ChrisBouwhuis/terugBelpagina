<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    protected $fillable = [
        'callback_orders_id',
        'user_id',
        'additional_comment',
    ];

    public function callbackOrder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CallbackOrder::class);
    }

}
