<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class especie extends Model
{
    protected $table = 'especie';
	protected $fillable = ['id','nom_comun','nom_cientifico','procedencia'];
	public $timestamps = false;
}