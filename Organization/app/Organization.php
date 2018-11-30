<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{   
    protected $primaryKey = 'id_organization';
    
    protected $fillable = [
        'id_organization', 'nama_organization', 'deskripsi_organization','created_at','updated_at'
    ];

    public function Cabinet()
    {
        return $this->belongsToMany(Cabinet::class);
    }
}
