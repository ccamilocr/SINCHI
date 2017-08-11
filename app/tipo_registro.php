<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_registro extends Model
{
    protected $table = 'tipo_registro';
	protected $fillable = ['tipreg','nombre'];
	public $timestamps = false;
}
