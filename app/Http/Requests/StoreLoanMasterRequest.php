<?php

namespace App\Http\Requests;

use App\Models\LoanMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoanMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('loan_master_create');
    }

    public function rules()
    {
        return [
            'bank_id' => [
                'required',
                'integer',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'subproduct_id' => [
                'required',
                'integer',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
            'stage_id' => [
                'required',
                'integer',
            ],
            'application_no' => [
                'string',
                'nullable',
            ],
            'loan_account_no' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'required',
            ],
            'loan_tenure' => [
                'numeric',
            ],
            'is_self_connector' => [
                'required',
            ],
            'dme_1_id' => [
                'required',
                'integer',
            ],
            'dme_2_id' => [
                'required',
                'integer',
            ],
            'sanctioned_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'disbursement_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
