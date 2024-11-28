<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ValidacionController;
use App\Http\Controllers\InformeController;
use qpp\Http\Controllers\AutH\LoginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

Route::get('/',HomeController::class);
/*Route::controller(PracticaController::class)->group(function () {
    Route::get('practicas', 'index')->name('practicas.index');  // Mostrar todas las prácticas
    Route::get('practicas/create', 'create')->name('practicas.create');  // Formulario para crear una nueva práctica
    Route::post('practicas', 'store')->name('practicas.store');  // Guardar nueva práctica
    Route::get('practicas/{practica}/edit', 'edit')->name('practicas.edit');  // Formulario para editar una práctica
    Route::put('practicas/{practica}', 'update')->name('practicas.update');  // Actualizar práctica
    Route::delete('practicas/{practica}','destroy')->name('practicas.destroy');
    Route::get('practicas/{practica}', [ProyectoController::class, 'show'])->name('practicas.show');

});*/
// O también puedes usar Route::resource si quieres simplificar
Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
Route::resource('practicas', PracticaController::class);
Route::view('nosotros', 'nosostros')->name('nosotros');

Route::resource('proyectos', ProyectoController::class);

Route::resource('usuarios', UserController::class)->middleware('auth:sanctum');
Route::resource('login', LoginController::class);
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(ProyectoController::class)->group(function () {
    Route::get('proyectos', 'index')->name('proyectos.index');  // Mostrar todas las prácticas
    Route::get('proyectos/create', 'create')->name('proyectos.create');  // Formulario para crear una nueva práctica
    Route::post('proyectos', 'store')->name('proyectos.store');  // Guardar nueva práctica
    Route::get('proyectos/{proyecto}/edit', 'edit')->name('proyectos.edit');  // Formulario para editar una práctica
    Route::put('proyectos/{proyecto}', 'update')->name('proyectos.update');  // Actualizar práctica
    Route::get('proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');

});
//Rutas para validacion

Route::controller(ValidacionController::class)->group(function () {
    Route::get('validaciones', 'index')->name('validaciones.index');  // Mostrar todas las validaciones
    Route::get('validaciones/create', 'create')->name('validaciones.create');  // Formulario para crear una nueva validación
    Route::post('validaciones', 'store')->name('validaciones.store');  // Guardar nueva validación
    Route::get('validaciones/{validacion}', 'show')->name('validaciones.show');  // Mostrar una validación específica
    Route::get('validaciones/{validacion}/edit', 'edit')->name('validaciones.edit');  // Formulario para editar una validación
    Route::put('validaciones/{validacion}', 'update')->name('validaciones.update');  // Actualizar validación
    Route::delete('validaciones/{validacion}', 'destroy')->name('validaciones.destroy');  // Eliminar validación
});

Route::resource('validaciones', ValidacionController::class);

Route::controller(InformeController::class)->group(function () {
    Route::get('informes', 'index')->name('informes.index');  // Mostrar todos los informes
    Route::get('informes/create', 'create')->name('informes.create');  // Formulario para crear un nuevo informe
    Route::post('informes', 'store')->name('informes.store');  // Guardar nuevo informe
    Route::get('informes/{informe}', 'show')->name('informes.show');  // Mostrar un informe específico
    Route::get('informes/{informe}/edit', 'edit')->name('informes.edit');  // Formulario para editar un informe
    Route::put('informes/{informe}', 'update')->name('informes.update');  // Actualizar informe
    Route::delete('informes/{informe}', 'destroy')->name('informes.destroy');  // Eliminar informe
});
Route::resource('Informes', InformeController::class);

Route::get('admin', [HomeController::class, 'index']);



Auth::routes();

    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])
    ->name('admin.home')
    ->middleware('auth');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');




    Route::resource('practicas', App\Http\Controllers\PracticaController::class)
    ->middleware('auth');

    Route::view('nosotros', 'nosotros')->name('nosotros')->middleware('auth');

    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');


