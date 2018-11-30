<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{   
    protected $primaryKey = 'id_reward';

    protected $fillable = [
        'id_reward', 'nama_reward', 'deskripsi_reward','points_reward','quantity_reward','created_at','updated_at'
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
