<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }
 
    public function show($id)
    {
        return Role::find($id);
    }

    public function store(Request $request)
    {
        return Role::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return $role;
    }

    public function delete(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return 204;
    }
}
