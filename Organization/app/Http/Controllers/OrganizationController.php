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

    public function show(Organization $organization)
    {
        return $organization;
    }

    public function store(Request $request)
    {
        $Organization = Organization::create($request->all());

        return response()->json($organization, 201);
    }

    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());

        return response()->json($organization, 200);
    }

    public function delete(Organization $organization)
    {
        $organization->delete();

        return response()->json(null, 204);
    }
}
