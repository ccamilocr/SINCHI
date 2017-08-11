<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencia', function (Blueprint $table) {            
            $table->increments('tipdep')->unique();
            $table->string('nombre');
        });
        DB::table('dependencia')->insert([      
            ['tipdep' =>'1','nombre' =>'Sede Bogotá'],
            ['tipdep' =>'2','nombre' =>'Sede Leticia'],
            ['tipdep' =>'3','nombre' =>'Sede Puerto Leguízamo']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependencia');
    }
}
