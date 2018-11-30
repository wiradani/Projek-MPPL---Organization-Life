<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_role', 'nama_role', 'deskripsi_role','created_at','updated_at'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
