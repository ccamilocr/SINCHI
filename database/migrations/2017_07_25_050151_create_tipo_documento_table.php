<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('tipo_documento', function (Blueprint $table) {            
            $table->increments('tipdoc')->unique();
            $table->string('sigla');
            $table->string('nombre');
        });
        DB::table('tipo_documento')->insert([     
            ['tipdoc' =>'0','sigla' =>'ND','nombre' =>'Sin datos'],
            ['tipdoc' =>'1','sigla' =>'TI','nombre' =>'Tarjeta de Identidad'],
            ['tipdoc' =>'2','sigla' =>'CC','nombre' =>'Cédula de Ciudadanía'],
            ['tipdoc' =>'3','sigla' =>'PA','nombre' =>'Pasaporte'],
            ['tipdoc' =>'4','sigla' =>'RC','nombre' =>'Registro Civil'],
            ['tipdoc' =>'5','sigla' =>'CE','nombre' =>'Cédula de Extranjería'],
            ['tipdoc' =>'6','sigla' =>'NIT','nombre' =>'Número de Identificación Tributaria']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documento');
    }
}
