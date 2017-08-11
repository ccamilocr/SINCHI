<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dependencia extends Model
{
    protected $table = 'dependencia';
	protected $fillable = ['tipdep','nombre'];
	public $timestamps = false;
	
}
