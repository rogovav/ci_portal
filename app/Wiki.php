<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    protected $fillable = ['name', 'short_info', 'info', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
