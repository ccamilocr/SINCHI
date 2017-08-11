<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_sedes extends Model
{
    protected $table = 'tipo_sedes';
	protected $fillable = ['tipsed','nombre'];
	public $timestamps = false;
}
