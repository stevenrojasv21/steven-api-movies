<?php

namespace App\Jobs\Actor;

use App\Jobs\CommonJob as Job;

class Movies extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        parent::__construct();
        $this->resource = 'person/'.$input['id'].'/movie_credits';
        $this->method = 'GET';
        $this->url =  $this->resource."?api_key=".$this->apiKey;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $response = $this->guzzleClient->request(
                $this->method,
                $this->url
            );

            $movies = json_decode($response->getBody()->getContents(), true)['cast'];

            return [
                'status' => $response->getStatusCode(),
                'content' => $movies
            ];
        } catch (ClientException $e) {
            return [
                'status' => $e->getResponse()->getStatusCode(),
                'content' => ''
            ];
        } catch (Exception $e) {
            return [
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'content' => ''
            ];
        }
    }
}
