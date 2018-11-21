<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id','LineID','Handphone','alamat','user_id','created_at', 'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
