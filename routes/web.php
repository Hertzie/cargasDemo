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

Route::get('/', 'HomeController@index');

Route::get("/ejemplo","ejemploController@index");

Route::get("/registrarAlumno","registrarController@registrar");

Route::get('/consultar', 'registrarController@consultar');

Route::get('/registrarMateria', 'materiasController@registrar');

Route::get('/consultarMaterias', 'materiasController@consultar');

Route::get('/registrarMaestro', 'maestrosController@registrar');

Route::get('/consultarMaestro', 'maestrosController@consultar');

Route::get('/eliminar/{id}', 'registrarController@eliminar');

Route::get('/eliminarMaestro/{id}', 'maestrosController@eliminar');

Route::get('/eliminarMateria/{id}', 'materiasController@eliminar');

Route::get('/eliminarGrupo/{id}', 'gruposController@eliminar');

Route::get('/editarAlumno/{id}', 'registrarController@editar');

Route::get('/editarMaestro/{id}', 'maestrosController@editar');

Route::get('/editarGrupo/{id}', 'gruposController@editar');

Route::get('/registrarGrupo', 'gruposController@registrar');

Route::get('/consultarGrupo', 'gruposController@consultar');

Route::get('/listapdf/{id}', 'gruposController@generarPDF');

Route::post('/actualizarAlumno/{id}', 'registrarController@actualizar');

Route::post('/actualizarMaestro/{id}', 'maestrosController@actualizar');

Route::post('/actualizarGrupo/{id}', 'gruposController@actualizar');

Route::get('/listaAlumnos/{id}', 'gruposController@lista');

Route::post('/guardarMaestro', 'maestrosController@guardar');

Route::post('/guardarAlumno', 'registrarController@guardar');

Route::post('/guardarMateria', 'materiasController@guardar');

Route::post('/guardarGrupo', 'gruposController@guardar');

Route::get('/cargarMaterias/{id}', 'cargasController@cargarMateria');

Route::get('/darBaja/{id}/{id_grupo}','cargasController@darBaja');

Route::get('/registrarCalificaciones/{id_grupo}', 'cargasController@registrarCalificacion');

Route::post('/subirCalificaciones/{id_grupo}', 'cargasController@subirCalificaciones');

Route::post('/cargarGrupo/{id}', 'cargasController@cargarGrupo');

Route::get('/kardexpdf/{id}', 'registrarController@kardexPDF');

Route::get('/alumnospdf', 'registrarController@alumnospdf');

Route::get('/materiaspdf', 'materiasController@materiaspdf');

Route::get('/maestrospdf', 'maestrosController@maestrospdf');

Route::get('/grupospdf', 'gruposController@grupospdf');

