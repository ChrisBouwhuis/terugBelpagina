<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Connection extends Model
{
    public $table = 'connection_history';

    protected $fillable = [
        'user_id',
        'callback_order_id',
    ];

    public function callbackOrder(): BelongsTo
    {
        return $this->belongsTo(CallbackOrder::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
