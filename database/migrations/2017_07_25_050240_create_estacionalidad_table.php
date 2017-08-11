<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionalidad', function (Blueprint $table) {            
            $table->increments('tipest')->unique();            
            $table->string('nombre');
        });
        DB::table('estacionalidad')->insert([     
            ['tipest' =>'0','nombre' =>'Sin datos'],
            ['tipest' =>'1','nombre' =>'Disposición entre enero y abril'],
            ['tipest' =>'2','nombre' =>'Disposición entre mayo y agosto'],
            ['tipest' =>'3','nombre' =>'Disposición entre septiembre y diciembre '],
            ['tipest' =>'4','nombre' =>'Disposición todo el año'],
            ['tipest' =>'5','nombre' =>'Otro']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionalidad');
    }
}