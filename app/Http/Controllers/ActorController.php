<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Events\Actor\IndexEvent;
use App\Events\Actor\ShowEvent;
use App\Events\Actor\PopularEvent;
use App\Events\Actor\SearchEvent;
use App\Events\Actor\MoviesEvent;
use App\Http\Responses\CommonResponse as Response;
use App\Http\Requests\Actor\IndexRequest;
use App\Http\Requests\Actor\ShowRequest;
use App\Http\Requests\Actor\PopularRequest;
use App\Http\Requests\Actor\SearchRequest;
use App\Http\Requests\Actor\MoviesRequest;
use App\Http\Responses\SuccessResponse;
use App\Http\Responses\FailedResponse;
use App\Http\Responses\NotFoundResponse;
use App\Http\Responses\BadRequestResponse;
use Illuminate\Validation\ValidationException;

class ActorController extends Controller
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
        } catch (ValidationException $e) {
            return new BadRequestResponse();
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
        } catch (ValidationException $e) {
            return new BadRequestResponse();
        } catch (Exception $e) {
            return new FailedResponse();
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $event = new SearchEvent($request);
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
        } catch (ValidationException $e) {
            return new BadRequestResponse();
        } catch (Exception $e) {
            return new FailedResponse();
        }
    }

    public function movies(MoviesRequest $request, $id)
    {
        try {
            $event = new MoviesEvent($request, $id);
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
        } catch (ValidationException $e) {
            return new BadRequestResponse();
        } catch (Exception $e) {
            return new FailedResponse();
        }
    }
}
