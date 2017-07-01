<?php

namespace App\Listeners;

use App\Events\CommonEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

abstract class CommonListener
{
    use DispatchesJobs;

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
     * @param  CommonEvent  $event
     * @return void
     */
    public function handle(CommonEvent $event)
    {
        //
    }
}
