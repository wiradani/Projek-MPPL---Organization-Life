<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id', 'nama', 'deskripsi','date start','date finish','points_reward','created_at','updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
