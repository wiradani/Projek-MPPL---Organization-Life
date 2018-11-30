<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'id_contact';

    protected $fillable = [
        'id_contact','LineID','Handphone','alamat','user_id','created_at', 'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
