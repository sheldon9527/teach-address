<?php

namespace App\Http\Requests\Api\Attachment;

use App\Http\Requests\Api\Request;

class UpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filename' => 'required|string',
            'description' => 'string',
        ];
    }
}
