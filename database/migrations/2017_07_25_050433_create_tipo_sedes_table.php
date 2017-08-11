<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_sedes', function (Blueprint $table) {            
            $table->increments('tipsed')->unique();            
            $table->string('nombre');
        });
        DB::table('tipo_sedes')->insert([     
            ['tipsed' =>'1','nombre' =>'Principal'],
            ['tipsed' =>'2','nombre' =>'Sede']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_sedes');
    }
}