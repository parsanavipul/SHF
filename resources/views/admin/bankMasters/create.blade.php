@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bankMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank-masters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bankname">{{ trans('cruds.bankMaster.fields.bankname') }}</label>
                <input class="form-control {{ $errors->has('bankname') ? 'is-invalid' : '' }}" type="text" name="bankname" id="bankname" value="{{ old('bankname', '') }}" required>
                @if($errors->has('bankname'))
                    <span class="text-danger">{{ $errors->first('bankname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankMaster.fields.bankname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="billing_start_at">{{ trans('cruds.bankMaster.fields.billing_start_at') }}</label>
                <input class="form-control date {{ $errors->has('billing_start_at') ? 'is-invalid' : '' }}" type="text" name="billing_start_at" id="billing_start_at" value="{{ old('billing_start_at') }}" required>
                @if($errors->has('billing_start_at'))
                    <span class="text-danger">{{ $errors->first('billing_start_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankMaster.fields.billing_start_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="billing_end_at">{{ trans('cruds.bankMaster.fields.billing_end_at') }}</label>
                <input class="form-control date {{ $errors->has('billing_end_at') ? 'is-invalid' : '' }}" type="text" name="billing_end_at" id="billing_end_at" value="{{ old('billing_end_at') }}" required>
                @if($errors->has('billing_end_at'))
                    <span class="text-danger">{{ $errors->first('billing_end_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankMaster.fields.billing_end_at_helper') }}</span>
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