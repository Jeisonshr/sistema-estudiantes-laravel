<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SesionController;

// Página principal
Route::redirect('/', '/estudiantes');

// Inicio de sesión
Route::view('/login', 'login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', [SesionController::class, 'entrar'])
    ->middleware(['guest', 'throttle:6,1'])
    ->name('login.entrar');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    // Listado de estudiantes
    Route::get('/estudiantes', [EstudianteController::class, 'index'])
        ->name('estudiantes.index');

    // Registrar estudiante
    Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])
        ->name('estudiantes.create');

    Route::post('/estudiantes', [EstudianteController::class, 'store'])
        ->name('estudiantes.store');

    // Editar estudiante
    Route::get('/estudiantes/{estudiante}/editar', [EstudianteController::class, 'edit'])
        ->name('estudiantes.edit');

    Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])
        ->name('estudiantes.update');

    // Confirmar eliminación
    Route::get('/estudiantes/{estudiante}/eliminar', [EstudianteController::class, 'confirmar'])
        ->name('estudiantes.confirmar');

    // Eliminar estudiante
    Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])
        ->name('estudiantes.destroy');

    // Cerrar sesión
    Route::post('/logout', [SesionController::class, 'salir'])
        ->name('logout');
});