<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {            
            $table->string('cod_dpto')->unique();
            $table->string('nom_dpto');
        });
        DB::table('departamento')->insert([     
            ['cod_dpto' =>'91','nom_dpto' =>'Amazonas'],
            ['cod_dpto' =>'05','nom_dpto' =>'Antioquia'],
            ['cod_dpto' =>'81','nom_dpto' =>'Arauca'],
            ['cod_dpto' =>'08','nom_dpto' =>'Atlántico'],
            ['cod_dpto' =>'13','nom_dpto' =>'Bolívar'],
            ['cod_dpto' =>'15','nom_dpto' =>'Boyacá'],
            ['cod_dpto' =>'17','nom_dpto' =>'Caldas'],
            ['cod_dpto' =>'18','nom_dpto' =>'Caquetá'],
            ['cod_dpto' =>'85','nom_dpto' =>'Casanare'],
            ['cod_dpto' =>'19','nom_dpto' =>'Cauca'],
            ['cod_dpto' =>'20','nom_dpto' =>'Cesar'],
            ['cod_dpto' =>'27','nom_dpto' =>'Chocó'],
            ['cod_dpto' =>'23','nom_dpto' =>'Córdoba'],
            ['cod_dpto' =>'25','nom_dpto' =>'Cundinamarca'],
            ['cod_dpto' =>'94','nom_dpto' =>'Guainía'],
            ['cod_dpto' =>'95','nom_dpto' =>'Guaviare'],
            ['cod_dpto' =>'41','nom_dpto' =>'Huila'],
            ['cod_dpto' =>'44','nom_dpto' =>'La Guajira'],
            ['cod_dpto' =>'47','nom_dpto' =>'Magdalena'],
            ['cod_dpto' =>'50','nom_dpto' =>'Meta'],
            ['cod_dpto' =>'52','nom_dpto' =>'Nariño'],
            ['cod_dpto' =>'54','nom_dpto' =>'Norte de Santander'],
            ['cod_dpto' =>'86','nom_dpto' =>'Putumayo'],
            ['cod_dpto' =>'63','nom_dpto' =>'Quindío'],
            ['cod_dpto' =>'66','nom_dpto' =>'Risaralda'],
            ['cod_dpto' =>'68','nom_dpto' =>'Santander'],
            ['cod_dpto' =>'70','nom_dpto' =>'Sucre'],
            ['cod_dpto' =>'73','nom_dpto' =>'Tolima'],
            ['cod_dpto' =>'76','nom_dpto' =>'Valle del Cauca'],
            ['cod_dpto' =>'97','nom_dpto' =>'Vaupés'],
            ['cod_dpto' =>'99','nom_dpto' =>'Vichada'],
            ['cod_dpto' =>'88','nom_dpto' =>'San Andrés']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento');
    }
}
