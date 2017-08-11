<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo', function (Blueprint $table) {            
            $table->increments('tipcar')->unique();
            $table->string('nombre');
        });
        DB::table('cargo')->insert([     
            ['tipcar' =>'1','nombre' =>'Líder de transformación agroalimentaria y nutracéutica'],
            ['tipcar' =>'2','nombre' =>'Líder de transformación en ingredientes naturales y cosmética'],
            ['tipcar' =>'3','nombre' =>'Líder en Buenas Prácticas de Recolección'],
            ['tipcar' =>'4','nombre' =>'Contratista'],
            ['tipcar' =>'5','nombre' =>'Contratista Piscicultura']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo');
    }
}
