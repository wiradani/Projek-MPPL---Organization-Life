<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{   
    protected $table = 'user_event';

    protected $fillable = [
        'id', 'organization_id', 'cabinet_id'
    ];

    
}
