<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPostComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group_post()
    {
        return $this->belongsTo('App\GroupPost');
    }

    protected $fillable = [
        'text', 'user_id', 'group_id',
    ];
}
