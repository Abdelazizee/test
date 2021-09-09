@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.banks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.bank.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bank.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iban">{{ trans('cruds.bank.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                @if($errors->has('iban'))
                    <span class="text-danger">{{ $errors->first('iban') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bank.fields.iban_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holder_name">{{ trans('cruds.bank.fields.holder_name') }}</label>
                <input class="form-control {{ $errors->has('holder_name') ? 'is-invalid' : '' }}" type="text" name="holder_name" id="holder_name" value="{{ old('holder_name', '') }}">
                @if($errors->has('holder_name'))
                    <span class="text-danger">{{ $errors->first('holder_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bank.fields.holder_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.bank.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bank.fields.active_helper') }}</span>
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