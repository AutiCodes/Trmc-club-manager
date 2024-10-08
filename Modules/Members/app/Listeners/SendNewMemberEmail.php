<?php

namespace Modules\Members\Listeners;

use Modules\Members\app\Events\NewMember;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewMemberEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewMember $event): void
    {
        //
    }
}
