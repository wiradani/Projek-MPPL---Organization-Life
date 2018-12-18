<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_event', 'nama_event', 'deskripsi_event','time_start','time_finish','points_reward','created_at','updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
