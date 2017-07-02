<?php

namespace App\Events\Actor;

use App\Events\CommonEvent as Event;
use App\Http\Requests\CommonRequest as Request;

class MoviesEvent extends Event
{
	/**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, $id)
    {
		$request->merge(['id' => $id]);
    	parent::__construct($request);
    }
}
