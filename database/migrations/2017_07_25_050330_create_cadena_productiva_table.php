<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadenaProductivaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadena_productiva', function (Blueprint $table) {            
            $table->increments('tipneg')->unique();            
            $table->string('nombre');
        });
        DB::table('cadena_productiva')->insert([     
            ['tipneg' =>'0','nombre' =>'Sin datos'],
            ['tipneg' =>'1','nombre' =>'Bebidas y productos alimenticios'],
            ['tipneg' =>'2','nombre' =>'Artesanías'],
            ['tipneg' =>'3','nombre' =>'Cosmética'],
            ['tipneg' =>'4','nombre' =>'Flores silvestres'],
            ['tipneg' =>'5','nombre' =>'Ecoturismo'],
            ['tipneg' =>'6','nombre' =>'Negocios para la restauración'],
            ['tipneg' =>'7','nombre' =>'Piscicultura'],
            ['tipneg' =>'8','nombre' =>'Ingredientes naturales']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadena_productiva');
    }
}