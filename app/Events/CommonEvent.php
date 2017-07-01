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

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->setRequest($request);
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(Request $request)
    {
        return $this->request;
    }
}
