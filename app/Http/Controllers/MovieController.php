<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Events\Movie\IndexEvent;
use App\Events\Movie\ShowEvent;
use App\Events\Movie\PopularEvent;
use App\Http\Responses\CommonResponse as Response;
use App\Http\Requests\Movie\IndexRequest;
use App\Http\Requests\Movie\ShowRequest;
use App\Http\Requests\Movie\PopularRequest;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\FailedResponse;
use App\Http\Responses\NotFoundResponse;

class MovieController extends Controller
{
    //
    public function index(IndexRequest $request)
    {
    	try {
    		$event = new IndexEvent($request);

    		event($event);

    		$eventResults = $event->getResults();

            //Errors that come from Guzzle
            if (!$eventResults) {
                return new FailedResponse();
            }

            return new SuccessResponse($eventResults);
    	} catch (Exception $e) {
    		return new FailedResponse($e);
    	}
    }

    public function show(ShowRequest $request, $id)
    {
    	try {
    		$event = new ShowEvent($request, $id);
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

    public function popular(PopularRequest $request)
    {
    	try {
            $event = new PopularEvent($request);
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
