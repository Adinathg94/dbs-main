<?php

namespace App\Http\Requests;

use App\Banner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyBannerRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('banner_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:banners,id',
        ];
    }
}
