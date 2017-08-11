<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_anexos extends Model
{
    protected $table = 'tipo_anexos';
	protected $fillable = ['tipane','nombre'];
	public $timestamps = false;
}
