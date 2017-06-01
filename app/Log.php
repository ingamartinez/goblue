<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';

    public function user()
    {
        return $this->belongsTo('App\User','for_users_id');
    }

    public function goblue()
    {
        return $this->belongsTo('App\Goblue','tabla_goblue_id');
    }
}
