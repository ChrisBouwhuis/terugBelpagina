<?php

namespace App\Observers;

use App\Models\CallbackOrderUser;

class CallbackOrderObserver
{
    /**
     * Handle the CallbackOrderUser "created" event.
     */
    public function created(CallbackOrderUser $callbackOrderUser): void
    {
        // TODO: implement the status change logic
    }
}
