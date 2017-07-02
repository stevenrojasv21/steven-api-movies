<?php

namespace App\Jobs\Movie;

use App\Jobs\CommonJob as Job;

class Index extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
    	$this->resource = 'movie';
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

	        if (!$this->checkResponse($response)) {
	        	return false;
	        }

	        return $response->getBody()->getContents();
	    } catch (ClientException $e) {
			return false;
		} catch (Exception $e) {
			return false;
		}
    }
}
