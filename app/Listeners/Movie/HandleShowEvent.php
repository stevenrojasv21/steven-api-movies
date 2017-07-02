<?php

namespace App\Listeners\Movie;

use App\Listeners\CommonListener as Listener;
use App\Events\Movie\ShowEvent;
use App\Jobs\Movie\Show;


class HandleShowEvent extends Listener
{
    /**
     * Handle the event.
     *
     * @param  ShowEvent  $event
     * @return void
     */
    public function handle(ShowEvent $event)
    {
        $input = $event->getRequest()->all();
        $results = $this->dispatch(
            new Show($input)
        );

        $event->setResults($results);
    }
}
