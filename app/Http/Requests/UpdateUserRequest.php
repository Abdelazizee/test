<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'country_phone_code' => [
                'string',
                'max:50',
                'nullable',
            ],
            'phone' => [
                'string',
                'max:50',
                'nullable',
            ],
            'company_name' => [
                'string',
                'max:191',
                'nullable',
            ],
            'owner_name' => [
                'string',
                'max:191',
                'nullable',
            ],
            'commercial_register_number' => [
                'string',
                'max:191',
                'nullable',
            ],
            'location' => [
                'string',
                'max:500',
                'nullable',
            ],
            'lat' => [
                'string',
                'max:191',
                'nullable',
            ],
            'lang' => [
                'string',
                'nullable',
            ],
            'company_phone' => [
                'string',
                'max:50',
                'nullable',
            ],
        ];
    }
}
