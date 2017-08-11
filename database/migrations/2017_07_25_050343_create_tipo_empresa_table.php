<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_empresa', function (Blueprint $table) {            
            $table->increments('tipemp')->unique();            
            $table->string('nombre');
        });
        DB::table('tipo_empresa')->insert([     
            ['tipemp' =>'0','nombre' =>'Sin datos'],
            ['tipemp' =>'1','nombre' =>'Asociación'],
            ['tipemp' =>'2','nombre' =>'Comunidad indígena'],
            ['tipemp' =>'3','nombre' =>'Consorcio'],
            ['tipemp' =>'4','nombre' =>'Familiar'],
            ['tipemp' =>'5','nombre' =>'JAC'],
            ['tipemp' =>'6','nombre' =>'Propia'],
            ['tipemp' =>'7','nombre' =>'Sociedad'],
            ['tipemp' =>'8','nombre' =>'Unipersonal '],
            ['tipemp' =>'9','nombre' =>'Entidad'],
            ['tipemp' =>'10','nombre' =>'Institución']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_empresa');
    }
}