<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{   
    protected $primaryKey = 'id_organization';
    
    protected $fillable = [
        'id_organization', 'nama_organization', 'deskripsi_organization','created_at','updated_at','user_id'
    ];

    public function Cabinets()
    {
        return $this->HasMany('App\Cabinet');
    }
    public function Events()
    {
        return $this->HasMany('App\Event');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
