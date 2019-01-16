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
        return $this->belongsTo('App\User', 'subject_id');
    }
}
