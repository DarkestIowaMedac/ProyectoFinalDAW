<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/muestras', [MuestraController::class, 'verTodas'])
});

require __DIR__.'/auth.php';
