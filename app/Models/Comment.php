<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function callbackOrder(): BelongsTo
    {
        return $this->belongsTo(CallbackOrder::class);
    }
}
