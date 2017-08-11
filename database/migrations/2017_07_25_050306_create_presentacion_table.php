<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentacion', function (Blueprint $table) {            
            $table->increments('tippre')->unique();            
            $table->string('nombre');
        });
        DB::table('presentacion')->insert([     
            ['tippre' =>'0','nombre' =>'Sin datos'],
            ['tippre' =>'1','nombre' =>'Granel'],
            ['tippre' =>'2','nombre' =>'Al detal sin empaque'],
            ['tippre' =>'3','nombre' =>'Cajas de cartón'],
            ['tippre' =>'4','nombre' =>'Bolsa plástica'],
            ['tippre' =>'5','nombre' =>'Costal'],
            ['tippre' =>'6','nombre' =>'Canastilla plástica'],
            ['tippre' =>'7','nombre' =>'Envase de vidrio'],
            ['tippre' =>'8','nombre' =>'Envase plástico'],
            ['tippre' =>'9','nombre' =>'Otro']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentacion');
    }
}