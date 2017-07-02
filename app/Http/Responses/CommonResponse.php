<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;

abstract class CommonResponse extends Response
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function __construct($content = '', $status = 200)
    {
        parent::__construct($content, $status);
    }
}
