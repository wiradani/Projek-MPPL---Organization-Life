<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name_user', 'email_user', 'password','nim_user','jumlah_point','role_id','divisi_id','kontak_id','nama_organization','deskripsi_organization'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
	    $this->attributes['password'] = Hash::make($value); 
    }
    public function Organizations()
    {
        return $this->hasMany('App\Organization'); 
    }
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
