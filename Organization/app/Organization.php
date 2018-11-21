<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'id', 'nama', 'deskripsi','created_at','updated_at'
    ];

    public function Cabinet()
    {
        return $this->belongsToMany(Cabinet::class);
    }
}
