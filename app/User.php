<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static findorfail($id)
 * @method static create(array $array)
 */
class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fio', 'avatar', 'position', 'login', 'vk', 'email', 'phone', 'birthday', 'password', 'iphone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups_admin()
    {
        return $this->hasMany('App\Group', 'admin');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();
    }

    public function missions()
    {
        return $this->belongsToMany('App\Mission', 'helper_mission')->withTimestamps();
    }

    public function group_posts()
    {
        return $this->hasMany('App\GroupPost');
    }

    public function group_post_comments()
    {
        return $this->hasMany('App\GroupPostComment');
    }

    public function mission_owner()
    {
        return $this->hasMany('App\Mission', 'owner_id');
    }

    public function mission_worker()
    {
        return $this->hasMany('App\Mission', 'worker_id');
    }

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function mission_helper()
    {
        return $this->belongsToMany('App\Mission', 'helper_mission')->withTimestamps();
    }

    public function wikis()
    {
        return $this->hasMany('App\Wiki');
    }

}
