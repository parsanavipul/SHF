@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="firstname">{{ trans('cruds.customer.fields.firstname') }}</label>
                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', $customer->firstname) }}" required>
                @if($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.firstname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lastname">{{ trans('cruds.customer.fields.lastname') }}</label>
                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', $customer->lastname) }}">
                @if($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.lastname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.customer.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $customer->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_no">{{ trans('cruds.customer.fields.mobile_no') }}</label>
                <input class="form-control {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}" type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no', $customer->mobile_no) }}" required>
                @if($errors->has('mobile_no'))
                    <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_address">{{ trans('cruds.customer.fields.email_address') }}</label>
                <input class="form-control {{ $errors->has('email_address') ? 'is-invalid' : '' }}" type="email" name="email_address" id="email_address" value="{{ old('email_address', $customer->email_address) }}">
                @if($errors->has('email_address'))
                    <span class="text-danger">{{ $errors->first('email_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reference_by_id">{{ trans('cruds.customer.fields.reference_by') }}</label>
                <select class="form-control select2 {{ $errors->has('reference_by') ? 'is-invalid' : '' }}" name="reference_by_id" id="reference_by_id" required>
                    @foreach($reference_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('reference_by_id') ? old('reference_by_id') : $customer->reference_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reference_by'))
                    <span class="text-danger">{{ $errors->first('reference_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.reference_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.customer.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $customer->dob) }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pan_card_no">{{ trans('cruds.customer.fields.pan_card_no') }}</label>
                <input class="form-control {{ $errors->has('pan_card_no') ? 'is-invalid' : '' }}" type="text" name="pan_card_no" id="pan_card_no" value="{{ old('pan_card_no', $customer->pan_card_no) }}">
                @if($errors->has('pan_card_no'))
                    <span class="text-danger">{{ $errors->first('pan_card_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.pan_card_no_helper') }}</span>
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