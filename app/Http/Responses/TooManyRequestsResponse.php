<?php

namespace App\Http\Responses;


class TooManyRequestsResponse extends CommonResponse
{
    /**
     * 
     *
     * @return void
     */
    public function __construct($content = '')
    {
        parent::__construct($content, $this::HTTP_TOO_MANY_REQUESTS);
    }
}
