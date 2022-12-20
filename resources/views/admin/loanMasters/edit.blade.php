@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.loanMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.loan-masters.update", [$loanMaster->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="bank_id">{{ trans('cruds.loanMaster.fields.bank') }}</label>
                <select class="form-control select2 {{ $errors->has('bank') ? 'is-invalid' : '' }}" name="bank_id" id="bank_id" required>
                    @foreach($banks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('bank_id') ? old('bank_id') : $loanMaster->bank->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.loanMaster.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $loanMaster->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subproduct_id">{{ trans('cruds.loanMaster.fields.subproduct') }}</label>
                <select class="form-control select2 {{ $errors->has('subproduct') ? 'is-invalid' : '' }}" name="subproduct_id" id="subproduct_id" required>
                    @foreach($subproducts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('subproduct_id') ? old('subproduct_id') : $loanMaster->subproduct->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subproduct'))
                    <span class="text-danger">{{ $errors->first('subproduct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.subproduct_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.loanMaster.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $loanMaster->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stage_id">{{ trans('cruds.loanMaster.fields.stage') }}</label>
                <select class="form-control select2 {{ $errors->has('stage') ? 'is-invalid' : '' }}" name="stage_id" id="stage_id" required>
                    @foreach($stages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('stage_id') ? old('stage_id') : $loanMaster->stage->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('stage'))
                    <span class="text-danger">{{ $errors->first('stage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.stage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="application_no">{{ trans('cruds.loanMaster.fields.application_no') }}</label>
                <input class="form-control {{ $errors->has('application_no') ? 'is-invalid' : '' }}" type="text" name="application_no" id="application_no" value="{{ old('application_no', $loanMaster->application_no) }}">
                @if($errors->has('application_no'))
                    <span class="text-danger">{{ $errors->first('application_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.application_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_account_no">{{ trans('cruds.loanMaster.fields.loan_account_no') }}</label>
                <input class="form-control {{ $errors->has('loan_account_no') ? 'is-invalid' : '' }}" type="text" name="loan_account_no" id="loan_account_no" value="{{ old('loan_account_no', $loanMaster->loan_account_no) }}">
                @if($errors->has('loan_account_no'))
                    <span class="text-danger">{{ $errors->first('loan_account_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.loan_account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.loanMaster.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $loanMaster->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_tenure">{{ trans('cruds.loanMaster.fields.loan_tenure') }}</label>
                <input class="form-control {{ $errors->has('loan_tenure') ? 'is-invalid' : '' }}" type="number" name="loan_tenure" id="loan_tenure" value="{{ old('loan_tenure', $loanMaster->loan_tenure) }}" step="0.01">
                @if($errors->has('loan_tenure'))
                    <span class="text-danger">{{ $errors->first('loan_tenure') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.loan_tenure_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.loanMaster.fields.is_self_connector') }}</label>
                <select class="form-control {{ $errors->has('is_self_connector') ? 'is-invalid' : '' }}" name="is_self_connector" id="is_self_connector" required>
                    <option value disabled {{ old('is_self_connector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\LoanMaster::IS_SELF_CONNECTOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_self_connector', $loanMaster->is_self_connector) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_self_connector'))
                    <span class="text-danger">{{ $errors->first('is_self_connector') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.is_self_connector_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dme_1_id">{{ trans('cruds.loanMaster.fields.dme_1') }}</label>
                <select class="form-control select2 {{ $errors->has('dme_1') ? 'is-invalid' : '' }}" name="dme_1_id" id="dme_1_id" required>
                    @foreach($dme_1s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dme_1_id') ? old('dme_1_id') : $loanMaster->dme_1->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dme_1'))
                    <span class="text-danger">{{ $errors->first('dme_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.dme_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dme_2_id">{{ trans('cruds.loanMaster.fields.dme_2') }}</label>
                <select class="form-control select2 {{ $errors->has('dme_2') ? 'is-invalid' : '' }}" name="dme_2_id" id="dme_2_id" required>
                    @foreach($dme_2s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dme_2_id') ? old('dme_2_id') : $loanMaster->dme_2->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dme_2'))
                    <span class="text-danger">{{ $errors->first('dme_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.dme_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dme_3_id">{{ trans('cruds.loanMaster.fields.dme_3') }}</label>
                <select class="form-control select2 {{ $errors->has('dme_3') ? 'is-invalid' : '' }}" name="dme_3_id" id="dme_3_id">
                    @foreach($dme_3s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dme_3_id') ? old('dme_3_id') : $loanMaster->dme_3->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dme_3'))
                    <span class="text-danger">{{ $errors->first('dme_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.dme_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sanctioned_date">{{ trans('cruds.loanMaster.fields.sanctioned_date') }}</label>
                <input class="form-control date {{ $errors->has('sanctioned_date') ? 'is-invalid' : '' }}" type="text" name="sanctioned_date" id="sanctioned_date" value="{{ old('sanctioned_date', $loanMaster->sanctioned_date) }}">
                @if($errors->has('sanctioned_date'))
                    <span class="text-danger">{{ $errors->first('sanctioned_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.sanctioned_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sanctioned_amount">{{ trans('cruds.loanMaster.fields.sanctioned_amount') }}</label>
                <input class="form-control {{ $errors->has('sanctioned_amount') ? 'is-invalid' : '' }}" type="number" name="sanctioned_amount" id="sanctioned_amount" value="{{ old('sanctioned_amount', $loanMaster->sanctioned_amount) }}" step="0.01">
                @if($errors->has('sanctioned_amount'))
                    <span class="text-danger">{{ $errors->first('sanctioned_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.sanctioned_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disbursement_date">{{ trans('cruds.loanMaster.fields.disbursement_date') }}</label>
                <input class="form-control date {{ $errors->has('disbursement_date') ? 'is-invalid' : '' }}" type="text" name="disbursement_date" id="disbursement_date" value="{{ old('disbursement_date', $loanMaster->disbursement_date) }}">
                @if($errors->has('disbursement_date'))
                    <span class="text-danger">{{ $errors->first('disbursement_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.disbursement_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disbursement_amount">{{ trans('cruds.loanMaster.fields.disbursement_amount') }}</label>
                <input class="form-control {{ $errors->has('disbursement_amount') ? 'is-invalid' : '' }}" type="number" name="disbursement_amount" id="disbursement_amount" value="{{ old('disbursement_amount', $loanMaster->disbursement_amount) }}" step="0.01">
                @if($errors->has('disbursement_amount'))
                    <span class="text-danger">{{ $errors->first('disbursement_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.loanMaster.fields.disbursement_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection