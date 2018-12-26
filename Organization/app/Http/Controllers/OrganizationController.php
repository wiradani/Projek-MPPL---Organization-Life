<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Organization;
use Auth;

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
        //dd($request);
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
          }
          
        $request->validate($valids);
        Auth::user()->organizations()->create([
            'nama_organization'=>$request->nama_organization,
            'deskripsi_organization'=>$request->deskripsi_organization
        ]);
        return redirect('/tambahOrganisasi')->with('message', 'Organisasi berhasil ditambahkan');
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
            ->select('organizations.id_organization','organizations.nama_organization', 'cabinets.id_cabinet','cabinets.nama_cabinet','cabinets.deskripsi_cabinet')
            ->get();
        return response()->json($organization, 200);
    }
    public function view()
    {
        if (!Auth::check()) return view('/login');
        return view('partials.tambahOrganisasi');
    }
}

