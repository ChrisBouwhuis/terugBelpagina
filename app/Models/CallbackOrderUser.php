<?php

namespace App\Models;

use App\Observers\CallbackOrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Log;

#[ObservedBy([CallbackOrderObserver::class])]
class CallbackOrderUser extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function callbackOrder(): BelongsTo
    {
        return $this->belongsTo(CallbackOrder::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedUser(): BelongsTo
    {
        return $this->user()->latest()->value('name');
    }

    public static function boot(): void
    {
        static::created(function (User $user) {
            Log::error('test');
        });
    }
}
