<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('tipo_anexos', function (Blueprint $table) {            
            $table->increments('tipane')->unique();            
            $table->string('nombre');
        });
        DB::table('tipo_anexos')->insert([     
            ['tipane' =>'1','nombre' =>'Autorización publicación'],
            ['tipane' =>'2','nombre' =>'Formato reunión'],
            ['tipane' =>'3','nombre' =>'Datos básicos'],
            ['tipane' =>'4','nombre' =>'Ficha Emprendimiento'],
            ['tipane' =>'5','nombre' =>'Ayuda de memoria'],
            ['tipane' =>'6','nombre' =>'Plantilla reporte'],
            ['tipane' =>'7','nombre' =>'Grabación'],
            ['tipane' =>'8','nombre' =>'Fotografía'],
            ['tipane' =>'9','nombre' =>'Imagen']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_anexos');
    }
}