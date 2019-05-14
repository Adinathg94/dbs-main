<?php

namespace App\Http\Requests;

use App\Principal;
use Illuminate\Foundation\Http\FormRequest;

class StorePrincipalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('principal_create');
    }

    public function rules()
    {
        return [
            'message' => [
                'required',
            ],
            'name'    => [
                'required',
            ],
            'photo'   => [
                'required',
            ],
        ];
    }
}
