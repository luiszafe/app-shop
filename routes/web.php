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
//https://akivaron.github.io/miminium/credits.html
Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');


Route::middleware(['auth','admin'])->namespace('Admin')->prefix('admin')->group(function () {
	Route::get('/products', 'ProductController@index'); //listar 
	Route::get('/products/create', 'ProductController@create'); //formulario para crear
	Route::post('/products', 'ProductController@store'); //crear
	Route::get('/products/{id}/edit', 'ProductController@edit'); //form editar
	Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
	Route::post('/products/{id}/delete', 'ProductController@destroy'); //eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); //listado imagenes 
	Route::post('/products/{id}/images', 'ImageController@store'); //registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); //eliminar image
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //destacar 
});