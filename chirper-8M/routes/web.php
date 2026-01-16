<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControladorController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;

// Rutas de autenticación para invitados (guest middleware)
Route::middleware('guest')->group(function () {
    Route::get('/register', [Register::class, 'show'])->name('register');
    Route::post('/register', Register::class);
    
    Route::get('/login', [Login::class, 'show'])->name('login');
    Route::post('/login', Login::class);
});

// Rutas protegidas (solo autenticados)
Route::middleware('auth')->group(function () {
    //
});

Route::get('/', [ControladorController::class, 'index']);
Route::post('/bulos', [ControladorController::class, 'guardar']);