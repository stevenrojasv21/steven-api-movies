<?php

namespace App\Listeners\Movie;

use App\Events\Movie\PopularEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandlePopularEvent
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
     * @param  PopularEvent  $event
     * @return void
     */
    public function handle(PopularEvent $event)
    {
        //
    }
}
