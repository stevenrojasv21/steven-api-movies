<?php

namespace App\Listeners\Movie;

use App\Listeners\CommonListener as Listener;
use App\Events\Movie\PopularEvent;
use App\Jobs\Movie\Popular;

class HandlePopularEvent extends Listener
{
    /**
     * Handle the event.
     *
     * @param  PopularEvent  $event
     * @return void
     */
    public function handle(PopularEvent $event)
    {
        $input = $event->getRequest()->all();
        $results = $this->dispatch(
            new Popular($input)
        );

        $event->setResults($results);
    }
}
