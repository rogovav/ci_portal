<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['name', 'type', 'address'];

    public function missions()
    {
        return $this->hasMany('App\Mission', 'building_id');
    }
}
