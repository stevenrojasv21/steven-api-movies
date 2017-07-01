<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Events\Actor\IndexEvent;
use App\Events\Actor\ShowEvent;
use App\Events\Actor\PopularEvent;
use App\Http\Requests\Actor\IndexRequest;
use App\Http\Requests\Actor\ShowRequest;
use App\Http\Requests\Actor\PopularRequest;

class ActorController extends Controller
{
    //
    public function index(IndexRequest $request)
    {
    	try {
    		$event = new IndexEvent($request);

    		event($event);

    		return new SuccessResponse($event->getResults());
    	} catch (Exception $e) {
    		return new ErrorResponse();
    	}
    }

    public function show(ShowRequest $request, $id)
    {
    	try {
    		$event = new ShowEvent($request);

    		event($event);

    		return new SuccessResponse($event->getResults());
    	} catch (Exception $e) {
    		return new ErrorResponse();
    	}
    }

    public function popular(PopularRequest $request)
    {
    	try {
    		$event = new PopularEvent($request);

    		event($event);

    		return new SuccessResponse($event->getResults());
    	} catch (Exception $e) {
    		return new ErrorResponse();
    	}
    }
}
