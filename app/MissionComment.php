<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionComment extends Model
{
    protected $fillable = ['info', 'user_id', 'mission_id'];

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function files()
    {
        return $this->hasMany('App\MissionCommentFile', 'comment_id');
    }
}
