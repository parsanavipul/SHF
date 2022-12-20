<?php

namespace App\Http\Requests;

use App\Models\StageMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStageMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stage_master_edit');
    }

    public function rules()
    {
        return [
            'stage' => [
                'string',
                'required',
            ],
            'order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
