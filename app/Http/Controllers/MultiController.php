<?php

namespace App\Http\Controllers;

use App\Events\Multi\IndexEvent;
use App\Http\Requests\Multi\IndexRequest;
use App\Http\Responses\CommonResponse as Response;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\FailedResponse;
use App\Http\Responses\NotFoundResponse;

class MultiController extends Controller
{
    public function index(IndexRequest $request)
    {
    	try {
            $event = new IndexEvent($request);
            $response = null;

            event($event);

            $eventResults = $event->getResults();

            switch ($eventResults['status']) {
                case Response::HTTP_NOT_FOUND:
                    $response = new NotFoundResponse();
                    break;
                case Response::HTTP_OK:
                    $response = new SuccessResponse($eventResults['content']);
                    break;
                default:
                    $response = new FailedResponse();
                    break;        
            }

            return $response;
        } catch (Exception $e) {
            return new FailedResponse();
        }
    }
}
