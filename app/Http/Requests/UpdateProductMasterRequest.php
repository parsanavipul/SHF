<?php

namespace App\Http\Requests;

use App\Models\ProductMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_master_edit');
    }

    public function rules()
    {
        return [
            'bank_id' => [
                'required',
                'integer',
            ],
            'product_name' => [
                'string',
                'required',
            ],
            'payout' => [
                'numeric',
                'required',
                'min:0',
                'max:100',
            ],
        ];
    }
}
