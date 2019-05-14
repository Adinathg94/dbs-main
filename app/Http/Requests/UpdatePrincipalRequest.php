<?php

namespace App\Http\Requests;

use App\Principal;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePrincipalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('principal_edit');
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
        ];
    }
}
