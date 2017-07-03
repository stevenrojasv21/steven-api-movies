<?php

namespace App\Http\Responses;

class NotFoundResponse extends CommonResponse
{
    /**
     *
     *
     * @return void
     */
    public function __construct($content = '')
    {
        parent::__construct($content, $this::HTTP_NOT_FOUND);
    }
}
