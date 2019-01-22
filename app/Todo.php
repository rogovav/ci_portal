<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['info', 'user_id', 'name', 'priority', 'success'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
