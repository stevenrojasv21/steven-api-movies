<?php

namespace App\Listeners\Actor;

use App\Listeners\CommonListener as Listener;
use App\Events\Actor\SearchEvent;
use App\Jobs\Actor\Search;

class HandleSearchEvent extends Listener
{
    /**
     * Handle the event.
     *
     * @param  ShowEvent  $event
     * @return void
     */
    public function handle(SearchEvent $event)
    {
        $input = $event->getRequest()->all();
        $results = $this->dispatch(
            new Search($input)
        );

        $event->setResults($results);
    }
}
