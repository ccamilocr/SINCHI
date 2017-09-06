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
    public function index()
    {
        $departamento=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')
                        ->select(db::raw('departamento.nom_dpto,emprendimientos.departamento, count(emprendimientos.departamento) as registros'))                        
                        ->groupby('departamento.nom_dpto', 'emprendimientos.departamento')
                        ->orderby('nom_dpto')
                        ->get();

        $reg_per_depto=db::table('emprendimientos')
                        ->join('departamento','emprendimientos.departamento','departamento.cod_dpto')
                        ->select(db::raw('departamento.nom_dpto,emprendimientos.departamento, count(emprendimientos.departamento) as registros'))                        
                        ->groupby('departamento.nom_dpto', 'emprendimientos.departamento')
                        ->orderby('registros')
                        ->get();

        $anio_constitucion=db::table('emprendimientos')
                            ->select('anoconstruccemprend')
                            ->get();

        return view('pages.dashboard',array('departamento'=>$departamento,'reg_per_depto'=>$reg_per_depto, 'anio_constitucion'=>$anio_constitucion));
    }

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

    public function filtros(){
        
    }

    
}
