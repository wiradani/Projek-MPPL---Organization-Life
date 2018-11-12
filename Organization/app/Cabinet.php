<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    public function organizations()
    {
        return $this->belongsToMany('App\Organization');
    }
}
