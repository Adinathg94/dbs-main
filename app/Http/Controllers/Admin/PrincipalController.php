<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPrincipalRequest;
use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Principal;

class PrincipalController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('principal_access'), 403);

        $principals = Principal::all();

        return view('admin.principals.index', compact('principals'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('principal_create'), 403);

        return view('admin.principals.create');
    }

    public function store(StorePrincipalRequest $request)
    {
        abort_unless(\Gate::allows('principal_create'), 403);

        $principal = Principal::create($request->all());

        if ($request->input('photo', false)) {
            $principal->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.principals.index');
    }

    public function edit(Principal $principal)
    {
        abort_unless(\Gate::allows('principal_edit'), 403);

        return view('admin.principals.edit', compact('principal'));
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        abort_unless(\Gate::allows('principal_edit'), 403);

        $principal->update($request->all());

        if ($request->input('photo', false)) {
            if (!$principal->photo || $request->input('photo') !== $principal->photo->file_name) {
                $principal->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($principal->photo) {
            $principal->photo->delete();
        }

        return redirect()->route('admin.principals.index');
    }

    public function show(Principal $principal)
    {
        abort_unless(\Gate::allows('principal_show'), 403);

        return view('admin.principals.show', compact('principal'));
    }

    public function destroy(Principal $principal)
    {
        abort_unless(\Gate::allows('principal_delete'), 403);

        $principal->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrincipalRequest $request)
    {
        Principal::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
