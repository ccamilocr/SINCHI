<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emprendimientos extends Model
{
    protected $table = 'emprendimientos';
    //DATOS_ENCUESTA
	protected $fillable = ['gid','key','encuestador','fechaencuesta','nombresencuestado','apellidosencuestado','cedulaencuestado','correoencuestado','departamento','municipio','tipodeterritorio','nombreemprendimiento','anoconstruccemprend','nombrereplegal','apellidoreplegal','tipodocreplegal','numeroreplegal','dedicaempren','productos','especie','tipoproducto','capproducantidad','capproduunid','empleadosben','asociadosben','familiasben','clientes','proveedores','ventasanual','preciounid','fletebolean','resena','geom'];
	public $timestamps = false;
}
