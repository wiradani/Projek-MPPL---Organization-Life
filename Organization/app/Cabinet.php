<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $primaryKey = 'id_cabinet';

    protected $fillable = [
        'id_cabinet','nama_cabinet', 'deskripsi_cabinet', 'periode_cabinet','created_at','updated_at','organization_id_organization'
    ];

    public function Organizations()
    {
        return $this->belongsTo('App\Organization');
    }

    public function Divisions()
    {
        return $this->hasMany('App\Division');
    }
}
