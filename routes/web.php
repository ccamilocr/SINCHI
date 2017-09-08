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



Auth::routes();

//rutas que necesitan estar logueado
Route::group(['middleware' => 'auth'], function (){	
	Route::get('dashboard', 'dashboardController@index')->name('dashboard');
	Route::get('registro', function () {
	    return view('auth.register');
	});
	// rutas para metodos del 
	Route::name('editarborrar')->get('editarborrar','EmprendimientosController@index');	
	Route::name('borrarregistro')->post('borrarregistro','EmprendimientosController@destroy');
	
	Route::name('actualizarregistro')->get('actualizarregistro','EmprendimientosController@edit');
	Route::name('store_actualizarregistro')->post('store_actualizarregistro','EmprendimientosController@store');

});

Route::get('/home', 'HomeController@index')->name('home');


