<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class silvestre extends Model
{
    protected $table = 'silvestre';
	protected $fillable = ['tipsilv','nombre'];
	public $timestamps = false;
}
