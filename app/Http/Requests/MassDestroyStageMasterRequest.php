<?php

namespace App\Http\Requests;

use App\Models\StageMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStageMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stage_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stage_masters,id',
        ];
    }
}
