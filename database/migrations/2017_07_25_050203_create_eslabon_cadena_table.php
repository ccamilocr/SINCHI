<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEslabonCadenaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eslabon_cadena', function (Blueprint $table) {            
            $table->increments('tipesl')->unique();            
            $table->string('nombre');
        });
        DB::table('eslabon_cadena')->insert([     
            ['tipesl' =>'0','nombre' =>'Sin datos'],
            ['tipesl' =>'1','nombre' =>'Recolectar'],
            ['tipesl' =>'2','nombre' =>'Producir'],
            ['tipesl' =>'3','nombre' =>'Transformar'],
            ['tipesl' =>'4','nombre' =>'Comercializar '],
            ['tipesl' =>'5','nombre' =>'Provisionar']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eslabon_cadena');
    }
}
