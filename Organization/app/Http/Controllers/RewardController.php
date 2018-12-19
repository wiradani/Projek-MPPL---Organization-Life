<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function userRewardHistory(Request $request, $id){
        $user = DB::table('users')
            ->join('user_reward', 'users.id', '=', 'user_reward.user_id')
            ->join('rewards', 'user_reward.reward_id', '=', 'rewards.id_reward')
            ->select('users.id','rewards.id_reward','rewards.nama_reward','rewards.deskripsi_reward')
            ->where('users.id', '=', $id)
            ->get();
        return response()->json($user, 200);
    }
    
    public function reedemReward(Request $request)
    {
        $user_id = $request->input('id_user');
        $reward_id = $request->input('id_reward');
        DB::table('user_reward')->insert(
            ['user_id' => $user_id, 'reward_id' => $reward_id]
        );
        $user_point = DB::table('users')
        ->select('users.jumlah_point') ->where('users.id', '=', $user_id)
        ->value('users.jumlah_point');

        $reward_point = DB::table('rewards')
        ->select('rewards.points_reward') ->where('rewards.id_reward', '=', $reward_id)
        ->value('rewards.points_reward');
        
        if($user_point >= $reward_point){
        $new_point = $user_point - $reward_point;

        DB::table('users')
        ->where('users.id', '=', $user_id)
        ->update( ['jumlah_point' => $new_point]);


        return response()->json("Reward reedem", 200);
        }

        else {
            return response()->json("Point anda tidak mencukupi", 500);
        }
    }
}
