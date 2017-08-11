<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class capacidad extends Model
{
    protected $table = 'capacidad';
	protected $fillable = ['tipcap','nombre'];
	public $timestamps = false;
}
