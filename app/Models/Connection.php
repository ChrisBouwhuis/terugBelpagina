<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Connection extends Model
{
    public $table = 'connection_history';

    public function CallbackOrder(): BelongsTo
    {
        return $this->belongsTo(CallbackOrder::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
