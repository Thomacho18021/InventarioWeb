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

});
