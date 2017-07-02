<?php

namespace App\Events;

use App\Http\Requests\CommonRequest as Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

abstract class CommonEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    var $request = null;
    var $results = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //Fix for missing params in the request
        //As this project does not use Iluminate\Request directly
        //Query string is missed for the request
        $input = $request->all();
        $request = $request->capture();
        $request->merge($input);
        $this->setRequest($request);
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setResults($results)
    {
        $this->results = $results;
    }

    public function getResults()
    {
        return $this->results;
    }
}
