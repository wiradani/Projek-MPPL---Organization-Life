<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{   
    protected $fillable = [
        'id', 'nama', 'deskripsi','points_reward','quantity','created_at','updated_at'
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
