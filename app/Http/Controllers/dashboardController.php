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

    
}
