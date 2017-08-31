<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('iniciales', 4);
            $table->string('rol');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([ 
            ['name' =>'Admin','email' =>'ccamilocr@gmail.com','iniciales' =>'CC','rol' =>'Administrador','password' =>Hash::make('123456')],
            ['name' =>'Mauro Alejandro Reyes Bonilla','email' =>'mreyes@sinchi.org.co','iniciales' =>'MAR','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Maria Soledad Hernandez Gomez','email' =>'shernandez@sinchi.org.co','iniciales' =>'MSH','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Marcela Piedad Carrillo Bautista','email' =>'mcarrillo@sinchi.org.co','iniciales' =>'MC','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Diana Carolina Guerrero Castrillon','email' =>'dguerrero@sinchi.org.co','iniciales' =>'DG','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Raquel Diaz raordisa','email' =>'raordisa@gmail.com','iniciales' =>'RD','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'David Mosquera','email' =>'entropia8640@yahoo.es','iniciales' =>'DM','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Ricardo Gonzalez Alarcon','email' =>'Gonzalez_r@hotmail.com','iniciales' =>'RG','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Nathaly Sarasty','email' =>'natha_140188@hotmail.com','iniciales' =>'NS','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Nataly Hernandez','email' =>'ingnatalyhernandez@gmail.com','iniciales' =>'NH','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Juan Carlos Bernal Leal','email' =>'juancbernall@yahoo.es','iniciales' =>'JCB','rol' =>'Consultor','password' =>Hash::make('123456')],
            ['name' =>'Andrés Martinez','email' =>'ammartinezh@unal.edu.co','iniciales' =>'AM','rol' =>'Consultor','password' =>Hash::make('123456')]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
