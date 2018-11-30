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

    public function userGetRole(Request $request, $id){
        $user = User::findOrFail($id);
        $user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id_role')
            ->select('users.id','roles.*')
            ->get();
        return response()->json($user, 200);
    }


}
