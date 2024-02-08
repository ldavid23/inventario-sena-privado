<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Esta es la tabla que pinta el listado de evaluaciones que ya se han creado en la base de datos (dos botones, editar -> te lleva a la vista y eliminar -> elimina el elemento)
Route::get('/evaluations', [App\Http\Controllers\EvaluacionesController::class, 'index'])->name('evaluations');

//Esta ruta sirve para leer una evaluacion y cargar la vista de editar
Route::get('/evaluations/{evaluationId}', [App\Http\Controllers\EvaluacionesController::class, 'edit'])->name('evaluations.edit');

//Esta ruta es para almacenar una evaluacion en la base de datos que luego sera mostrada en la vista de la linea 24
Route::post('/evaluations', [App\Http\Controllers\EvaluacionesController::class, 'store'])->name('evaluations.post');

//Esta ruta es para actualizar una evaluacion con los datos que el usuario haya cambiado
Route::put('/evaluations/{evaluationId}', [App\Http\Controllers\EvaluacionesController::class, 'update'])->name('evaluations.update');

//Esta ruta es para eliminar una evaluacion ya creada anteriormente
Route::delete('/evaluations/{evaluationId}', [App\Http\Controllers\EvaluacionesController::class, 'destroy'])->name('evaluations.destroy');

Route::get('/instructores', function () {
    return view('instructores');
});



//Esta es la tabla que pinta el listado de evaluaciones que ya se han creado en la base de datos (dos botones, editar -> te lleva a la vista y eliminar -> elimina el elemento)
Route::get('/coordinators', [App\Http\Controllers\CoordinacionesController::class, 'index'])->name('coordinators');

//Esta ruta sirve para leer una evaluacion y cargar la vista de editar
Route::get('/coordinators/{coordinatorId}', [App\Http\Controllers\CoordinacionesController::class, 'edit'])->name('coordinators.edit');

//Esta ruta es para almacenar una evaluacion en la base de datos que luego sera mostrada en la vista de la linea 24
Route::post('/coordinators', [App\Http\Controllers\CoordinacionesController::class, 'store'])->name('coordinators.post');

//Esta ruta es para actualizar una evaluacion con los datos que el usuario haya cambiado
Route::put('/coordinators/{coordinatorId}', [App\Http\Controllers\CoordinacionesController::class, 'update'])->name('coordinators.update');

//Esta ruta es para eliminar una evaluacion ya creada anteriormente
Route::delete('/coordinators/{coordinatorId}', [App\Http\Controllers\CoordinacionesController::class, 'destroy'])->name('coordinators.destroy');


//Esta es la tabla que pinta el listado de evaluaciones que ya se han creado en la base de datos (dos botones, editar -> te lleva a la vista y eliminar -> elimina el elemento)
Route::get('/funcionarios', [App\Http\Controllers\FuncionariosController::class, 'index'])->name('funcionarios');

//Esta ruta sirve para leer una evaluacion y cargar la vista de editar
Route::get('/funcionarios/{id}', [App\Http\Controllers\FuncionariosController::class, 'edit'])->name('funcionarios.edit');

//Esta ruta es para almacenar una evaluacion en la base de datos que luego sera mostrada en la vista de la linea 24
Route::post('/funcionarios', [App\Http\Controllers\FuncionariosController::class, 'store'])->name('funcionarios.post');

//Esta ruta es para actualizar una evaluacion con los datos que el usuario haya cambiado
Route::put('/funcionarios/{id}', [App\Http\Controllers\FuncionariosController::class, 'update'])->name('funcionarios.update');

//Esta ruta es para eliminar una evaluacion ya creada anteriormente
Route::delete('/funcionarios/{id}', [App\Http\Controllers\FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');

