<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'tabla_estructura';

	protected $fillable = ['asesor_cedula','asesor_nombre','asesor_movil'];

	protected $guarded = ['id'];

	public $timestamps = false;

	public function user()
    {
        return $this->hasOne('App\User','username','asesor_cedula');
    }

}
