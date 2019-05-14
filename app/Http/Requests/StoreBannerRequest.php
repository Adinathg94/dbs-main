<?php

namespace App\Http\Requests;

use App\Banner;
use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('banner_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
        ];
    }
}
