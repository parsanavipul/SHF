@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-masters.update", [$productMaster->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="bank_id">{{ trans('cruds.productMaster.fields.bank') }}</label>
                <select class="form-control select2 {{ $errors->has('bank') ? 'is-invalid' : '' }}" name="bank_id" id="bank_id" required>
                    @foreach($banks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('bank_id') ? old('bank_id') : $productMaster->bank->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productMaster.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent_product_id">{{ trans('cruds.productMaster.fields.parent_product') }}</label>
                <select class="form-control select2 {{ $errors->has('parent_product') ? 'is-invalid' : '' }}" name="parent_product_id" id="parent_product_id">
                    @foreach($parent_products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('parent_product_id') ? old('parent_product_id') : $productMaster->parent_product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent_product'))
                    <span class="text-danger">{{ $errors->first('parent_product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productMaster.fields.parent_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_name">{{ trans('cruds.productMaster.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', $productMaster->product_name) }}" required>
                @if($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productMaster.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payout">{{ trans('cruds.productMaster.fields.payout') }}</label>
                <input class="form-control {{ $errors->has('payout') ? 'is-invalid' : '' }}" type="number" name="payout" id="payout" value="{{ old('payout', $productMaster->payout) }}" step="0.01" required max="100">
                @if($errors->has('payout'))
                    <span class="text-danger">{{ $errors->first('payout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productMaster.fields.payout_helper') }}</span>
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