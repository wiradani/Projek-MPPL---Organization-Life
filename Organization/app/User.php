<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name_user', 'email_user', 'password','nim_user','jumlah_point','role_id','divisi_id','kontak_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function Event()
    {
        return $this->belongsToMany(Event::class);
    }

    public function Reward()
    {
        return $this->belongsToMany(Reward::class);
    }

    public function Contact()
    {
        return $this->hasOne('App\Contact');
    }
}
