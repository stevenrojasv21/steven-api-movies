<?php

namespace App\Listeners\Actor;

use App\Events\Actor\ShowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleShowEvent
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
     * @param  ActorShowEvent  $event
     * @return void
     */
    public function handle(ActorShowEvent $event)
    {
        //
    }
}
