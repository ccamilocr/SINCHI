<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivado', function (Blueprint $table) {            
            $table->increments('tipcul')->unique();            
            $table->string('nombre');
        });
        DB::table('cultivado')->insert([     
            ['tipcul' =>'1','nombre' =>'Si'],
            ['tipcul' =>'2','nombre' =>'No']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultivado');
    }
}
