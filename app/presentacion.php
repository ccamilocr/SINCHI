<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    protected $table = 'presentacion';
	protected $fillable = ['tippre','nombre'];
	public $timestamps = false;
}
