<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_empresa extends Model
{
    protected $table = 'tipo_empresa';
	protected $fillable = ['tipneg','nombre'];
	public $timestamps = false;
}
