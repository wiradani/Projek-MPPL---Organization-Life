<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return Organization::all();
    }
 
    public function show($id)
    {
        return Organization::find($id);
    }

    public function store(Request $request)
    {
        return Organization::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->update($request->all());

        return $organization;
    }

    public function delete(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return 204;
    }
}

