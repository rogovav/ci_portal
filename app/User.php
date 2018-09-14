<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function groups_admin()
    {
        return $this->hasMany('App\Group', 'admin');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fio', 'position', 'login', 'vk', 'email', 'phone', 'birthday', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
