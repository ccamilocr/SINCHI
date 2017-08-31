<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmprendimientosController extends Controller
{
    public function DashboardGeneral()
    {
        //return "hola";
        return View('dashboard');
        //return View::make('modulotierras.procesosadjudicados', array('arrayproceso' => $arrayproceso), array('arrayconcepto' => $arrayconcepto));
    }
}
