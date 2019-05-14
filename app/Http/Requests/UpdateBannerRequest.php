<?php

namespace App\Http\Requests;

use App\Banner;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('banner_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
