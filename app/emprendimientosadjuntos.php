<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emprendimientosadjuntos extends Model
{
    protected $table = 'emprendimientosadjuntos';
	protected $fillable = ['key','pdf','ruta'];
	public $timestamps = true;
}
