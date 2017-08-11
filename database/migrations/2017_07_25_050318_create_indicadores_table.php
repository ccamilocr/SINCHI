<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {            
            $table->increments('tipind')->unique();            
            $table->string('nombre');
        });
        DB::table('indicadores')->insert([     
            ['tipind' =>'0','nombre' =>'Sin datos'],
            ['tipind' =>'1','nombre' =>'Empleados beneficiados'],
            ['tipind' =>'2','nombre' =>'Asociados beneficiados'],
            ['tipind' =>'3','nombre' =>'Familias beneficiadas'],
            ['tipind' =>'4','nombre' =>'Clientes'],
            ['tipind' =>'5','nombre' =>'Proveedores'],
            ['tipind' =>'6','nombre' =>'Ventas/Anual'],
            ['tipind' =>'7','nombre' =>'Competidores/Estimado']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
}