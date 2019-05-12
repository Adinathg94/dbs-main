<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialLinkRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use App\SocialLink;

class SocialLinksApiController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();

        return $socialLinks;
    }

    public function store(StoreSocialLinkRequest $request)
    {
        return SocialLink::create($request->all());
    }

    public function update(UpdateSocialLinkRequest $request, SocialLink $socialLink)
    {
        return $socialLink->update($request->all());
    }

    public function show(SocialLink $socialLink)
    {
        return $socialLink;
    }

    public function destroy(SocialLink $socialLink)
    {
        return $socialLink->delete();
    }
}
