<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Principal;

class PrincipalApiController extends Controller
{
    public function index()
    {
        $principals = Principal::all();

        return $principals;
    }

    public function store(StorePrincipalRequest $request)
    {
        return Principal::create($request->all());
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        return $principal->update($request->all());
    }

    public function show(Principal $principal)
    {
        return $principal;
    }

    public function destroy(Principal $principal)
    {
        return $principal->delete();
    }
}
