<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
    }

    public function rules()
    {
        return [
            'firstname' => [
                'string',
                'required',
            ],
            'lastname' => [
                'string',
                'nullable',
            ],
            'mobile_no' => [
                'string',
                'required',
            ],
            'reference_by_id' => [
                'required',
                'integer',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pan_card_no' => [
                'string',
                'nullable',
            ],
        ];
    }
}
