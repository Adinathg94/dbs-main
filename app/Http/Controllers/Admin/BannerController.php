<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBannerRequest;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('banner_access'), 403);

        $banners = Banner::all();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('banner_create'), 403);

        return view('admin.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        abort_unless(\Gate::allows('banner_create'), 403);

        $banner = Banner::create($request->all());

        if ($request->input('image', false)) {
            $banner->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.banners.index');
    }

    public function edit(Banner $banner)
    {
        abort_unless(\Gate::allows('banner_edit'), 403);

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        abort_unless(\Gate::allows('banner_edit'), 403);

        $banner->update($request->all());

        if ($request->input('image', false)) {
            if (!$banner->image || $request->input('image') !== $banner->image->file_name) {
                $banner->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($banner->image) {
            $banner->image->delete();
        }

        return redirect()->route('admin.banners.index');
    }

    public function show(Banner $banner)
    {
        abort_unless(\Gate::allows('banner_show'), 403);

        return view('admin.banners.show', compact('banner'));
    }

    public function destroy(Banner $banner)
    {
        abort_unless(\Gate::allows('banner_delete'), 403);

        $banner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBannerRequest $request)
    {
        Banner::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
