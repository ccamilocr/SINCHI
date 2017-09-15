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

        //*******************************************************************************************
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

        //******************************************************************************************
        //2. NUMERO DE REGISTROS POR UNIDAD TERRITORIAL - Coordenadas

        $reg_per_unidad_latlong=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')                        
                        ->select('departamento.nom_dpto','emprendimientos.departamento',db::raw('ST_AsGeoJSON(geom) as point'))                                                
                        ->orderby('emprendimientos.departamento');
        
        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $reg_per_unidad_latlong->join('municipio','emprendimientos.municipio','municipio.cod_dane')
                            ->select('departamento.nom_dpto','emprendimientos.departamento','municipio.nom_mpio','emprendimientos.municipio as cod_dane',db::raw('ST_AsGeoJSON(geom) as point'))
                            ->where('emprendimientos.departamento','=',$depto)                            
                            ->orderby('emprendimientos.departamento');
            if($mpio!='00'){
                $reg_per_unidad_latlong->where('emprendimientos.municipio','=',$mpio);
            }

        }

        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $reg_per_unidad_latlong->where('dedicaempren','=',$dedica);
        }

        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $reg_per_unidad_latlong->where('anoconstruccemprend','=',$year);
        }

        $query_unidad_latlong=$reg_per_unidad_latlong->get();

        //************************************************************************************
        //3. DISTRIBUCION POR TIPO DE TERRITORIO

        $tipo_territorio=db::table('emprendimientos')
                        ->select(db::raw('tipodeterritorio, count(tipodeterritorio) as registros'))
                        ->groupby('tipodeterritorio')
                        ->orderby('registros','DESC');
        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $tipo_territorio->where('emprendimientos.departamento','=',$depto);                           
            if($mpio!='00'){
                $tipo_territorio->where('emprendimientos.municipio','=',$mpio);
            }
        }
        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $tipo_territorio->where('dedicaempren','=',$dedica);
        }
        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $tipo_territorio->where('anoconstruccemprend','=',$year);
        }

        $tipo_territorio_query=$tipo_territorio->get();

        //************************************************************************************
        //4. DEDICACION DEL EMPRENDIMIENTO
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

        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $dedicacion->where('dedicaempren','=',$dedica);
        }

        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $dedicacion->where('anoconstruccemprend','=',$year);
        }

        $dedicacion_query=$dedicacion->get();

        //************************************************************************************
        //5. DISTRIBUCION POR TIPO DE CULTIVO   

        $tipo_cultivo=db::table('emprendimientos')
                        ->select(db::raw('tipoproducto, count(tipoproducto) as registros'))
                        ->groupby('tipoproducto')
                        ->orderby('registros','DESC');
        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $tipo_cultivo->where('emprendimientos.departamento','=',$depto);                           
            if($mpio!='00'){
                $tipo_cultivo->where('emprendimientos.municipio','=',$mpio);
            }
        }
        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $tipo_cultivo->where('dedicaempren','=',$dedica);
        }
        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $tipo_cultivo->where('anoconstruccemprend','=',$year);
        }

        $tipo_cultivo_query=$tipo_cultivo->get();

        //***************************************************************************************
        //6. INDICADORES DATOS DE APROVECHAMIENTO

        $indicadores=db::table('emprendimientos')
                        ->select(db::raw('sum(CAST(empleadosben AS integer)) as empleadosben, sum(CAST(asociadosben AS integer)) as asociadosben, sum(CAST(familiasben AS integer)) as familiasben, avg(CAST(clientes AS integer)) as clientes, avg(CAST(proveedores AS integer)) as proveedores, avg(CAST(ventasanual AS integer)) as ventasanual'));

        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $indicadores->where('emprendimientos.departamento','=',$depto);                           
            if($mpio!='00'){
                $indicadores->where('emprendimientos.municipio','=',$mpio);
            }
        }
        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $indicadores->where('dedicaempren','=',$dedica);
        }
        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $indicadores->where('anoconstruccemprend','=',$year);
        }

        $indicadores_query=$indicadores->get();


        //***************************************************************************************
        //8. LISTADO DE EMPRENDIMIENTOS

        $emprendimientos=db::table('emprendimientos')
                            ->select('nombreemprendimiento','nombrereplegal','apellidoreplegal');

        //Filtra la consulta por departamento y/o municipio
        if($depto!="00"){            
            $emprendimientos->where('emprendimientos.departamento','=',$depto);                           
            if($mpio!='00'){
                $emprendimientos->where('emprendimientos.municipio','=',$mpio);
            }
        }

        //Filtra la consulta con la dedicacion del emprendimiento
        if($dedica!='00'){
            $emprendimientos->where('dedicaempren','=',$dedica);
        }

        //Filtra la consulta por el anio de constitucion de la empresa
        if($year!='00'){
            $emprendimientos->where('anoconstruccemprend','=',$year);
        }

        $emprendimientos_query=$emprendimientos->get();

        return array('reg_per_unidad'=>$query_unidad,'dedicacion_query'=>$dedicacion_query,'emprendimientos_query'=>$emprendimientos_query, 'query_unidad_latlong'=>$query_unidad_latlong,'tipo_territorio_query'=>$tipo_territorio_query,'tipo_cultivo_query'=>$tipo_cultivo_query,'indicadores_query'=>$indicadores_query);
    }

    
}
