<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuesta = DB::select('SELECT "_URI", "_CREATOR_URI_USER", "_CREATION_DATE", "_LAST_UPDATE_URI_USER","_LAST_UPDATE_DATE", "_MODEL_VERSION", "_UI_VERSION", "_IS_COMPLETE", "_SUBMISSION_DATE", "_MARKED_AS_COMPLETE_DATE", "COORDENANDA_ALT", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PRECIO_MEDIDA", "DATOS_APROVECHAMIENTO_ANO_EMPRENDIMIENTO", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_ASOCIADOS_BENEFICIADOS", "LOGO", "DATOS_ENCUESTA_ENCUESTADOR_DATOS_NOMBRES_DEL_ENCUESTADO", "DATOS_APROVECHAMIENTO_REPRESENTANTE_REPRESENTANTE_LEGAL", "DATOS_APROVECHAMIENTO_SE_DEDICA", "DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_CANTIDAD", "DATOS_ENCUESTA_FECHA_DE_LA_ENCUESTA", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_EMPLEADOS_BENEFICIADOS", "DATOS_ENCUESTA_MUNICIPIO", "META_INSTANCE_ID", "DATOS_ENCUESTA_ENCUESTADOR_DATOS_APELLIDOS_DEL_ENCUESTADO", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FAMILIAS_BENEFICIADAS", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PROVEEDORES", "DATOS_APROVECHAMIENTO_PRODUCTO_CULTIVADO", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_VENTAS_ANUAL", "DATOS_APROVECHAMIENTO_REPRESENTANTE_NOMBRE_LEGAL", "DATOS_APROVECHAMIENTO_PRODUCTOS_COMERCIALIZADOS", "DATOS_ENCUESTA_ENCUESTADOR_DATOS_IDENTIFICACION_ENCUESTADO", "DATOS_APROVECHAMIENTO_REPRESENTANTE_APELLIDO_LEGAL", "DATOS_ENCUESTA_ENCUESTADOR", "META_INSTANCE_NAME", "DATOS_ENCUESTA_ENCUESTADOR_DATOS_CORREO_ENCUESTADO", "COORDENANDA_LNG", "COORDENANDA_LAT", "DATOS_APROVECHAMIENTO_REPRESENTANTE_DOCUMENTO_LEGAL", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FLETE", "DATOS_ENCUESTA_DEPARTAMENTO", "DATOS_APROVECHAMIENTO_RESENA", "DATOS_APROVECHAMIENTO_REPRESENTANTE_IDENTIFICACION_LEGAL", "DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_CLIENTES", "TIPO_TERRITORIO", "DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_UNIDADES", "DATOS_APROVECHAMIENTO_ESPECIE_UTILIZADA", "DATOS_APROVECHAMIENTO_PRESENTACION_COMERCIAL_OTRO", "DATOS_APROVECHAMIENTO_NOMBRE_EMPRENDIMIENTO", "COORDENANDA_ACC" FROM "DIREC23S_V3_CORE"');
        
        $encuestarecorrer = json_decode(json_encode($encuesta), true);
        
        //return $encuestarecorrer[0]['_URI'];
        for ($i=0; $i < count($encuestarecorrer); $i++) {
            $busqueda = DB::table('emprendimientos')->where('key', '=', $encuestarecorrer[$i]['_URI'])->get(); 
            $orders = DB::select('SELECT COUNT(*) FROM emprendimientos');
            $orderscorrer = json_decode(json_encode($orders[0]), true);
            $fecha = date("Y-m-d H:i:s");
            if (empty(json_decode(json_encode($busqueda), true)) ) {
                //insertamos registro                
                DB::table('emprendimientos')->insert(
                ['key'  => $encuestarecorrer[$i]['_URI'], 'encuestador' => $encuestarecorrer[$i]['DATOS_ENCUESTA_ENCUESTADOR'], 'fechaencuesta' => $encuestarecorrer[$i]['DATOS_ENCUESTA_FECHA_DE_LA_ENCUESTA'], 'nombresencuestado' => $encuestarecorrer[$i]['DATOS_ENCUESTA_ENCUESTADOR_DATOS_NOMBRES_DEL_ENCUESTADO'], 'apellidosencuestado' => $encuestarecorrer[$i]['DATOS_ENCUESTA_ENCUESTADOR_DATOS_APELLIDOS_DEL_ENCUESTADO'], 'cedulaencuestado' => $encuestarecorrer[$i]['DATOS_ENCUESTA_ENCUESTADOR_DATOS_IDENTIFICACION_ENCUESTADO'], 'correoencuestado' => $encuestarecorrer[$i]['DATOS_ENCUESTA_ENCUESTADOR_DATOS_CORREO_ENCUESTADO'], 'departamento' => $encuestarecorrer[$i]['DATOS_ENCUESTA_DEPARTAMENTO'], 'municipio' => $encuestarecorrer[$i]['DATOS_ENCUESTA_MUNICIPIO'], 'tipodeterritorio' => $encuestarecorrer[$i]['TIPO_TERRITORIO'], 'nombreemprendimiento' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_NOMBRE_EMPRENDIMIENTO'], 'anoconstruccemprend' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_ANO_EMPRENDIMIENTO'], 'nombrereplegal' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_REPRESENTANTE_NOMBRE_LEGAL'], 'apellidoreplegal' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_REPRESENTANTE_APELLIDO_LEGAL'], 'tipodocreplegal' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_REPRESENTANTE_DOCUMENTO_LEGAL'], 'numeroreplegal' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_REPRESENTANTE_IDENTIFICACION_LEGAL'], 'dedicaempren' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_SE_DEDICA'], 'productos' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_PRODUCTOS_COMERCIALIZADOS'], 'especie' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_ESPECIE_UTILIZADA'], 'tipoproducto' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_PRODUCTO_CULTIVADO'], 'capproducantidad' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_CANTIDAD'], 'capproduunid' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_CAPACIDAD_PRODUCTIVA_CP_UNIDADES'], 'empleadosben' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_EMPLEADOS_BENEFICIADOS'], 'asociadosben' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_ASOCIADOS_BENEFICIADOS'], 'familiasben' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FAMILIAS_BENEFICIADAS'], 'clientes' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_CLIENTES'], 'proveedores' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PROVEEDORES'], 'ventasanual' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_VENTAS_ANUAL'], 'preciounid' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_PRECIO_MEDIDA'], 'fletebolean' => $encuestarecorrer[$i]['DATS_APROVECHAMIENTO_INDICADORES_IMPCTO_FLETE'], 'resena' => $encuestarecorrer[$i]['DATOS_APROVECHAMIENTO_RESENA'], 'longitud' => $encuestarecorrer[$i]['COORDENANDA_LNG'], 'latitud' => $encuestarecorrer[$i]['COORDENANDA_LAT'],'borrado' => '1', 'geom' => DB::raw("ST_GeomFromText('POINT(".$encuestarecorrer[$i]['COORDENANDA_LNG']." ".$encuestarecorrer[$i]['COORDENANDA_LAT'].")', 4326)"), 'created_at' => $fecha,'updated_at' => $fecha]);
            } 

        }
        return redirect()->route('dashboard');
    }
}
