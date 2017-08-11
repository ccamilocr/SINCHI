<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estacionalidad extends Model
{
    protected $table = 'estacionalidad';
	protected $fillable = ['tipest','nombre'];
	public $timestamps = false;
}
