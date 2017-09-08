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

        $anio_constitucion_select=db::table('emprendimientos')
                                  ->select(db::raw('anoconstruccemprend,EXTRACT(YEAR FROM anoconstruccemprend) as year '))
                                  ->groupby('anoconstruccemprend')
                                  ->orderby('anoconstruccemprend')
                                  ->get();

        return view('pages.dashboard',array('departamento'=>$departamento,'anio_constitucion_select'=>$anio_constitucion_select));
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
        $dedica=$filtros[2];
        $year=$filtros[3];

        //1. NUMERO DE REGISTROS POR UNIDAD TERRITORIAL
        $reg_per_unidad=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')                        
                        ->select('departamento.nom_dpto','emprendimientos.departamento',db::raw('count(emprendimientos.departamento) as registros_depto'))                        
                        ->groupby('departamento.nom_dpto', 'emprendimientos.departamento')
                        ->orderby('emprendimientos.departamento');
        
        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $reg_per_unidad->join('municipio','emprendimientos.municipio','municipio.cod_dane')
                            ->select('municipio.nom_mpio','emprendimientos.municipio as cod_dane',db::raw('count(emprendimientos.municipio) as registros_mpio'))
                            ->where('emprendimientos.departamento','=',$depto)
                            ->groupby('municipio.nom_mpio','emprendimientos.municipio')
                            ->orderby('emprendimientos.departamento');
            if($mpio!='00'){
                $reg_per_unidad->where('emprendimientos.municipio','=',$mpio);
            }

        }

        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $reg_per_unidad->where('dedicaempren','=',$dedica);
        }

        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $reg_per_unidad->where('anoconstruccemprend','=',$year);
        }

        $query_unidad=$reg_per_unidad->get();

        //2. DEDICACION DEL EMPRENDIMIENTO
        $dedicacion=db::table('emprendimientos')
                    ->select(db::raw('dedicaempren, count(dedicaempren) as registros'))
                    ->groupby('dedicaempren')
                    ->orderby('registros','DESC');
        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $dedicacion->where('emprendimientos.departamento','=',$depto);                           
            if($mpio!='00'){
                $dedicacion->where('emprendimientos.municipio','=',$mpio);
            }

        }

        $dedicacion_query=$dedicacion->get();

        return array('reg_per_unidad'=>$query_unidad,'dedicacion_query'=>$dedicacion_query);
    }

    
}
