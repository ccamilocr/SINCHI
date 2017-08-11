<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cultivado extends Model
{
    protected $table = 'cultivado';
	protected $fillable = ['tipcul','nombre'];
	public $timestamps = false;
}
