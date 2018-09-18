<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function admin_users()
    {
        return $this->belongsTo('App\User', 'admin');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany('App\GroupPost');
    }

    protected $fillable = [
        'name', 'avatar', 'admin',
    ];
}
