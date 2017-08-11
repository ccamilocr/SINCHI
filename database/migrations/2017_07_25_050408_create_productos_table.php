<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('productos', function (Blueprint $table) {            
            $table->increments('tippro')->unique();            
            $table->string('nombre');
        });
        DB::table('productos')->insert([     
            ['tippro' =>'1','nombre' =>'Arete(s)'],
            ['tippro' =>'2','nombre' =>'Banco(s)'],
            ['tippro' =>'3','nombre' =>'Baston(es)'],
            ['tippro' =>'4','nombre' =>'Collar(es)'],
            ['tippro' =>'5','nombre' =>'Llavero(s)'],
            ['tippro' =>'6','nombre' =>'Manilla(s)'],
            ['tippro' =>'7','nombre' =>'Máscara(s)'],
            ['tippro' =>'8','nombre' =>'Mochila(s)'],
            ['tippro' =>'9','nombre' =>'Pulsera(s)'],
            ['tippro' =>'10','nombre' =>'Ramo(s)'],
            ['tippro' =>'11','nombre' =>'Sonajero(s)'],
            ['tippro' =>'12','nombre' =>'Torta(s)'],
            ['tippro' =>'13','nombre' =>'Cacao'],
            ['tippro' =>'14','nombre' =>'Mermelada'],
            ['tippro' =>'15','nombre' =>'Caucho'],
            ['tippro' =>'16','nombre' =>'Chocolate(s)'],
            ['tippro' =>'17','nombre' =>'Árbol(es)']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}