<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function worker()
    {
        return $this->belongsTo('App\User', 'worker_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function helpers()
    {
        return $this->belongsToMany('App\User', 'helper_mission')->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany('App\MissionFile');
    }

    public function comments()
    {
        return $this->hasMany('App\MissionComment');
    }
}
