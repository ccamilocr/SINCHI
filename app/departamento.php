<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
	protected $table = 'departamento';
	protected $fillable = ['cod_dpto','nom_dpto'];
	public $timestamps = false;
}
