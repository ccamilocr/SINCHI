<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    protected $table = 'tipo_documento';
	protected $fillable = ['tipdoc','nombre'];
	public $timestamps = false;
}
