<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Events\Movie\IndexEvent;
use App\Events\Movie\ShowEvent;
use App\Events\Movie\PopularEvent;
use App\Http\Requests\Movie\IndexRequest;
use App\Http\Requests\Movie\ShowRequest;
use App\Http\Requests\Movie\PopularRequest;

class MovieController extends Controller
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
