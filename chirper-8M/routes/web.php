<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControladorController;
use App\Http\Controllers\BuloController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', [ControladorController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::post('/bulos', [ControladorController::class, 'guardar']);
    Route::get('/bulos/{bulo}/edit', [BuloController::class, 'edit'])->name('bulos.edit');
    Route::put('/bulos/{bulo}', [BuloController::class, 'update'])->name('bulos.update');
    Route::delete('/bulos/{bulo}', [BuloController::class, 'destroy'])->name('bulos.destroy');
});


// Registration routes

Route::view('/register', 'auth.register')

    ->middleware('guest')

    ->name('register');

 

Route::post('/register', Register::class)

    ->middleware('guest');


// Ruta login
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

// Ruta logout
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');