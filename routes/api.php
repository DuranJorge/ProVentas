<?php

use Illuminate\Http\Request;
use ProVentas\Categoria;
use ProVentas\Articulo;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use ProVentas\User;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para categoria webservices
Route::get('/categorias', function(){
	return Categoria::all();
});

Route::post('/categorias','api\CategoriaController@create');
Route::get('/categorias/{id}','api\CategoriaController@delete');
Route::post('/categorias/{id}/edit','api\CategoriaController@edit');

//Rutas para articulo webservices
//Listar
Route::get('/articulos', function(){
	return Articulo::all();
});
//Crear
Route::post('/articulos','api\ArticuloController@create');
//Borrar
Route::get('/articulos/{id}','api\ArticuloController@delete');
//Editar
Route::post('/articulos/{id}/edit','api\ArticuloController@edit');





/* EJEMPLOS ANTIGUOS

Route::post('create-user', function(Request $request){
	User::create([
		'email' => $request->get('email'),
		'password' => bcrypt($request->get('password')),
		'name' => $request->get('name')
	]);

	return response()->json(['status' => 'ok']);
});

//PAra crear articulo API
Route::post('create-articulo', function(Request $request){
	Articulo::create([
		'idcategoria' => $request->get('idcategoria'),
		'codigo' => $request->get('codigo'),
		'nombre' => $request->get('nombre'),
		'stock' => $request->get('stock'),
		'descripcion' => $request->get('descripcion'),
		'imagen' => $request->get('imagen'),
		'estado' => $request->get('estado')

	]);

	return response()->json(['status' => 'ok']);
});
*/