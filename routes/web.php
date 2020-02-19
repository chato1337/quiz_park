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

Route::get('/', function () {
    return view('welcome');
});

Route::post('crear_categoria', 'CategoriasController@crear');
Route::get('listar_categoria', 'CategoriasController@listar');

Route::post('crear_examen', 'ExamenesController@crear');
Route::get('listar_examenes', 'ExamenesController@listar');
Route::get('examen', 'ExamenesController@mostrar');
Route::get('realizar_examen', 'ExamenesController@realizar');

Route::post('crear_pregunta', 'PreguntasController@crear');
Route::get('listar_preguntas', 'PreguntasController@listar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
