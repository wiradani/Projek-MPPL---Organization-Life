<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function Cabinet()
    {
        return $this->belongsToMany(Cabinet::class);
    }
}
