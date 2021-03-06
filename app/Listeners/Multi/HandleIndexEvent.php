<?php

namespace App\Listeners\Multi;

use App\Listeners\CommonListener as Listener;
use App\Events\Multi\IndexEvent;
use App\Jobs\Multi\Index;

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
        //Get variables from query string
        $input = array_merge($input, $event->getRequest()->query());
        $results = $this->dispatch(
            new Index($input)
        );

        $event->setResults($results);
    }
}
