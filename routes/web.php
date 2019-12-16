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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'AdminMiddleware'], function () {
    Route::get('/admin',function(){
        return view ('admin.admin');
    });
    // ---------------------Rutas de proyectos--------------------
    Route::get('/proyecto','ProyectoController@index');
    // Route::post('proyecto/showTarea/{id}/show', 'ProyectoController@showTarea');
    Route::resource('proyecto','ProyectoController');
   
    // Route::post('proyectos', 'ProyectoController@buscar');
    

    // ----------------------Rutas de Tareas----------------------
    Route::get('/tarea', 'TareaController@index');
    Route::resource('tarea', 'TareaController');

    // --------------------Usuarios-----------------------
    Route::get('/user','UserController@index');
});
// ----------------Perfiles-----------------------
Route::get('/profile','UserController@mostrar');