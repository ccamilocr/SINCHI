<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medidas extends Model
{
    protected $table = 'medidas';
	protected $fillable = ['tipmed','nombre'];
	public $timestamps = false;
}
