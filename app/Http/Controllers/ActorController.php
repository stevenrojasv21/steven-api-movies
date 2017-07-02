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
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\FailedResponse;
use App\Http\Responses\TooManyRequestsResponse;

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
    		return new FailedResponse();
    	}
    }

    public function show(ShowRequest $request, $id)
    {
    	try {
    		$event = new ShowEvent($request, $id);

    		event($event);

    		return new SuccessResponse($event->getResults());
    	} catch (Exception $e) {
    		return new FailedResponse();
    	}
    }

    public function popular(PopularRequest $request)
    {
    	try {
    		$event = new PopularEvent($request);

    		event($event);

            $eventResults = $event->getResults();

            //Errors that come from Guzzle
            if (!$eventResults) {
                return new FailedResponse();
            }

    		return new SuccessResponse($eventResults);
    	} catch (Exception $e) {
    		return new FailedResponse();
    	}
    }
}
