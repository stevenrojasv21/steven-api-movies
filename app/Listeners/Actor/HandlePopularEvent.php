<?php

namespace App\Listeners\Actor;

use App\Listeners\CommonListener as Listener;
use App\Events\Actor\PopularEvent;
use App\Jobs\Actor\Popular;

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
