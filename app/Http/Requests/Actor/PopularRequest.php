<?php

namespace App\Http\Requests\Actor;

use App\Http\Requests\CommonRequest as Request;

class PopularRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page' => 'sometimes|integer|min:1|max:1000',
        ];
    }
}
