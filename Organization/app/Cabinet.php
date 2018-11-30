<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $primaryKey = 'id_cabinet';

    protected $fillable = [
        'id_cabinet','nama_cabinet', 'deskripsi_cabinet', 'periode_cabinet','created_at','updated_at'
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
