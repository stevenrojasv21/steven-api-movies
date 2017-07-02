<?php

namespace App\Listeners\Multi;

use App\Listeners\CommonListener as Listener;
use App\Events\Multi\IndexEvent;
use App\Jobs\Multi\Index;

class HandleIndexEvent
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
