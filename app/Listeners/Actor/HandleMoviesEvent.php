<?php

namespace App\Listeners\Actor;

use App\Listeners\CommonListener as Listener;
use App\Events\Actor\MoviesEvent;
use App\Jobs\Actor\Movies;

class HandleMoviesEvent extends Listener
{
    /**
     * Handle the event.
     *
     * @param  ShowEvent  $event
     * @return void
     */
    public function handle(MoviesEvent $event)
    {
        $input = $event->getRequest()->all();
        $results = $this->dispatch(
            new Movies($input)
        );

        $event->setResults($results);
    }
}
