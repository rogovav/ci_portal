<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionCommentFile extends Model
{
    protected $fillable = ['name', 'comment_id', 'original'];

    public function comment()
    {
        return $this->belongsTo('App\MissionComment', 'comment_id');
    }
}
