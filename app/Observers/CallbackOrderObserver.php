<?php

namespace App\Observers;

use App\Models\CallbackOrderUser;
use Illuminate\Support\Facades\Log;

class CallbackOrderObserver
{
    /**
     * Handle the CallbackOrderUser "created" event.
     */
    public function created(CallbackOrderUser $callbackOrderUser): void
    {
        // TODO: implement the status change logic
        Log::error('CallbackOrderUser created');
        $callbackOrderUser->callbackOrder->status = 'in progress';
        $callbackOrderUser->callbackOrder->save();
    }
}
