<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendimientos', function (Blueprint $table) {            
        //postgresql
            $table->integer('gid', true);
        //sqlite
            //$table->increments('gid'); 
                                  
            $table->string('key')->unique();
            //DATOS_ENCUESTA_ENCUESTADOR
            $table->string('encuestador');
            //DATOS_ENCUESTA_FECHA_DE_LA_ENCUESTA
            $table->date('fechaencuesta');
            //DATOS_ENCUESTA_ENCUESTADOR_DATOS_NOMBRES_DEL_ENCUESTADO
            $table->string('nombresencuestado');
            //DATOS_ENCUESTA_ENCUESTADOR_DATOS_APELLIDOS_DEL_ENCUESTADO
            $table->string('apellidosencuestado');
            //DATOS_ENCUESTA_ENCUESTADOR_DATOS_IDENTIFICACION_ENCUESTADO
            $table->string('cedulaencuestado');
            //DATOS_ENCUESTA_ENCUESTADOR_DATOS_CORREO_ENCUESTADO
            $table->string('correoencuestado')->nullable();
            //DATOS_ENCUESTA_DEPARTAMENTO
            $table->string('departamento');
            //DATOS_ENCUESTA_MUNICIPIO
            $table->string('municipio');
            //TIPO_TERRITORIO
            $table->string('tipodeterritorio');
            //DATOS_APROVECHAMIENTO_NOMBRE_EMPRENDIMIENTO
            $table->string('nombreemprendimiento');
            //DATOS_APROVECHAMIENTO_ANO_EMPRENDIMIENTO
            $table->date('anoconstruccemprend');
            //DATOS_APROVECHAMIENTO_REPRESENTANTE_NOMBRE_LEGAL
            $table->string('nombrereplegal');
            //DATOS_APROVECHAMIENTO_REPRESENTANTE_APELLIDO_LEGAL
            $table->string('apellidoreplegal');
            //DATOS_APROVECHAMIENTO_REPRESENTANTE_DOCUMENTO_LEGAL
            $table->string('tipodocreplegal');
            //DATOS_APROVECHAMIENTO_REPRESENTANTE_IDENTIFICACION_LEGAL
            $table->string('numeroreplegal');
            //DATOS_APROVECHAMIENTO_SE_DEDICA
            $table->string('dedicaempren');
            //DATOS_APROVECHAMIENTO_PRODUCTOS_COMERCIALIZADOS
            $table->string('productos');
            //DATOS_APROVECHAMIENTO_ESPECIE_UTILIZADA
            $table->string('especie');
            //DATOS_APROVECHAMIENTO_PRODUCTO_CULTIVADO
            $table->string('tipoproducto');
            //DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_CANTIDAD
            $table->string('capproducantidad');
            //DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_UNIDADES
            $table->string('capproduunid');
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_EMPLEADOS_BENEFICIADOS
            $table->string('empleadosben')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_ASOCIADOS_BENEFICIADOS
            $table->string('asociadosben')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FAMILIAS_BENEFICIADAS
            $table->string('familiasben')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_CLIENTES
            $table->string('clientes')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PROVEEDORES
            $table->string('proveedores')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_VENTAS_ANUAL
            $table->string('ventasanual')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PRECIO_MEDIDA
            $table->string('preciounid')->nullable();
            //DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FLETE
            $table->string('fletebolean')->nullable();
            //COORDENANDA_LNG
            $table->decimal('longitud',38, 10)->nullable();
            //COORDENANDA_LAT
            $table->decimal('latitud',38, 10)->nullable();
            //borrado
            $table->string('borrado',2)->nullable();
            //DATOS_APROVECHAMIENTO_RESENA            
        //postgresql
            $table->string('resena')->index('emprendimientos_geom_idx');
        //sqlite
            //$table->string('resena');
            //$table->string('geom')->nullable()->index('emprendimientos_geom_idx');
        });
        //postgresql
        DB::statement('ALTER TABLE emprendimientos ADD COLUMN geom geometry(Point,4326)'); 
               
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprendimientos');
    }
}
