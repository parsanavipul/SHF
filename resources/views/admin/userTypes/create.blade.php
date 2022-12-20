@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_type">{{ trans('cruds.userType.fields.user_type') }}</label>
                <input class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}" type="text" name="user_type" id="user_type" value="{{ old('user_type', '') }}" required>
                @if($errors->has('user_type'))
                    <span class="text-danger">{{ $errors->first('user_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userType.fields.user_type_helper') }}</span>
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