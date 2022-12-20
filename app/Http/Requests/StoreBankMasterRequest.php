<?php

namespace App\Http\Requests;

use App\Models\BankMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBankMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_master_create');
    }

    public function rules()
    {
        return [
            'bankname' => [
                'string',
                'required',
                'unique:bank_masters',
            ],
            'billing_start_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'billing_end_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
