<?php

namespace App\Http\Responses;


class FailedResponse extends CommonResponse
{
    /**
     * 
     *
     * @return void
     */
    public function __construct($content = '')
    {
        parent::__construct($content, $this::HTTP_INTERNAL_SERVER_ERROR);
    }
}
