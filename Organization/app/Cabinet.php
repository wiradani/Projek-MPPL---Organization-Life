<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{

    protected $fillable = [
        'nama', 'deskripsi', 'periode',
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
