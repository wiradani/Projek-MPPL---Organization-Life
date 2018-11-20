<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;


class RewardController extends Controller
{
    public function index()
    {
        return Reward::all();
    }
 
    public function show($id)
    {
        return Reward::find($id);
    }

    public function store(Request $request)
    {
        return Reward::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $reward = Reward::findOrFail($id);
        $reward->update($request->all());

        return $reward;
    }

    public function delete(Request $request, $id)
    {
        $reward = Reward::findOrFail($id);
        $reward->delete();

        return 204;
    }
}
