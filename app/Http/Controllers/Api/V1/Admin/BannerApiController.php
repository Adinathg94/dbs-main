<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerApiController extends Controller
{
    public function index()
    {
        $banners = Banner::all();

        return $banners;
    }

    public function store(StoreBannerRequest $request)
    {
        return Banner::create($request->all());
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        return $banner->update($request->all());
    }

    public function show(Banner $banner)
    {
        return $banner;
    }

    public function destroy(Banner $banner)
    {
        return $banner->delete();
    }
}
