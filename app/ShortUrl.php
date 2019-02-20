<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = ['short', 'url', 'mission_id'];

    public function mission() {
        return $this->belongsTo('App\Mission', 'mission_id');
    }
}
