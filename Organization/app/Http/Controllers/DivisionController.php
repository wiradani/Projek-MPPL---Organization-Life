<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function index()
    {
        return Division::all();
    }
 
    public function show($id)
    {
        return Division::find($id);
    }

    public function store(Request $request)
    {
        return Division::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $division->update($request->all());

        return $division;
    }

    public function delete(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return 204;
    }
}
