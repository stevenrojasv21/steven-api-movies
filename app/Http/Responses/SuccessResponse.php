<?php

namespace App\Http\Responses;

class SuccessResponse extends CommonResponse
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function __construct($content = '')
    {
        parent::__construct($content, $this::HTTP_OK);
    }
}
