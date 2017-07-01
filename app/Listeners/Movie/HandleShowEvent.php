<?php

namespace App\Listeners\Movie;

use App\Events\Movie\ShowEvent;
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
     * @param  ShowEvent  $event
     * @return void
     */
    public function handle(ShowEvent $event)
    {
        //
    }
}
