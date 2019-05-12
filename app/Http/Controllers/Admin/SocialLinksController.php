<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySocialLinkRequest;
use App\Http\Requests\StoreSocialLinkRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use App\SocialLink;

class SocialLinksController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('social_link_access'), 403);

        $socialLinks = SocialLink::all();

        return view('admin.socialLinks.index', compact('socialLinks'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('social_link_create'), 403);

        return view('admin.socialLinks.create');
    }

    public function store(StoreSocialLinkRequest $request)
    {
        abort_unless(\Gate::allows('social_link_create'), 403);

        $socialLink = SocialLink::create($request->all());

        if ($request->input('image', false)) {
            $socialLink->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.social-links.index');
    }

    public function edit(SocialLink $socialLink)
    {
        abort_unless(\Gate::allows('social_link_edit'), 403);

        return view('admin.socialLinks.edit', compact('socialLink'));
    }

    public function update(UpdateSocialLinkRequest $request, SocialLink $socialLink)
    {
        abort_unless(\Gate::allows('social_link_edit'), 403);

        $socialLink->update($request->all());

        if ($request->input('image', false)) {
            if (!$socialLink->image || $request->input('image') !== $socialLink->image->file_name) {
                $socialLink->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($socialLink->image) {
            $socialLink->image->delete();
        }

        return redirect()->route('admin.social-links.index');
    }

    public function show(SocialLink $socialLink)
    {
        abort_unless(\Gate::allows('social_link_show'), 403);

        return view('admin.socialLinks.show', compact('socialLink'));
    }

    public function destroy(SocialLink $socialLink)
    {
        abort_unless(\Gate::allows('social_link_delete'), 403);

        $socialLink->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialLinkRequest $request)
    {
        SocialLink::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
