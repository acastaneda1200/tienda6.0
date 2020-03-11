<?php

Route::get('/productos/nuevo', 'ProductosController@create')->name('productosindex');

//En el create esta el listado y el formulario
//Route::get('/productos/index', 'ProductosController@index')->name('productosindex');

Route::post('/productosAgregar', 'ProductosController@store')->name('productosAgregar');

Route::get('/getProducto/{id}', 'ProductosController@show')->name('getProducto');
Route::put('/getProducto/{id}/edit', 'ProductosController@update')->name('editarProducto');
Route::delete('/getProducto/{id}/delete', 'ProductosController@destroy')->name('deleteProducto');

Route::post('/updateEstado', 'ProductosController@updateEstado')->name('updateEstado');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
