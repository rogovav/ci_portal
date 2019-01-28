<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionFile extends Model
{
    protected $fillable = ['name', 'mission_id', 'original'];

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }
}
