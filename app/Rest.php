<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    protected $fillable = ['user_id', 'week1', 'week2', 'week3', 'week4'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
