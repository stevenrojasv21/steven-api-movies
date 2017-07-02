<?php

namespace App\Jobs\Actor;

use App\Jobs\CommonJob as Job;

class Popular extends Job
{
	var $resource = null;

	/**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
    	$this->resource = 'person/popular';
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

        return true;
    }
}
