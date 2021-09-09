@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userbank.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.userbanks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.id') }}
                        </th>
                        <td>
                            {{ $userbank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.bank_holder_name') }}
                        </th>
                        <td>
                            {{ $userbank->bank_holder_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.iban') }}
                        </th>
                        <td>
                            {{ $userbank->iban }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $userbank->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.bank_number') }}
                        </th>
                        <td>
                            {{ $userbank->bank_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userbank.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $userbank->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.userbanks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection