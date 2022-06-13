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

Route::get('/','HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    //gestion de productos
    Route::get('productos','ArticuloController@index');
    Route::get('productos/new','ArticuloController@create');
    Route::post('guardar_nuevo_producto','ArticuloController@store')->name('guardar_nuevo_producto');
    Route::get('productos/editar/{id}','ArticuloController@edit');
    Route::post('actualizar_producto','ArticuloController@update')->name('actualizar_producto');
    Route::get('eliminar_producto/{id}','ArticuloController@destroy');

    //gestion de categorias
    Route::get('categorias','CategoriasController@index');
    Route::get('categorias/new','CategoriasController@create');
    Route::post('guardar_nueva_categoria','CategoriasController@store')->name('guardar_nueva_categoria');
    Route::get('categorias/editar/{id}','CategoriasController@edit');
    Route::post('actualizar_categoria','CategoriasController@update')->name('actualizar_categoria');
    Route::get('eliminar_categoria/{id}','CategoriasController@destroy');

    //gestion de entrada de inventario
    Route::get('entradainventario','EntradaInventarioController@index');
    Route::get('entradainventario/new','EntradaInventarioController@create');
    Route::post('guardar_nueva_entrada_inventario','EntradaInventarioController@store')->name('guardar_nueva_entrada_inventario');
    Route::get('entradainventario/detalle/{id}','EntradaInventarioController@show');
    Route::get('entradainventario/eliminar/{id}','EntradaInventarioController@eliminar');

    //gestion de salida de inventario
    Route::get('salidainventario','SalidaInventarioController@index');
    Route::get('salidainventario/new','SalidaInventarioController@create');
    Route::post('guardar_nueva_salida_inventario','SalidaInventarioController@store')->name('guardar_nueva_salida_inventario');
    Route::get('salidainventario/detalle/{id}','SalidaInventarioController@show');
    Route::get('salidainventario/eliminar/{id}','SalidaInventarioController@destroy');

});
