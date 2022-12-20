<?php

namespace App\Http\Requests;

use App\Models\BankMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_master_edit');
    }

    public function rules()
    {
        return [
            'bankname' => [
                'string',
                'required',
                'unique:bank_masters,bankname,' . request()->route('bank_master')->id,
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
