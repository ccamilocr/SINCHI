<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_registro', function (Blueprint $table) {            
            $table->increments('tipreg')->unique();            
            $table->string('nombre');
        });
        DB::table('tipo_registro')->insert([     
            ['tipreg' =>'0','nombre' =>'Sin datos'],
            ['tipreg' =>'1','nombre' =>'Nuevo'],
            ['tipreg' =>'2','nombre' =>'Renovación']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_registro');
    }
}