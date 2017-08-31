<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta del index
Route::get('/', function () {
    return view('inicio');
});

Route::get('logout', function()
{ 	
  	Auth::logout();
	return Redirect::to('/'); 
});
Route::get('logout', function()
{ 	
  	Auth::logout();
	return Redirect::to('/'); 
});

Auth::routes();

//rutas que necesitan estar logueado
Route::group(['middleware' => 'auth'], function (){
	Route::get('dashboard1','EmprendimientosController@DashboardGeneral');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hola', function () {	
	Auth::logout();
	return "hola";
});

Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

