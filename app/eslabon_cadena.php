<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eslabon_cadena extends Model
{
    protected $table = 'eslabon_cadena';
	protected $fillable = ['tipesl','nombre'];
	public $timestamps = false;
}
