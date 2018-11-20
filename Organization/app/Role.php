<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id', 'nama', 'deskripsi','created_at','updated_at'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
