@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bankMaster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bankMaster.fields.id') }}
                        </th>
                        <td>
                            {{ $bankMaster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankMaster.fields.bankname') }}
                        </th>
                        <td>
                            {{ $bankMaster->bankname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankMaster.fields.billing_start_at') }}
                        </th>
                        <td>
                            {{ $bankMaster->billing_start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankMaster.fields.billing_end_at') }}
                        </th>
                        <td>
                            {{ $bankMaster->billing_end_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection