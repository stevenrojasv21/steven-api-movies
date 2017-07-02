<?php

namespace App\Listeners\Actor;

use App\Listeners\CommonListener as Listener;
use App\Events\Actor\ShowEvent;
use App\Jobs\Actor\Show;

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
