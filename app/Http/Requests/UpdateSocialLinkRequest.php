<?php

namespace App\Http\Requests;

use App\SocialLink;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('social_link_edit');
    }

    public function rules()
    {
        return [
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
