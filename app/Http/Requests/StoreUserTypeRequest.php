<?php

namespace App\Http\Requests;

use App\Models\UserType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_type_create');
    }

    public function rules()
    {
        return [
            'user_type' => [
                'string',
                'required',
            ],
        ];
    }
}
