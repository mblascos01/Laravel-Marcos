<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControladorController;

Route::get('/', [ControladorController::class, 'index']);