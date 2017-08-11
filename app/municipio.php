<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $table = 'municipio';
	protected $fillable = ['cod_dane','nom_mpio','cod_dpto','nom_dpto','cod_region','nom_region'];
	public $timestamps = false;
}
