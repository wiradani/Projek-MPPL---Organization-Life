<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'id', 'nama', 'deskripsi','cabinet_id','created_at','updated_at'
    ];
    public function comments()
    {
        return $this->belongsTo('App\Cabinet');
    }
}
