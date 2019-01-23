<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionFile extends Model
{
    protected $fillable = ['name', 'mission_id'];

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }
}
