<?php

Route::get('/productos/nuevo', 'ProductosController@create')->name('productosindex');

//En el create esta el listado y el formulario
//Route::get('/productos/index', 'ProductosController@index')->name('productosindex');
//PRODUCTOS
Route::post('/productosAgregar', 'ProductosController@store')->name('productosAgregar');

Route::get('/getProducto/{id}', 'ProductosController@show')->name('getProducto');
Route::put('/getProducto/{id}/edit', 'ProductosController@update')->name('editarProducto');
Route::delete('/getProducto/{id}/delete', 'ProductosController@destroy')->name('deleteProducto');

//MANTENER CATEGORIAS
Route::get('/categorias/nuevo', 'CategoriasController@create')->name('categoriasindex');
Route::post('/categoriasAgregar', 'CategoriasController@store')->name('categoriasAgregar');
Route::get('/getCategoria/{id}', 'CategoriasController@show')->name('getCategoria');
Route::put('/getCategoria/{id}/edit', 'CategoriasController@update')->name('editarCategoria');
Route::delete('/getCategoria/{id}/delete', 'CategoriasController@destroy')->name('deleteCategoria');




Route::post('/updateEstado', 'ProductosController@updateEstado')->name('updateEstado');

Route::post('/addCategorias', 'CategoriasController@addCategorias')->name('addCategorias');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
