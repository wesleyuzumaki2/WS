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
    return view('main');
});

Route::get('/curso', 'CursoController@listar');
Route::get('/curso/cadastrar', 'CursoController@cadastrar');
Route::get('/curso/editar/{id}', 'CursoController@editar');
Route::post('/curso/salvar/{id}', 'CursoController@salvar');
Route::get('/curso/remover/{id}', 'CursoController@remover');
Route::get('/curso/confirmar/{id}', 'CursoController@confirmar');

Route::get('/turma', 'TurmaController@listar');
Route::get('/turma/cadastrar', 'TurmaController@cadastrar');
Route::get('/turma/editar/{id}', 'TurmaController@editar');
Route::post('/turma/salvar/{id}', 'TurmaController@salvar');
Route::get('/turma/remover/{id}', 'TurmaController@remover');
Route::get('/turma/confirmar/{id}', 'TurmaController@confirmar');
