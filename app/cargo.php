<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    protected $table = 'cargo';
	protected $fillable = ['tipcar','nombre'];
	public $timestamps = false;
}
