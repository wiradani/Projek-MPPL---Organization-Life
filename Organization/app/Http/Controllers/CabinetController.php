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

    public function show(Cabinet $cabinet)
    {
        return $cabinet;
    }

    public function store(Request $request)
    {
        $cabinet = Cabinet::create($request->all());

        return response()->json($cabinet, 201);
    }

    public function update(Request $request, Cabinet $cabinet)
    {
        $cabinet->update($request->all());

        return response()->json($cabinet, 200);
    }

    public function delete(Cabinet $cabinet)
    {
        $cabinet->delete();

        return response()->json(null, 204);
    }
}
