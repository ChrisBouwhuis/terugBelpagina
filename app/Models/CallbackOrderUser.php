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

    public static function boot(): void
    {
        static::created(function (User $user) {
            Log::error('test');
        });
    }
}
