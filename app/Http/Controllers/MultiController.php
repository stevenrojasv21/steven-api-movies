<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Multi\IndexEvent;
use App\Http\Requests\Multi\IndexRequest;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\FailedResponse;
use App\Http\Responses\TooManyRequestsResponse;

class MultiController extends Controller
{
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
}
