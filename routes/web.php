<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['verify' => true]);

/* NOta para verificar correo:
    1 Pasamos un arreglo verify => true para habiltiar la verificacion por correo en la ruta
    2- Habilitamos en el modelo implementamos MustVerifyEmail
    3- En el controlador pasamoe el middleware de verificacion para los usuaris
*/


Route::group(['middleware' => ['auth', 'verified']], function(){

   // Rutas de vacantes
    Route::get('/vacantes','VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create','VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes','VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}','VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit','VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacante/{vacante}','VacanteController@update')->name('vacantes.update');


    // Subir imagen
    Route::post('/vacantes/imagen','VacanteController@imagen')->name('vacante.imagen');
    Route::post('/vacantes/borrarimagen','VacanteController@borrarimagen')->name('vacante.borrar');

    // Cambiar el estado de la vacante
    Route::post('/vacantes/{vacante}','VacanteController@estado')->name('vacante.estado');

    // Notificaciones   controlador autoinvocable
    Route::get('/notifaciones','NotificacionesController')->name('notificaciones');
});

// Pagina de inico
Route::get('/', 'InicioController')->name('inicio');

// Categorias
Route::get('/categorias/{categoria}','CategoriaController@show')->name('categorias.show');


// Enviar Datos para una vacante
Route::get('candidatos/{id}','CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store','CandidatoController@store')->name('candidatos.store');

// Buscador
Route::get('/busqueda/buscar','VacanteController@resultados')->name('vacantes.resultados');
Route::post('/busqueda/buscar','VacanteController@buscar')->name('vacantes.buscar');

// Muestra los trabajo en el fronend sin autenticacion
Route::get('/vacantes/{vacante}','VacanteController@show')->name('vacantes.show');



// Route::resource('/vacantes', 'VacanteController');

// ----------------------------- IMPORTANTISIMOS ----------------------------------------------

// Prioridad en rutas

// 1 - resource
// 2 - Rutas con variables comodin vacante
// 3 - resto de ruta

