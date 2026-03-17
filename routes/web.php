<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController; //Usar la ruta del controlador
use App\Http\Controllers\MovieSearchController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'second'])->group(function () {
    
});

//Usar los metodos del controlador en la rutas
Route::resource('libros', LibroController::class);

//Ruta para consultar los libros registrados
Route::get('libro/{id}/edit', [
    LibroController::class,
    'edit'
])->name('libros.edit');

//Ruta para actualizar la informacion
Route::put('libro/{id}', [
    LibroController::class,
    'update'
])->name('libros.update');

Route::get('/registro', [AuthController::class, 'registerForm'])->name('registro.form');

Route::get('/buscar', [MovieSearchController::class, 'index'])->name('movies.search');

Route::post('/registro', [AuthController::class, 'register'])->name('registro.store');

Route::get('/acceso', [AuthController::class, 'loginForm'])->name('acceso');