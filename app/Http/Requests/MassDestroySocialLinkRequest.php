<?php

namespace App\Http\Requests;

use App\SocialLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('social_link_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:social_links,id',
        ];
    }
}
