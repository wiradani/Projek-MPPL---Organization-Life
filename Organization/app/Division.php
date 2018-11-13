<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function comments()
    {
        return $this->belongsTo('App\Cabinet');
    }
}
