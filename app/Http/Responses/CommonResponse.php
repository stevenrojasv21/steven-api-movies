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
    	$statusFlag = false;

    	switch ($status) {
    		case $this::HTTP_OK:
    		case $this::HTTP_CREATED:
    		case $this::HTTP_ACCEPTED:
    		case $this::HTTP_NON_AUTHORITATIVE_INFORMATION:
    		case $this::HTTP_NO_CONTENT:
    		case $this::HTTP_RESET_CONTENT:
    		case $this::HTTP_PARTIAL_CONTENT:
    		case $this::HTTP_MULTI_STATUS:
    		case $this::HTTP_ALREADY_REPORTED:
    		case $this::HTTP_IM_USED:
    			$statusFlag = true;
    			break;
    		default:
    			$statusFlag = false;
    			break;
    	}

    	$data = [
    		'status' => $statusFlag,
    		'content' => $content
    	];

        parent::__construct($data, $status);
    }
}
