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

    public function show(Reward $reward)
    {
        return $reward;
    }

    public function store(Request $request)
    {
        $Reward = Reward::create($request->all());

        return response()->json($reward, 201);
    }

    public function update(Request $request, Reward $reward)
    {
        $reward->update($request->all());

        return response()->json($reward, 200);
    }

    public function delete(Reward $reward)
    {
        $reward->delete();

        return response()->json(null, 204);
    }
}
