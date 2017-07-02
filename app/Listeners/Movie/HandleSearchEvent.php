<?php

namespace App\Listeners\Movie;

use App\Listeners\CommonListener as Listener;
use App\Events\Movie\SearchEvent;
use App\Jobs\Movie\Search;

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
