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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas para editar un usario autenticado.

    */
Route::get('/editar_autenticado', 'UsuarioController@edit');
Route::patch('/editar_autenticado', 'UsuarioController@update')->name('usuario.update');

Route::get('/instituciones', 'InstitucionController@index'); // listado
Route::get('/administradores/instituciones', 'InstitucionController@index');
Route::get('/administradores', 'AdministradorController@index'); // listado
Route::get('/profesores', 'ProfesorController@index'); // listado
/**
 * Rutas de los administradores.

    */
Route::get('/superadmin/administradores', 'AdministradorController@create'); // listado
Route::post('/superadmin/administradores', 'AdministradorController@store'); // registrar
Route::get('/administradores/editar_autenticado', 'AdministradorController@edit')->name('administrador.edit');
Route::put('/administradores', 'AdministradorController@actualizar')->name('administradores.actualizar');
Route::patch('/superadmin/administradores', 'AdministradorController@update')->name('administrador.update'); // Actualizar
Route::delete('/superadmin/administradores', 'AdministradorController@destroy')->name('administrador.destroy'); //Borrar

/**
 * Rutas de los profesores.

    */
Route::get('/administradores/profesores', 'ProfesorController@create'); // listado
Route::post('/administradores/profesores', 'ProfesorController@store'); // registrar
Route::get('/profesores/editar_autenticado', 'ProfesorController@edit')->name('profesor.edit');
Route::put('/profesores', 'ProfesorController@actualizar')->name('profesores.actualizar');
Route::patch('/administradores/profesores', 'ProfesorController@update')->name('profesor.update'); // Actualizar
Route::delete('/administradores/profesores', 'ProfesorController@destroy')->name('profesor.destroy'); //Borrar
    

/**
 * Rutas de las instituciones.

    */
Route::get('/superadmin/instituciones', 'InstitucionController@create'); // listado
Route::post('/superadmin/instituciones', 'InstitucionController@store'); // registrar
Route::patch('/superadmin/instituciones', 'InstitucionController@update')->name('institucion.update'); // Actualizar
Route::delete('/superadmin/instituciones', 'InstitucionController@destroy')->name('institucion.destroy'); //Borrar

    /**
     * Rutas de los Cursos.

     */
Route::get('/instituciones/{id}/cursos', 'CursoController@index'); // listado
Route::get('/instituciones/cursos/{id}/create', 'CursoController@create'); // formulario
Route::post('/instituciones/{id}/cursos', 'CursoController@store'); // registrar
Route::get('/cursos/{id}/edit', 'CursoController@edit'); // formulario edicion
Route::post('/cursos/{id}/edit', 'CursoController@update'); // actualizar
Route::delete('instituciones/{id}/cursos/','CursoController@destroy'); // form eliminar


/**
 * Rutas de las instancias de Cursos.

    */
Route::get('/instituciones/cursos/{id}/instanciacursos', 'InstanciaCursoController@index'); // listado
Route::get('/instituciones/cursos/instanciacursos/{id}/create', 'InstanciaCursoController@create'); // formulario
Route::post('/instituciones/cursos/instanciacursos', 'InstanciaCursoController@store')->name('instanciacursos.store'); // registrar
Route::patch('/administradores/instituciones/cursos/instanciacursos', 'InstanciaCursoController@update')->name('instanciacursos.update'); // Actualizar
Route::delete('/administradores/instituciones/cursos/instanciacursos', 'InstanciaCurso@destroy')->name('instanciacursos.destroy'); //Borrar


/**
 * Rutas de los alumnos asociados a instancias.

    */
Route::get('/instituciones/cursos/instanciacursos/{id}/alumnos', 'AlumnoController@index'); // listado
Route::get('/instituciones/cursos/instanciacursos/alumnos/{id}create', 'AlumnoController@create'); // formulario
Route::post('/instituciones/cursos/instanciacursos/{id}/alumnos', 'AlumnoController@importUsers'); // registrar
Route::patch('/instituciones/cursos/instanciacursos/alumnos', 'AlumnoController@update')->name('alumnos.update'); // formulario edicion
Route::post('/cursos/{id}/edit', 'CursoController@update'); // actualizar
Route::delete('instituciones/{id}/cursos/','CursoController@destroy'); // form eliminar


   /**
 * Rutas de los proyectos asociados a instancias.

    */
Route::get('/instituciones/cursos/instanciacursos/{id}/proyectos', 'ProyectoController@index'); // listado
Route::get('/instituciones/cursos/instanciacursos/proyectos/{id}create', 'ProyectoController@create'); // formulario
Route::post('/instituciones/cursos/instanciacursos/proyectos', 'ProyectoController@store')->name('proyectos.store'); // registrar
Route::patch('/instituciones/cursos/instanciacursos/proyectos/', 'ProyectoController@asignaralumnos')->name('proyectos.asignaralumnos'); // asignar alumnos a proyecto
Route::get('/cursos/{id}/edit', 'CursoController@edit'); // formulario edicion
Route::post('/cursos/{id}/edit', 'CursoController@update'); // actualizar
Route::delete('instituciones/{id}/cursos/','CursoController@destroy'); // form eliminar

        /**
 * Rutas de los repositorios asociados a proyectos.

    */
Route::get('/instituciones/cursos/instanciacursos/proyectos/{id}/repositorios', 'RepositorioController@index'); // listado
Route::get('/instituciones/cursos/instanciacursos/proyectos/{id}create', 'ProyectoController@create'); // formulario
Route::post('/instituciones/cursos/instanciacursos/proyectos/{id}/repositorios', 'RepositorioController@store'); // registrar
Route::get('/cursos/{id}/edit', 'CursoController@edit'); // formulario edicion
Route::post('/cursos/{id}/edit', 'CursoController@update'); // actualizar
Route::delete('instituciones/{id}/cursos/','CursoController@destroy'); // form eliminar

        /**
 * Rutas de las metricas de los proyectos.

    */


Route::post('/metricas', 'MetricaController@index');
Route::get('/metricas/clonar/', 'MetricaController@clonar');