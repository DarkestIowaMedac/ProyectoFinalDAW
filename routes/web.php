<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SedeController;
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
    Route::post('/muestras', [MuestraController::class, 'crearMuestra']); 
    Route::get('/muestras/{idMuestra}', [MuestraController::class, 'verMuestra']); 
    Route::delete('/muestras/{idMuestra}', [MuestraController::class, 'borrarMuestra']); 
});

Route::get('/sedes', [SedeController::class, 'index']);

require __DIR__.'/auth.php';
