<?php

namespace App\Listeners;

use App\Events\RoomEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RoomEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RoomEvent  $event
     * @return void
     */
    public function handle(RoomEvent $event)
    {
        //
    }
}
