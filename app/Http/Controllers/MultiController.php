<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Multi\MultiEvent;
use App\Http\Requests\Multi\IndexRequest;

class MultiController extends Controller
{
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
}
