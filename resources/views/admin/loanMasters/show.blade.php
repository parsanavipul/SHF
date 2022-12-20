@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loanMaster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.id') }}
                        </th>
                        <td>
                            {{ $loanMaster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.bank') }}
                        </th>
                        <td>
                            {{ $loanMaster->bank->bankname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.product') }}
                        </th>
                        <td>
                            {{ $loanMaster->product->product_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.subproduct') }}
                        </th>
                        <td>
                            {{ $loanMaster->subproduct->product_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.customer') }}
                        </th>
                        <td>
                            {{ $loanMaster->customer->firstname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.stage') }}
                        </th>
                        <td>
                            {{ $loanMaster->stage->stage ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.application_no') }}
                        </th>
                        <td>
                            {{ $loanMaster->application_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.loan_account_no') }}
                        </th>
                        <td>
                            {{ $loanMaster->loan_account_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.amount') }}
                        </th>
                        <td>
                            {{ $loanMaster->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.loan_tenure') }}
                        </th>
                        <td>
                            {{ $loanMaster->loan_tenure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.is_self_connector') }}
                        </th>
                        <td>
                            {{ App\Models\LoanMaster::IS_SELF_CONNECTOR_SELECT[$loanMaster->is_self_connector] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.dme_1') }}
                        </th>
                        <td>
                            {{ $loanMaster->dme_1->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.dme_2') }}
                        </th>
                        <td>
                            {{ $loanMaster->dme_2->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.dme_3') }}
                        </th>
                        <td>
                            {{ $loanMaster->dme_3->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.sanctioned_date') }}
                        </th>
                        <td>
                            {{ $loanMaster->sanctioned_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.sanctioned_amount') }}
                        </th>
                        <td>
                            {{ $loanMaster->sanctioned_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.disbursement_date') }}
                        </th>
                        <td>
                            {{ $loanMaster->disbursement_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanMaster.fields.disbursement_amount') }}
                        </th>
                        <td>
                            {{ $loanMaster->disbursement_amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection