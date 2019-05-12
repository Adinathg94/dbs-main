<?php

namespace App\Http\Requests;

use App\SocialLink;
use Illuminate\Foundation\Http\FormRequest;

class StoreSocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('social_link_create');
    }

    public function rules()
    {
        return [
            'image'    => [
                'required',
            ],
            'date'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'platform' => [
                'required',
            ],
        ];
    }
}
