@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stageMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stage-masters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="stage">{{ trans('cruds.stageMaster.fields.stage') }}</label>
                <input class="form-control {{ $errors->has('stage') ? 'is-invalid' : '' }}" type="text" name="stage" id="stage" value="{{ old('stage', '') }}" required>
                @if($errors->has('stage'))
                    <span class="text-danger">{{ $errors->first('stage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stageMaster.fields.stage_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order">{{ trans('cruds.stageMaster.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1" required>
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stageMaster.fields.order_helper') }}</span>
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