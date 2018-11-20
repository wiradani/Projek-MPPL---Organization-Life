<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{

    protected $fillable = [
        'id','nama', 'deskripsi', 'periode','created_at','updated_at'
    ];

    public function organizations()
    {
        return $this->belongsToMany('App\Organization');
    }

    public function Divisi()
    {
        return $this->hasMany('App\Divisi');
    }
}
