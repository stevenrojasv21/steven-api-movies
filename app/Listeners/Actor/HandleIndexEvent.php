<?php

namespace App\Listeners\Actor;

use App\Events\Actor\IndexEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleIndexEvent
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
     * @param  IndexEvent  $event
     * @return void
     */
    public function handle(IndexEvent $event)
    {
        //
    }
}
