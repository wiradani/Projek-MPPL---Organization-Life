<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabinet;

class CabinetController extends Controller
{
    public function index()
    {
        return Cabinet::all();
    }
 
    public function show($id)
    {
        return Cabinet::find($id);
    }

    public function store(Request $request)
    {
        return Cabinet::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->update($request->all());

        return $cabinet;
    }

    public function delete(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->delete();

        return 204;
    }
}
