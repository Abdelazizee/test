@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userbank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.userbanks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bank_holder_name">{{ trans('cruds.userbank.fields.bank_holder_name') }}</label>
                <input class="form-control {{ $errors->has('bank_holder_name') ? 'is-invalid' : '' }}" type="text" name="bank_holder_name" id="bank_holder_name" value="{{ old('bank_holder_name', '') }}">
                @if($errors->has('bank_holder_name'))
                    <span class="text-danger">{{ $errors->first('bank_holder_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userbank.fields.bank_holder_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iban">{{ trans('cruds.userbank.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                @if($errors->has('iban'))
                    <span class="text-danger">{{ $errors->first('iban') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userbank.fields.iban_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name">{{ trans('cruds.userbank.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}">
                @if($errors->has('bank_name'))
                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userbank.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_number">{{ trans('cruds.userbank.fields.bank_number') }}</label>
                <input class="form-control {{ $errors->has('bank_number') ? 'is-invalid' : '' }}" type="text" name="bank_number" id="bank_number" value="{{ old('bank_number', '') }}">
                @if($errors->has('bank_number'))
                    <span class="text-danger">{{ $errors->first('bank_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userbank.fields.bank_number_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.userbank.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userbank.fields.active_helper') }}</span>
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