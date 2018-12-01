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

    public function userGetInfo(Request $request, $id){
        $user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id_role')
            ->join('divisions', 'users.divisi_id', '=', 'divisions.id_division')
            ->join('cabinets', 'divisions.cabinet_id', '=', 'cabinets.id_cabinet')
            ->join('cabinet_organization', 'cabinets.id_cabinet', '=', 'cabinet_organization.cabinet_id')
            ->join('organizations', 'cabinet_organization.cabinet_id', '=', 'organizations.id_organization')
            ->select('users.id','users.name_user','users.email_user','users.password'
                ,'roles.id_role','roles.nama_role','roles.deskripsi_role'
                ,'divisions.id_division','divisions.nama_division'
                ,'cabinets.id_cabinet','cabinets.nama_cabinet'
                ,'organizations.id_organization','organizations.nama_organization')
            ->where('users.id', '=', $id)
            ->get();
        return response()->json($user, 200);
    }

    


}
