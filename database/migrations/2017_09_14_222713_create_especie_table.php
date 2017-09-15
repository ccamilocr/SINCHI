<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especie', function (Blueprint $table) {                            
            $table->string('id');
            $table->string('nom_comun');                                    
            $table->string('nom_cientifico');
            $table->string('procedencia');            
        });
        DB::table('especie')->insert([     
            ['id' =>'1','nom_comun' =>'Achiote','nom_cientifico' =>'Bixa orellana','procedencia' =>'Chagras y huertos mixtos en la amazonia colombiana'],
            ['id' =>'2','nom_comun' =>'Ají amazónico','nom_cientifico' =>'Capsicum chinese  Jacq.','procedencia' =>'Chagras y huertos mixtos en Amazonas, Vaupés, Guaviare y Guainia'],
            ['id' =>'3','nom_comun' =>'Ají amazónico','nom_cientifico' =>'Capsicum annum Jacq.','procedencia' =>'Chagras y huertos mixtos en Amazonas,Caquetá, Vaupés, Guaviare y Guainia'],
            ['id' =>'4','nom_comun' =>'Ají amazónico','nom_cientifico' =>'Capsicum frutescens L.','procedencia' =>'Chagras y huertos mixtos en Amazonas y Vaupés '],
            ['id' =>'5','nom_comun' =>'Andiroba','nom_cientifico' =>'Carapa guianensis','procedencia' =>'Bosques del departamento de Amazonas'],
            ['id' =>'6','nom_comun' =>'Arazá','nom_cientifico' =>'Eugenia stipitata McVaugh','procedencia' =>'Cultivos agroforestales en Caquetá, Guaviare y Putumayo'],
            ['id' =>'7','nom_comun' =>'Asaí, Wasay','nom_cientifico' =>'Euterpre precatoria Mart','procedencia' =>'Bosque inundable y firme en los departamentos de amazonia colombiana'],
            ['id' =>'8','nom_comun' =>'Bacao o Maracao','nom_cientifico' =>'Theobroma bicolor  Bonpl.','procedencia' =>'Cultivos agroforestales y huertos mixtos en Caquetá, Guaviare y Vaupés'],
            ['id' =>'9','nom_comun' =>'Borojó','nom_cientifico' =>'Borojoa Patinoi Cuatrec.','procedencia' =>'Huertos agroforestales en Caquetá, Guaviare y Putumayo'],
            ['id' =>'10','nom_comun' =>'Camu camu','nom_cientifico' =>'Myrciaria dubia (Kunth) McVaugh.','procedencia' =>'Bosques inundables del río Putumayo en Tarapacá-Amazonas'],
            ['id' =>'11','nom_comun' =>'Canangucha, Mirití, Moriche','nom_cientifico' =>'Mauritia Flexuosa ','procedencia' =>'Formaciones de sabana y selva húmeda en Vaupés, Amazonas, Guainía, Guaviare, Caquetá, Vichada y Putumayo'],
            ['id' =>'12','nom_comun' =>'Chambira o cumare','nom_cientifico' =>'Astrocaryum chambira','procedencia' =>'Guaviare, Amazonas y Putumayo'],
            ['id' =>'13','nom_comun' =>'Chontaduro','nom_cientifico' =>'Bactris gasipaes Kunth','procedencia' =>'Caquetá, Guainia, Vaupés, Guaviare, Amazonas y Putumayo'],
            ['id' =>'14','nom_comun' =>'Cocona','nom_cientifico' =>'Solanum sessiliflorum Dunal.','procedencia' =>'Chagras y huertos mixtos en Guaviare y Caquetá'],
            ['id' =>'15','nom_comun' =>'Copaiba','nom_cientifico' =>'Copaifera Officinalis','procedencia' =>'Bosque inundable y firme en el departamento de amazonas'],
            ['id' =>'16','nom_comun' =>'Copoazú','nom_cientifico' =>'Theobroma grandiflorum (Willd. ex Spreng.) K.Schum.','procedencia' =>'Cultivos agroforestales en Caquetá, Guaviare, Putumayo y Amazonas'],
            ['id' =>'17','nom_comun' =>'Ductu dulce','nom_cientifico' =>'Canna indica','procedencia' =>'Chagras y huertos mixtos en Amazonas, Putumayo y Vaupés'],
            ['id' =>'18','nom_comun' =>'Ductu simple','nom_cientifico' =>'Heliconia hirsuta','procedencia' =>'Chagras y huertos mixtos en en los departamentos de amazonia colombiana'],
            ['id' =>'19','nom_comun' =>'Inchi','nom_cientifico' =>'Caryodendron orinocene H. Karst','procedencia' =>'Terrenos inundables de departamentos de Vaupés y Putumayo'],
            ['id' =>'20','nom_comun' =>'Mil pesos, seje','nom_cientifico' =>'Oenocarpus bataua','procedencia' =>'Es una de las palmas más comunes en los bosques de zonas húmedas pantanosas con inundaciones periódicas a lo largo de los ríos, también se encuentra en tierras no inundables, en menor densidad.'],
            ['id' =>'21','nom_comun' =>'Najia','nom_cientifico' =>'Maranta ruiziana','procedencia' =>'Chagras y huertos mixtos en Amazonas y Vaupés'],
            ['id' =>'22','nom_comun' =>'Ñame blanco','nom_cientifico' =>'Dioscorea trifida ','procedencia' =>'Chagras y huertos mixtos en Amazonas y Vaupés'],
            ['id' =>'23','nom_comun' =>'Ñame morado','nom_cientifico' =>'Dioscorea trífida','procedencia' =>'Chagras y huertos mixtos en Amazonas y Vaupés'],
            ['id' =>'24','nom_comun' =>'Piña amazónica','nom_cientifico' =>'Ananas comosus (L.) Merr.','procedencia' =>'Chagras y huertos mixtos en Caquetá'],
            ['id' =>'25','nom_comun' =>'Yuca Brava','nom_cientifico' =>'Manihot esculenta ','procedencia' =>'Chagras y huertos mixtos en Amazonas, Putumayo, Vaupés y Vichada'],
            ['id' =>'26','nom_comun' =>'Yuca Dulce','nom_cientifico' =>'Manihot esculenta ','procedencia' =>'Chagras y huertos mixtos en Amazonas, Putumayo, Vaupés y Vichada']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especie');
    }
}
