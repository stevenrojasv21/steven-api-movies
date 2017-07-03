<?php

namespace App\Http\Responses;


class BadRequestResponse extends CommonResponse
{
    /**
     * 
     *
     * @return void
     */
    public function __construct($content = '')
    {
        parent::__construct($content, $this::HTTP_BAD_REQUEST);
    }
}
