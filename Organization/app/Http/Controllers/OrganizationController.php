<?php

namespace App\Http\Controllers;

use DB;
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

    public function getKabinet(Request $request, $id){
        Organization::findOrFail($id);
        $organization = DB::table('organizations')
        ->join('cabinet_organization', 'organizations.id_organization', '=', 'cabinet_organization.organization_id')
            ->join('cabinets', 'cabinet_organization.cabinet_id', '=', 'cabinets.id_cabinet')
            ->select('organizations.*', 'cabinets.*')
            ->get();
        return response()->json($organization, 200);
    }
}

