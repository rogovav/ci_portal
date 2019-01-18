<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['fio', 'phone', 'mail', 'info', 'cid'];

    public function missions()
    {
        return $this->hasMany('App\Mission', 'client_id');
    }
}
