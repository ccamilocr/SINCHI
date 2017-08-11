<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class indicadores extends Model
{
    protected $table = 'indicadores';
	protected $fillable = ['tipind','nombre'];
	public $timestamps = false;
}
