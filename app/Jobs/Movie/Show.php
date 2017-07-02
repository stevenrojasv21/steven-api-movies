<?php

namespace App\Jobs\Movie;

use App\Jobs\CommonJob as Job;
use GuzzleHttp\Exception\ClientException;

class Show extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input)
    {
    	parent::__construct();
    	$this->resource = 'movie/'.$input['id'];
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

            return [
                'status' => $response->getStatusCode(),
                'content' => json_decode($response->getBody()->getContents())
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
