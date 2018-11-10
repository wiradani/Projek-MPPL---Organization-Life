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

    public function show(Division $division)
    {
        return $division;
    }

    public function store(Request $request)
    {
        $division = Division::create($request->all());

        return response()->json($Division, 201);
    }

    public function update(Request $request, Division $division)
    {
        $division->update($request->all());

        return response()->json($division, 200);
    }

    public function delete(Event $division)
    {
        $division->delete();

        return response()->json(null, 204);
    }
}
