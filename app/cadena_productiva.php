<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cadena_productiva extends Model
{
    protected $table = 'cadena_productiva';
	protected $fillable = ['tipneg','nombre'];
	public $timestamps = false;
}
