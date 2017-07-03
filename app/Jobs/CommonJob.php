<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client as GuzzleClient;
use App\Http\Responses\CommonResponse as Response;

abstract class CommonJob
{
    use Dispatchable, SerializesModels;

    public $apiUrl = null;
    public $apiKey = null;
    public $guzzleClient = null;
    public $resource = null;
    public $input = null;
    public $successfulStatuses = [
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

    public $notFoundStatus = 404;

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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
