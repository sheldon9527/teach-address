<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\Request;

class VerifyPasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|alpha_num|between:6,20',
        ];
    }
}
