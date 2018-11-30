<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{   
    protected $primaryKey = 'id_division';

    protected $fillable = [
        'id_division', 'nama_division', 'deskripsi_division','cabinet_id','created_at','updated_at'
    ];
    public function comments()
    {
        return $this->belongsTo('App\Cabinet');
    }
}
