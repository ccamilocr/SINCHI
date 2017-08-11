<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {            
            $table->increments('tipmed')->unique();            
            $table->string('nombre');
        });
        DB::table('medidas')->insert([     
            ['tipmed' =>'1','nombre' =>'Docenas'],
            ['tipmed' =>'2','nombre' =>'Gramos'],
            ['tipmed' =>'3','nombre' =>'Kilogramos'],
            ['tipmed' =>'4','nombre' =>'Kits'],
            ['tipmed' =>'5','nombre' =>'Libras'],
            ['tipmed' =>'6','nombre' =>'Litros'],
            ['tipmed' =>'7','nombre' =>'Metros cúbicos'],
            ['tipmed' =>'8','nombre' =>'Personas'],
            ['tipmed' =>'9','nombre' =>'Piezas'],
            ['tipmed' =>'10','nombre' =>'Toneladas'],
            ['tipmed' =>'11','nombre' =>'Unidades'],
            ['tipmed' =>'12','nombre' =>'Visitantes']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas');
    }
}