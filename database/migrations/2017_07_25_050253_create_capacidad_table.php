<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacidad', function (Blueprint $table) {            
            $table->increments('tipcap')->unique();            
            $table->string('nombre');
        });
        DB::table('capacidad')->insert([     
            ['tipcap' =>'0','nombre' =>'Sin datos'],
            ['tipcap' =>'1','nombre' =>'Toneladas'],
            ['tipcap' =>'2','nombre' =>'Unidades']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacidad');
    }
}