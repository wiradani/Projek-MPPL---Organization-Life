<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        return 204;
    }

    public function userGetOrganisasi(Request $request, $id){
        $user = User::findOrFail($id);
        $user = DB::table('users')->where('users.id',$id )
            ->join('divisions', 'users.divisi_id', '=', 'divisions.id')
            ->join('cabinets', 'divisions.cabinet_id', '=', 'cabinets.id')
            ->join('cabinet_organization', 'cabinets.id', '=', 'cabinet_organization.cabinet_id')
            ->join('organizations', 'cabinet_organization.cabinet_id', '=', 'organizations.id')
            ->select('users.id','users.name','organizations.nama')
            ->get();
        return response()->json($user, 200);
    }

    public function userGetCabinet(Request $request, $id){
        $user = User::findOrFail($id);
        $user = DB::table('users')->where('users.id',$id )
            ->join('divisions', 'users.divisi_id', '=', 'divisions.id')
            ->join('cabinets', 'divisions.cabinet_id', '=', 'cabinets.id')
            ->select('users.id','cabinets.nama')
            ->get();
        return response()->json($user, 200);
    }

    public function userGetDivision(Request $request, $id){
        $user = User::findOrFail($id);
        $user = DB::table('users')->where('users.id',$id )
            ->join('divisions', 'users.divisi_id', '=', 'divisions.id')
            ->select('users.id','divisions.nama')
            ->get();
        return response()->json($user, 200);
    }


}
