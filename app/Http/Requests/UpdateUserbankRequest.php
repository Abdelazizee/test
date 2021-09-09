<?php

namespace App\Http\Requests;

use App\Models\Userbank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserbankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('userbank_edit');
    }

    public function rules()
    {
        return [
            'bank_holder_name' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'bank_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
