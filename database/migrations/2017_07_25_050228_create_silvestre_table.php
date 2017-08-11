<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSilvestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silvestre', function (Blueprint $table) {            
            $table->increments('tipsilv')->unique();            
            $table->string('nombre');
        });
        DB::table('silvestre')->insert([     
            ['tipsilv' =>'1','nombre' =>'Si'],
            ['tipsilv' =>'2','nombre' =>'No']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('silvestre');
    }
}
