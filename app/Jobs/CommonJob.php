<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

abstract class CommonJob
{
    use Dispatchable, SerializesModels;

    var $apiUrl = null;
    var $apiKey = null;
    var $guzzleClient = null;
    var $successfulStatuses = [
        200,
        201,
        202,
        203,
        204,
        205,
        206,
        207,
        208,
        226,
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiUrl = config('app.apiUrl');
        $this->apiKey = config('app.apiKey');
        $this->guzzleClient = new GuzzleClient(
            [
                // Base URI is used with relative requests
                'base_uri' => $this->apiUrl,
            ]
        );
    }

    /**
     * Check Guzzle Status Response 
     *
     * @return boolean
     */
    public function checkResponse($response)
    {
        $status = $response->getStatusCode();
        if (!in_array($status, $this->successfulStatuses)) {
            return false;
        }

        return true;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
