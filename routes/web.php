<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/formulario', function () {
    return Inertia::render('Formulario');
})->middleware(['auth', 'verified'])->name('formulario');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('/crearMuestra', [MuestraController::class, 'crearMuestra']);
    Route::patch('/editarMuestra', [MuestraController::class, 'editarMuestra']);
    Route::get('/muestra/{idMuestra}', [MuestraController::class, 'verMuestra']);
    Route::delete('/borrarMuestra/{idMuestra}', [MuestraController::class, 'borrarMuestra']);
    Route::get('/muestras', [MuestraController::class, 'verTodas']);
});

Route::get('/sedes', [SedeController::class, 'index']);


Route::get('formatos', [FormatoController::class, 'index']);
Route::get('formatos/create', [FormatoController::class, 'create']);
Route::post('formatos', [FormatoController::class, 'store']);
Route::get('formatos/{formato}', [FormatoController::class, 'show']);
Route::get('formatos/{formato}/edit', [FormatoController::class, 'edit']);
Route::put('formatos/{formato}', [FormatoController::class, 'update']);
Route::delete('formatos/{formato}', [FormatoController::class, 'destroy']);


require __DIR__.'/auth.php';
