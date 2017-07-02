<?php

namespace App\Listeners\Movie;

use App\Listeners\CommonListener as Listener;
use App\Events\Movie\IndexEvent;
use App\Jobs\Movie\Index;

class HandleIndexEvent extends Listener
{
    /**
     * Handle the event.
     *
     * @param  IndexEvent  $event
     * @return void
     */
    public function handle(IndexEvent $event)
    {
        $input = $event->getRequest()->all();
        $results = $this->dispatch(
            new Index($input)
        );

        $event->setResults($results);
    }
}
