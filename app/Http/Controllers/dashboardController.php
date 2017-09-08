<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $departamento=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')
                        ->select(db::raw('departamento.nom_dpto,emprendimientos.departamento, count(emprendimientos.departamento) as registros'))                        
                        ->groupby('departamento.nom_dpto', 'emprendimientos.departamento')
                        ->orderby('nom_dpto')
                        ->get();        

        $anio_constitucion=db::table('emprendimientos')
                            ->select('anoconstruccemprend')
                            ->get();

        return view('pages.dashboard',array('departamento'=>$departamento, 'anio_constitucion'=>$anio_constitucion));
    }
    //LA SIGUIENTE FUNCION CARGA EL LISTADO DE OPCIONES DE LA SELECION DE MUNCIPIOS
    public function municipios_list(Request $request){

        $depto=$request->input('depto');

        $municipios=db::table('emprendimientos')
                        ->join('municipio','emprendimientos.municipio','municipio.cod_dane')
                        ->select(db::raw('municipio.nom_mpio,emprendimientos.municipio as cod_dane, count(emprendimientos.municipio) as registros'))
                        ->where('emprendimientos.departamento','=',$depto)                        
                        ->groupby('municipio.nom_mpio', 'emprendimientos.municipio')
                        ->orderby('nom_mpio')
                        ->get();

        return $municipios;
    }
    //LA SIGUIENTE FUNCION CARGA LA INFORMACION A LAS GRAFICAS DE ACUERDO A LOS FILTROS QUE SEAN APLICADOS
    public function filtros(Request $request){
        //Cargamos las variables que van a ser filtradas en los resultados
        $filtros=$request->input('filtros');
        $depto=$filtros[0];
        $mpio=$filtros[1];

        //NUMERO DE REGISTROS POR UNIDAD TERRITORIAL
        $reg_per_unidad=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')                        
                        ->select('departamento.nom_dpto','emprendimientos.departamento',db::raw('count(emprendimientos.departamento) as registros_depto'))                        
                        ->groupby('departamento.nom_dpto', 'emprendimientos.departamento')
                        ->orderby('emprendimientos.departamento');
        //Filtra la consulta por departamento
        if($depto!="00"){            
            $reg_per_unidad->join('municipio','emprendimientos.municipio','municipio.cod_dane')
                            ->select('municipio.nom_mpio','emprendimientos.municipio as cod_dane',db::raw('count(emprendimientos.municipio) as registros_mpio'))
                            ->where('emprendimientos.departamento','=',$depto)
                            ->groupby('municipio.nom_mpio','emprendimientos.municipio')
                            ->orderby('emprendimientos.departamento');
        }

        $query_unidad=$reg_per_unidad->get();

        return array('reg_per_unidad'=>$query_unidad);
    }

    
}
