<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function admin_user()
    {
        return $this->belongsTo('App\User', 'admin');
    }
}
